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
	

	public function __construct()
	{
		parent::__construct();
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
			$this->id = $q->id;
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

	// public function get_row($id, $col_names = FALSE)
	// {
	// 	$this->view = FALSE;
	// 	//Get the row from this table with the id of $id
	// 	//$id=75757575;
	// 	$q = $this->contact_action->get($id);
	// 	//if ( ! isset($q->id)) $q;
	// 	return json_encode($q);
		 
	// }

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

	// public function delete_old($id, $contact_id = NULL)
	// {
	// 	$this->set_view('show');
	// 	// Destroy a record (not really - 'softdelete' it!)
	// 	$this->contact_action->delete($id);
	// 	$this->session->set_userdata(array('message', '[deleted]', 'post' => '', 'q' => ''));

	// 	if ($this->input->is_ajax_request()) echo $this->messages->show();
	// 	else redirect(site_url('contacts/show/' . $contact_id));
	// }

	public function toggle($col, $id = NULL, $contact_id = NULL)
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

	// public function toggle_completed($id, $contact_id = NULL)
	// {
	// 	$this->view = FALSE;

	// 	$this->contact_action->toggle_value($id,'completed');
	// 	$message = array('message' => '[updated_action]');

	// 	//if its ajax then do this:
	// 	if ($this->input->is_ajax_request())
	// 	{
	// 		echo $this->messages->show();
	// 	}
	// 	else redirect(site_url('contacts/show/' . $contact_id));

	// }







}