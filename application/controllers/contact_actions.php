<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
* Controller for contacts table
*/

class Contact_actions extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//Set the layout to false (we're loading into a modal window)
	public $layout = 'modal';
	//public $layout = 'modal';
	
	//Overwrite default views (defaults ot the name of the method)
	public $view_settings = array('edit' => 'no-view', 'delete' => 'no-view', 'toggle' => 'no-view'); 


	public function __construct()
	{
		parent::__construct();
	}

	// public function index()
	// {
			
	// }

	public function show($id = FALSE)
	{
		$this->set_view('show');

		//Get the Id, if passed, and load the record
		if (!$id) $id = $this->input->post('id');
		$q = $this->contact_action->get($id);
		
		//If we return a record, then set up the record...
		if (isset($q->id))
		{
			$this->data['contact_action'] = new Contact_action_Presenter($q);
			$this->data['action_type'] = $q->action_type;
		}
		//...otherwise, set a message and go to index
		else
		{
			$this->session->set_flashdata(array('message' => '[not_found]'));
		}

		//Autoloads the view 'contact_actions/show' which includes the right partial for $action_type
	}

	public function create($action_type, $contact_id)
	{
		$this->set_view('create');
		//Set up an object to pass to Contact_action_presenter
		$a->action_type = $action_type;
		$a->contact_id = $contact_id;
		$this->data['contact_action'] = new Contact_action_Presenter($a);

		//$this->layout = 'modal';
//die(dump($this->data));
		//Autoloads the view 'contact_actions/create'
	}


	public function edit($id = FALSE)
	{
		//Don't autoload a view - we're going to redirect to $this->show()
		$this->set_view('edit');
		$this->session->set_userdata(array('message', '[deleted]', 'post' => '', 'q' => ''));
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
	// {
	// 	$this->set_view('edit');
	
	// 	$this->session->unset_userdata('message');
	// 	$message = array('message' => '[uhoh]');

	// 	if ($id && $this->input->post())
	// 	{
	// 		//update
	// 		if ($this->contact_action->update($id, $this->input->post())) 
	// 			$message = array('message' => '[updated_action]');
	// 	}
	// 	elseif (!$id && $this->input->post())
	// 	{
	// 		//Insert
	// 		if ($id = $this->contact_action->insert($this->input->post()))
	// 			$message = array('message' => '[updated_action]');
	// 	}
		

	// 	$this->session->set_userdata($message);

	// 	//if its ajax then do this:
	// 	if ($this->input->is_ajax_request())
	// 	{
	// 		//return a JSON array of the row just edited/inserted
	// 		echo $this->get_row($id);
	// 		// $this->session->set_userdata(array('message' =>''));
	// 	}
	// 	else redirect(site_url('contacts/show/' . $this->input->post('contact_id')));

	}

	public function get_row($id, $col_names = FALSE)
	{
		$this->view = FALSE;
		//Get the row from this table with the id of $id
		//$id=75757575;
		$q = $this->contact_action->get($id);
		//if ( ! isset($q->id)) $q;
		return json_encode($q);
		 
	}


	public function delete($id, $contact_id = NULL)
	{
		$this->set_view('show');
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact_action->delete($id);
		$this->session->set_userdata(array('message', '[deleted]', 'post' => '', 'q' => ''));

		if ($this->input->is_ajax_request()) echo $this->messages->show();
		else redirect(site_url('contacts/show/' . $contact_id));
	}

	public function toggle($col, $id, $contact_id = NULL)
	{
		$this->set_view('toggle');
		$this->session->unset_userdata('message');
		$retval = array('message' => '[uhoh]', 'post' => $this->input->post());

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

	public function toggle_completed($id, $contact_id = NULL)
	{
		$this->view = FALSE;

		$this->contact_action->toggle_value($id,'completed');
		$message = array('message' => '[updated_action]');

		//if its ajax then do this:
		if ($this->input->is_ajax_request())
		{
			echo $this->messages->show();
		}
		else redirect(site_url('contacts/show/' . $contact_id));

	}







}