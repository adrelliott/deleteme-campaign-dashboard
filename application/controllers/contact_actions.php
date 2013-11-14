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

	// Just returns a list of contact_actions, used for when refreshing a datatable
	public function index($contact, $action_type)
	{
		
		// $this->layout = FALSE;
		// $this->data['q'] = $this->contact_action->get_records_by_action($contact, $action_type);
		// $this->data['action_type'] = $action_type;
		// return $this->load->view('bootstrap/contact_actions/index.php', $this->data, TRUE);
		//echo $this->load->view($this->view, $this->data, TRUE);
	
		
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

		$this->layout = 'modal';
		//Autoloads the view 'contact_actions/show' which includes the right partial for $action_type
	}

	public function create($action_type, $contact_id)
	{
		//Set up an object to pass to Contact_action_presenter
		$a->action_type = $action_type;
		$a->contact_id = $contact_id;
		$this->data['contact_action'] = new Contact_action_Presenter($a);

		$this->layout = 'modal';
//die(dump($this->data));
		//Autoloads the view 'contact_actions/create'
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
		$this->session->set_userdata($message);

		//if its ajax then do this:
		if ($this->input->is_ajax_request())
		{
			//return a JSON array of the row just edited/inserted
			echo $this->get_row($id);
		}
		else redirect(site_url('contacts/show/' . $this->input->post('contact_id')));

	}

	public function get_row($id, $col_names = FALSE)
	{
		$this->view = FALSE;
		//Get the row from this table with the id of $id
		// $id=75757575;
		$q = $this->contact_action->get($id);
		//if ( ! isset($q->id)) $q;
		return json_encode($q);
		 
	}


	public function delete($id, $contact_id = NULL)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact_action->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		if ($this->input->is_ajax_request()) echo $this->messages->show();
		else redirect(site_url('contacts/show/' . $contact_id));
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