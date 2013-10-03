<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contact_actions extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//Set the layout to false (we're loading into a modal window)
	public $layout = FALSE;
	//public $layout = 'modal';


	public function __construct()
	{
		parent::__construct();
		require_once (APPPATH . 'presenters/contact_action_presenter.php');
	}

	public function index()
	{
		//Never call this, do we?
	}

	public function show($id = FALSE)
	{
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
		//Autoloads the view 'show' which includes the right partial for $action_type
	}

	public function create($action_type)
	{
		$this->data['contact_action'] = new Contact_action_Presenter();

		//Shows a blank record with the form action = create/edit
		//$this->data['action_type'] = $action_type;
	}
	

	public function edit($id = FALSE)
	{
		$this->view = FALSE;
		if ($id && $this->input->post())
		{
			//update
			$this->contact_action->update($id, $this->input->post());
			$message = array('message' => '[updated_action]');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id = $this->contact_action->insert($this->input->post());
			$message = array('message' => '[updated_action]');
		}
		else 
		{
			$message = array('message' => '[uhoh]');
		}

		/*if ( !strpos($message['message'], '['))
		    $message = '<strong>Right!</strong> I\'ve ' . $message['message'] . ' that record for you! <br/>(Take a look if you don\'t believe me...)';*/
		$this->session->set_userdata($message);

		//if its ajax then do this:
		if ($this->input->is_ajax_request())
		{
			//$this->view = FALSE;
			echo $this->messages->show();
		}
		else redirect(site_url('contacts/show/' . $this->input->post('contact_id')));
		
	}

	public function delete($id, $contact_id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact_action->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		redirect(site_url('contacts/show/' . $contact_id));
	}







	
}