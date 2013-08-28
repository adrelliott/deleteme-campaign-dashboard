<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contact_actions extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//What views are we suing? Defaults to views/__CLASS__/__METHOD__
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
		if ( ! isset($this->data['contact_action']))
		{
			$this->session->set_flashdata('message', '<strong>Ooops.</strong> Not found this record.');
		}
	}
		
		

	public function create()
	{
		//Shows a blank record with the form action = create/edit
	}

	public function edit($id = FALSE)
	{
	
	}

	public function delete($id)
	{
	}






	
}