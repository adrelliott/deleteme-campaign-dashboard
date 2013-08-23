<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
{
	//public $data = array();

	public $models = array('contact', 'contact_action');

	public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead


	public function __construct()
	{
		parent::__construct();
		require_once APPPATH . 'presenters/Contact_Presenter.php';
		$this->output->enable_profiler(TRUE);
	}

	/*
	Lists all contacts
	 */
	public function index()
	{
		$this->data['contacts'] = $this->contact->get_all();
		//$this->data['22220'] = new Contact_Presenter($this->contact->get_many_by('owner_id', '22220'));
		//$this->data['11110'] = new Contact_Presenter($this->contact->get_many_by('owner_id', '11110'));
	}

	public function show($id = NULL)
	{
		//Query contacts table for a record where 'id' = $id
		$query['contacts'] = $this->contact->get($id);

		//If a record has been returned, get the related records and load the view
		if (isset($query['contacts']->id))
		{
			$query['contact_actions'] = $this->contact_action->get_many_by('contact_id', $id);
			$query['contact_actions'] = $this->contact_action->sort_actions($query['contact_actions']);
			//$this->data['orders'] = $this->contact->get($id);
			//$this->data['leads'] = $this->contact->get($id);
			
			//Copy across to $this->data to pass to view
			$this->data = $query;
		}

		//Otherwise, set a message and go to index
		else
		{
			$this->session->set_flashdata('message', 'Ooops. Not found anyone. Try one of these:');
			redirect(site_url('contacts'));
		}
	}
		
		

	public function create()
	{
		//Shows a blank record with the form action = create/edit
	}

	public function edit($id = FALSE)
	{
		if ($id && $this->input->post())
		{
			//update
			//unset($this->input->post('SUBMIT'));
			$this->contact->update($id, $this->input->post());
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			//unset($this->input->post('SUBMIT'));
			$id = $this->contact->insert($this->input->post());
		}
		else 
		{
			$this->session->set_flashdata('message', 'Ooops. No record info to update');
		}

		redirect(site_url('contacts/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
	}
}