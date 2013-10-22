<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
{
	//What models should we load?
	public $models = array('contact', 'contact_action');

	//What views are we using? Defaults to views/__CLASS__/__METHOD__
	//public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead

	public function __construct()
	{
		parent::__construct();
		require_once (APPPATH . 'presenters/contact_presenter.php');
	}

	public function index()
	{
		//$this->data['contacts'] = $this->contact->get_all();
	}

	public function show($id = NULL)
	{
		//Query contacts table for a record where 'id' = $id
		$q = $this->contact->get($id);
		
		//If we return a record, then set up the record...
		if (isset($q->id))
		{
			$id = $q->id;

			//Get the other associated records
			$q->contact_actions = $this->contact_action->get_records($id);
			$q->orders = array();
			$q->tags = array();
			$q->relationships = array();

			//Create a Presenter object to handle this data
			$this->data['contact'] = new Contact_Presenter($q);
		}
		//...otherwise, set a message and go to index
		else
		{
			$this->session->set_userdata(array('message' => '[not_found]'));
			redirect(site_url('contacts'));
		}
	}
		
		

	public function create()
	{
		//Shows a blank record with the form action = create/edit
		$this->data['contact'] = new Contact_Presenter();
	}


	public function edit($id = FALSE)
	{
		//Don't autoload a view
		$this->view = FALSE;

		if ($id && $this->input->post())
		{
			//update
			$this->contact->update($id, $this->input->post());
			$message = array('message' => '[updated]');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id = $this->contact->insert($this->input->post());
			$message = array('message' => '[created]');
		}
		else 
		{
			$message = array('message' => '[uhoh]');
		}

		//Set the message to show the user
		$this->session->set_userdata($message);

		if ($this->input->is_ajax_request())
		{
			
			echo $this->messages->show();
	/********************************** Remove this line! ***********/
	$this->output->enable_profiler(FALSE);
		}
		else redirect(site_url('contacts/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		redirect(site_url('contacts'));
	}

	
	
}