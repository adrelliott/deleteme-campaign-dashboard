<?php 

/**
* Controller for contacts table
*/
class Contacts extends MY_Controller
{
	public $data = array();

	public $models = array('contact');

	public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead


	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
	}

	/*
	Lists all contacts
	 */
	public function index()
	{
		$this->data['contacts_list'] = $this->contact->get_all();
	}
}