<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contact_actions extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//Set the layout to false (we're loading into a modal)
	public $layout = FALSE;
	//What views are we using? Defaults to views/__CLASS__/__METHOD__
	//public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead


	public function __construct()
	{
		parent::__construct();
		require_once (APPPATH . 'presenters/contact_action_presenter.php');
	}

	/*
	Lists all contacts
	 */
	public function index()
	{
		//$this->data['contacts'] = $this->contact->get_all();
	}


	public function show($id = NULL)
	{
		//Query contacts table for a record where 'id' = $id
		$this->data['contact_action'] = $this->contact_action->get($id);
		
		//If there is no record found, set a message and go to index
		if ( ! count($this->data['contact_action']))
		{
			$this->session->set_flashdata(array('message' => '[not_found]'));
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
			$this->contact_action->update($id, $this->input->post());
			$message = array('message' => '[updated]');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id = $this->contact_action->insert($this->input->post());
			$message = array('message' => '[created]');
		}
		else 
		{
			$message = array('message' => '[uhoh]');
		}

		$this->session->set_flashdata($message);

		//if its ajax then do this:
		if ($this->input->is_ajax_request())
		{
			$this->load->view('partials/bootstrap/_form_contact_notes');
		}
		//
		//
		redirect(site_url('contact_actions/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact_action->delete($id);
		$this->session->set_flashdata('message', '[deleted]');

		redirect(site_url('contacts'));
	}







	
}