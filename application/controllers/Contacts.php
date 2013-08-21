<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
{
	//public $data = array();

	public $models = array('contact');

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
		$this->data['contacts_list'] = new Contact_Presenter($this->contact->get_all());
	}

	public function show($id = FALSE)
	{
		if ($id) $this->data['contact'] = new Contact_Presenter($this->contact->get($id));

		else redirect(site_url('contacts'));
	}

	public function create()
	{
		//  insert a new record
	}

	public function edit($id = FALSE)
	{
		// Update a record
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
	}
}