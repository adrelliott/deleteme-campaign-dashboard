<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contact_actions extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//What views are we suing? Fedaults to views/__CLASS__/__METHOD__
	//public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead


	public function __construct()
	{
		parent::__construct();
		//require_once (APPPATH . 'presenters/contact_presenter.php');
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