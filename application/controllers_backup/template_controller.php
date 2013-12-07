<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Test extends CI_Controller
{
	//Set up the vars - move to MY_Controller
	public $id = FALSE;
	public $data = array();
	public $view = FALSE;
	public $layout = FALSE;
	public $presenter = '';
	public $main_model = '';

	public $view_settings = array(	//Note: ifnot set here, it defaults to the method name
		'create' => 'show', 'edit' => 'no-view', 'delete' => 'no-view', 'toggle' => 'no-view'
		);



	//What models should we load and what joins?
	public $models = array(
		'contacts' => array(
			'join' => array(
				array(
					'table' => 'user',
					'join_on' => 'user.id=contacts.user_id',
					'join_type' => '',
					),
				),
			),
		'contact_actions' => array(
			'join' => array(
				array(
					'table' => 'user',
					'join_on' => 'user.id=contact_actions.user_id',
					'join_type' => '',
					),
				),
			),
		'orders' => array(
			'join' => array(
				array(
					'table' => 'user',
					'join_on' => 'user.id=orders.user_id',
					'join_type' => '',
					),
				),
			),
		'relationships' => array(
			'join' => array(
				array(
					'table' => 'contacts',
					'join_on' => 'contacts.id=relationships.contacts_id',
					'join_type' => '',
					),
				),
			),
		'tag_join' => array(
			'join' => array(
				array(
					'table' => 'tags',
					'join_on' => 'tags.id=tag_join.tags_id',
					'join_type' => '',
					),
				),
			),
		'comms' => array(
			'join' => array(
				array(
					'table' => 'templates',
					'join_on' => 'templates.id=comms.templates_id',
					'join_type' => '',
					),
				),
			),
		);

	//Set up views (by default, the view is set to the method name, or $_POST['view'] if passsed)
	private $_view_settings = array('create' => 'show'); 

	

	public function __construct()
	{
		parent::__construct();

		//Set up the views & layouts
		array_merge($this->view_settings[$this->router->class], $this->_view_settings);

		$this->set_view($this->input->post('view'));
		if ($this->input->post('modal'))
			$this->layout = 'modal';

		//Set up id if passed. (Note: it may still be null or false if not required)
		if ( ! $this->uri->segment(3)) 
			$id = $this->input->post('id');

		//Set owner_id and load bespoke config file
        define ('OWNER_ID', 22220); ///////////////////////////////////Set this on login!
        $this->config->load('client_configs/' . OWNER_ID);

        //Set up other vars & load other classes
        $this->main_model = singular($this->router->class);
        $this->_load_presenter();

        //Show profiler if requested (in dev env only)
        $this->output->enable_profiler(ENVIRONMENT === 'development' && isset($_GET['debug']));




	}

	// public function index()
	// {
			
	// }

	public function show($id = FALSE)
	{
		$this->set_view($this->input->post('view'));
		if ($this->input->post('modal'))
			$this->layout = 'modal';

		//Get the Id, if passed, and load the record
		if (!$id) $id = $this->input->post('id');

		$q = $this->contact_action->get($id);
		
		//If we return a record, then set up the record...
		if (isset($q->id))
		{
			$q = (object)array_merge((array)$this->input->post(), (array) $q);
			$this->data['contact_action'] = new Contact_action_Presenter($q);
			//$this->data['action_type'] = $q->action_type;
		}
		//...otherwise, set a message and go to index
		else
		{
			show_error('No record found with that id');
			$this->session->set_flashdata(array('message' => '[not_found]'));
			//This should never happen!
		}

		//Autoloads the view 'contact_actions/show' which includes the right partial for $action_type
	}

	public function create()
	{
		$this->set_view($this->input->post('view'));

		//Convert the $_POST array into an object
		$post = $this->array_to_object($this->input->post());
		$this->data['contact_action'] = new Contact_action_Presenter($post);
	}




	public function edit($id = FALSE)
	{
		//Don't autoload a view - we're going to redirect to $this->show()
		$this->set_view($this->input->post('view'));
		$retval = array('message' => '[uhoh]', 'post' => $this->input->post());

		if ($id && $this->input->post())
		{
			//If we have passed an id and we have POST data, then its an update
			if ($this->{$this->main_model}->update($id, $this->input->post()))
			{
				$retval['message'] = '[updated]';
				$retval['q'] = ($this->{$this->main_model}->get($id));
			}
				
		}
		elseif (!$id && $this->input->post())
		{
			//Otherwise, if we only have POST data its an insert
			if ($id = $this->{$this->main_model}->insert($this->input->post()))
			{
				$retval['message'] = '[created]';
				$retval['q'] = ($this->{$this->main_model}->get($id));
			}	
		}
		
		if ($this->input->is_ajax_request())
		{
			echo json_encode($retval);
		}

		else
		{
			//Set the message to show the user
			$this->session->set_userdata($retval);
			redirect(site_url($this->router->class));
		}
	
	}

	

	public function delete($id)
	{
		$this->set_view('delete');
		$this->session->unset_userdata('message');
		$retval = array('message' => '[uhoh]', 'post' => $this->input->post());

		if ( ! $id) $id = $_POST['id'];
		
		// Destroy a record (not really - 'softdelete' it!)
		if ($this->{$this->main_model}->delete($id))
		{
			$retval['message'] = '[deleted]';
			$retval['q'] = ($this->{$this->main_model}->get($id));
		}
		
		if ($this->input->is_ajax_request())
		{
			echo json_encode($retval);
		}

		else
		{
			//Set the message to show the user
			$this->session->set_userdata($retval);
			redirect(site_url($this->router->class));
		}
	}

	
	public function toggle($id = NULL, $col = 'deleted', $contact_id = NULL)
	{
		$this->set_view('toggle');
		$this->session->unset_userdata('message');
		$retval = array('message' => '[uhoh]', 'post' => $this->input->post());

		if ( ! $id) $id = $_POST['id'];
		
		$val = $this->{$this->main_model}->toggle_value($id, $col);
		$retval['message'] = '[updated]';
		$retval['q'] = $val;
		

		// $this->contact_action->
		// $message = array('message' => '[updated_action]');

		//if its ajax then do this:
		//is it an ajax call?
		if ($this->input->is_ajax_request())
		{
			echo json_encode($retval);
		}
		// echo json_encode($retval);

		// else
		// {
		// 	//Set the message to show the user
		// 	$this->session->set_userdata($retval);
		// 	redirect(site_url($this->router->class . '/show/' . $contact_id));
		// }

	}

	






	 /* --------------------------------------------------------------
     * BASE METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are the base methods for all controllers
     */
    

    /**
     * Override CodeIgniter's despatch mechanism and route the request
     * through to the appropriate action. Support custom 404 methods and
     * autoload the view into the layout.
     */
    public function _remap($method)
    {
        if (method_exists($this, $method))
        {
            call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
        }
        else
        {
            if (method_exists($this, '_404'))
            {
                call_user_func_array(array($this, '_404'), array($method));
            }
            else
            {
                show_404(strtolower(get_class($this)).'/'.$method);
            }
        }

        $this->_load_view();
    }

    /**
     * Automatically load the view. Looks for it in 
     * 1. 
     */
    protected function _load_view()
    {
        // If $this->view == FALSE, we don't want to load anything
        if ($this->view !== FALSE)
        {
            //pass through the contents of $this->data for debug
            if (ENVIRONMENT !== 'production') $this->data['debug'] = $this->data;

            // If $this->view isn't empty, load it. If it is, try and guess based on the controller and action name 
            // (****NOTE*** view() is in helpers/partial_helper.php)
            $view = (! empty($this->view)) ? view($this->view) : view($this->router->method);

            // Load the view into $yield
            $data['yield'] = $this->load->view($view, $this->data, TRUE);

            // Do we have any asides? Load them.
            // if (!empty($this->asides))
            // {
            //     foreach ($this->asides as $name => $file)
            //     {
            //         $data['yield_'.$name] = $this->load->view($file, $this->data, TRUE);
            //     }
            // }

            // Load in our existing data with the asides and view
            $data = array_merge($this->data, $data);
            $layout = FALSE;

            // If we didn't specify the layout, try to guess it
            if (!isset($this->layout))
            {
                if (file_exists(APPPATH . 'views/layouts/' . $this->config->item('layout_folder') . '/' . $this->router->class . '.php'))
                {
                    $layout = 'layouts/' . $this->config->item('layout_folder')  . '/' . $this->router->class;
                }
                else
                {
                    $layout = 'layouts/' . $this->config->item('layout_folder') .'/application';
                }
            }

            // If we did, use it
            else if ($this->layout !== FALSE)
            {
                $layout = 'layouts/' . $this->config->item('layout_folder') .'/' . $this->layout;
            }

            // If $layout is FALSE, we're not interested in loading a layout, so output the view directly
            if ($layout == FALSE)
            {
                $this->output->set_output($data['yield']);
            }

            // Otherwise? Load away :)
            else
            {
                $this->load->view($layout, $data);
            }
        }
    }








    public function set_view($view = FALSE)
    {
        //View defaults to this method's name if no extra view passed
        if ( ! $view)
        {
            $view  = $this->router->method;

            //Check to see if its been over-ridden by the $view_settings in the controller
            if ( $v = element($this->router->method, $this->view_settings[$this->router->class], FALSE) )
            {
                if ($v == 'no-view')
                    $view = FALSE;
                else
                    $view = $v;
            }
        }
        
        $this->view = $view;
    }

    public function array_to_object($array)
    {
        $object;
        if (is_array($array))
        {
            foreach ($array as $k => $v)
            {
                $object->$k = $v;
            }
        }
        return $object;
    }

   

     /**
     * Load presenter based on the $this->presenter var
     */
    protected function _load_presenter()
    {
        if ($this->presenter === FALSE) return;

        if ($this->presenter === '')
        {
            $this->presenter = $this->main_model;
        }
        $this->presenter = $this->main_model . '_presenter';

        require_once (APPPATH . 'presenters/' . strtolower($this->presenter) . '.php');

    }

    
    /**
     * Returns the loadable model name appended with '_model'
     */
    protected function _model_name($model)
    {
        return $model . '_model';
    }





}