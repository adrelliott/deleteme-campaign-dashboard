<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Dashboard_presenter extends Presenter
{

	public function __construct()
	{
		parent::construct();
		//$this->load->model('saved_search')
	}
	public function get_stat()

	//Create full name
	public function full_name()
	{
		//return $this->contact->first_name . ' ' . $this->contact->last_name;
	}

	//Create ownership, e.g John's
	public function name_owned()
	{
		//return $this->contact->first_name . '\'s';
	}

	







	

	
}