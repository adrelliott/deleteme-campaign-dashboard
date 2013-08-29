<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
{
	//What models should we load?
	public $models = array('contact', 'contact_action');

	//What views are we suing? Fedaults to views/__CLASS__/__METHOD__
	//public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead


	public function __construct()
	{
		parent::__construct();
		require_once (APPPATH . 'presenters/contact_presenter.php');
	}

	/*
	Lists all contacts
	 */
	public function index()
	{
		$this->data['contacts'] = $this->contact->get_all();
	}


	public function show($id = NULL)
	{
		//Query contacts table for a record where 'id' = $id
		$this->data['contact'] = $this->contact->get($id);
		
		//If there is no record found, set a message and go to index
		if ( ! count($this->data['contact']))
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

		$this->session->set_flashdata($message);
		redirect(site_url('contacts/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact->delete($id);
		$this->session->set_flashdata('message', '[deleted]');

		redirect(site_url('contacts'));
	}









	public function test()
	{
		//$this->layout = FALSE;
		$this->view = 'contacts/post';
	}

	
}