<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A base controller for CodeIgniter with view autoloading, layout support,
 * model loading, helper loading, asides/partials and per-controller 404
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-controller
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class My_Controller extends CI_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * The main model for this contorller class. E.g. if its 'contacts', then the 
     * model we use is 'contact'
     */
    protected $main_model = '';

    /**
     * The associated model for this class. E.g. if this record is linked to other tables, then this list contains these other tables
     */
    protected $_assoc_models = array();

    /**
     * A list of any other models to be autoloaded
     */
    protected $models = array();

     /**
     * A formatting string for the model autoloading feature.
     * The percent symbol (%) will be replaced with the model name.
     */
    protected $model_string = '%_model';

    /**
     * The current request's view. Automatically guessed
     * from the name of the controller and action
     */
    protected $view = '';

    /**
     * An array of variables to be passed through to the
     * view, layout and any asides
     */
    protected $data = array();

    /**
     * The name of the layout to wrap around the view.
     */
    protected $layout;

    /**
     * An arbitrary list of asides/partials to be loaded into
     * the layout. The key is the declared name, the value the file
     */
    protected $asides = array();

    /**
     * A list of helpers to be autoloaded
     */
    protected $helpers = array();

    //Vars used in the base methods defined below - see end of class
    protected $_q;  //used to hold the data returned
    protected $_presenter = '';  //The presenter for this class
    // protected $_class_name; //The name of this class




    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    /**
     * Initialise the controller, tie into the CodeIgniter superobject
     * and try to autoload the models and helpers
     */
    public function __construct()
    {
        parent::__construct();

        //Set owner_id and load vars
        define ('OWNER_ID', 22220); ///////////////////////////////////Set this on login!
        $this->config->load('client_configs/' . OWNER_ID);
        $this->load->helper('inflector');
        //$this->load->helper('partial');

        //Show profiler if requested (in dev env only)
        $this->output->enable_profiler(ENVIRONMENT === 'development' && isset($_GET['debug']));

        //Set up the main vars
        $this->_main_model_name();

        //Load required classes
        $this->_load_models();
        $this->_load_helpers();
        $this->_load_presenter();


    }

    /* --------------------------------------------------------------
     * VIEW RENDERING
     * ------------------------------------------------------------ */

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
     * Automatically load the view, allowing the developer to override if
     * he or she wishes, otherwise being conventional.
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
            $view = (!empty($this->view)) ? view($this->view) : view($this->router->method);

            //$view = (!empty($this->view)) ? $this->config->item('layout_folder') . '/' . $this->view : $this->config->item('layout_folder') . '/' . $this->router->directory . $this->router->class . '/' . $this->router->method;

            // Load the view into $yield
            $data['yield'] = $this->load->view($view, $this->data, TRUE);

            // Do we have any asides? Load them.
            if (!empty($this->asides))
            {
                foreach ($this->asides as $name => $file)
                {
                    $data['yield_'.$name] = $this->load->view($file, $this->data, TRUE);
                }
            }

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

    /* --------------------------------------------------------------
     * MODEL LOADING
     * ------------------------------------------------------------ */

    /**
     * Load models based on the $this->models array
     */
    private function _load_models()
    {
        //We load the models in the $this->models array, so...

        //Add the assoc models to this list and remove dups
        $this->models = array_unique(array_merge($this->_assoc_models, $this->models));

        //Load each model in this array
        foreach ($this->models as $model)
        {
            $this->load->model($this->_model_name($model), $model);
        }
    }

    /**
     * Returns the loadable model name based on
     * the model formatting string
     */
    protected function _model_name($model)
    {
        return str_replace('%', $model, $this->model_string);
    }
    
    /**
     * Returns the main model name based on
     * the model formatting string
     */
    protected function _main_model_name()
    {
        $this->main_model = singular($this->router->class);
    }

  
    /* --------------------------------------------------------------
     * HELPER LOADING
     * ------------------------------------------------------------ */

    /**
     * Load helpers based on the $this->helpers array
     */
    private function _load_helpers()
    {
        foreach ($this->helpers as $helper)
        {
            $this->load->helper($helper);
        }
    }

    /* --------------------------------------------------------------
     * PRESENTER LOADING
     * ------------------------------------------------------------ */

    /**
     * Load presenter based on the $this->_presenter var
     */
    private function _load_presenter()
    {
        if ($this->_presenter === FALSE) return;

        if ($this->_presenter === '')
        {
            $this->_presenter = $this->main_model;
        }
        $this->_presenter = $this->main_model . '_Presenter';

        require_once (APPPATH . 'presenters/' . $this->_presenter . '.php');

    }

    /* --------------------------------------------------------------
     * Tables & pagination
     * ------------------------------------------------------------ */

    /**
     * Sets up pagination (uses application/config/pagination.php to customise for Bootstrap)
     */
    public function pagination($config)
    {
        $retval = array();

        $this->pagination->initialize($config);
        $retval['pagination_links'] = $this->pagination->create_links();
        $retval['pagination_text'] = 'Viewing records ' . $config['offset'] . ' to ';
        $retval['pagination_text'] .= $config['offset'] + $config['per_page'];
        $retval['pagination_text'] .= ' of ' . $config['total_rows'] . ' records';

        return $retval;
    }


    /* --------------------------------------------------------------
     * BASE METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are the base methods for all controllers
     */
    
    public function set_view($method = 'index')
    {
        $view = element($method, $this->view_settings, 'none-returned');

        if ($view == 'no-view')
            $this->view = FALSE;
        
        elseif ($view !== 'none-returned')
            $this->view = $view;
    }

    public function index()
    {
        $this->set_view('index');
    }


    // public function index()
    // {
    //     //No need for index() as this is done via an ajax table 
    // }

    // public function show($id = NULL)
    // {
    //     //Query contacts table for a record where 'id' = $id
    //     if (!$id) $id = $this->input->post('id');
    //     $this->_q = $this->{$this->main_model}->get($id);
        
    //     //If we return a record, then set up the record...
    //     if (isset($this->_q->id))
    //     {
    //         $id = $this->_q->id;

    //         //Get associated records
    //         foreach ($this->_assoc_models as $m)
    //         {
    //             //$this->load->model($m);
    //             $this->_q->{plural($m)} = $this->{$m}->get_associated_records($id); 
    //         }

    //         //Create a Presenter object to handle this data
    //         $this->data[$this->main_model] = new $this->_presenter($this->_q);
    //     }

    //     //...otherwise, set a message and go to index
    //     else
    //     {
    //         $this->session->set_userdata(array('message' => '[not_found]'));
    //         redirect(site_url($this->router->class));
    //     }
    // }
        
        

    // public function create($view = 'show')
    // {
    //     //Set the view and create an empty presenter object
    //     $this->view = $view;
    //     $this->data[$this->main_model] = new $this->_presenter();
    // }


    // public function edit($id = FALSE)
    // {
    //     //Don't autoload a view - we're going to redirect to $this->show()
    //     $this->view = FALSE;
    //     $this->session->unset_userdata('message');

    //     if ($id && $this->input->post())
    //     {
    //         //If we have passed an id and we have POST data, then its an update
    //         $this->{$this->main_model}->update($id, $this->input->post());
    //         $message = array('message' => '[updated]');
    //     }
    //     elseif (!$id && $this->input->post())
    //     {
    //         //Otherwise, if we only have POST data its an insert
    //         $id = $this->{$this->main_model}->insert($this->input->post());
    //         $message = array('message' => '[created]');
    //     }
    //     else 
    //     {
    //         //Otherwise, something bad has gine wrong
    //         $message = array('message' => '[uhoh]');
    //     }

    //     //is it an ajax call?
    //     if ($this->input->is_ajax_request())
    //     {
    //         echo json_encode(array('message' => $message['message']));
    //     }

    //     else
    //     {
    //         //Set the message to show the user
    //         $this->session->set_userdata($message);
    //         redirect(site_url($this->router->class . '/show/' . $id));
    //     }
    // }

    // public function delete($id)
    // {
    //     $this->view = FALSE;
    //     $this->session->unset_userdata('message');

    //     // Destroy a record (not really - 'softdelete' it!)
    //     if ($this->{$this->main_model}->delete($id))
    //     {
    //         $message = array('message' => '[deleted]'); 
    //     }
    //     else 
    //     {
    //         //Otherwise, something bad has gine wrong
    //         $message = array('message' => '[uhoh]');
    //     }
        

    //     if ($this->input->is_ajax_request())
    //     {
    //         echo json_encode(array('message' => $message['message']));
    //     }

    //     else
    //     {
    //         //Set the message to show the user
    //         $this->session->set_userdata($message);
    //         redirect(site_url($this->router->class));
    //     }
    // }


    


    

}