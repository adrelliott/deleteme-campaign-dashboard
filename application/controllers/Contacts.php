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
		$this->data['result'] = new Contact_Presenter($this->contact->get_all());
		//$this->data['22220'] = new Contact_Presenter($this->contact->get_many_by('owner_id', '22220'));
		//$this->data['11110'] = new Contact_Presenter($this->contact->get_many_by('owner_id', '11110'));
	}

	public function show($id = NULL)
	{
		//just show an empty record if $id == 'new'
		if ($id == 'new')
		{
			$this->data['result'] = new Contact_Presenter();
			return;
		} 

		//Get the query
		$query = $this->contact->get($id);

		//Do we have any results?
		if (isset($query->id))
		{
			$this->data['result'] = new Contact_Presenter($query);
		}

		//Nope, no results
		else 
		{
			//set message & direct back to contents
			$this->session->set_flashdata('message', 'Ooops. Not found anyone. Try one of these:');
			redirect(site_url('contacts'));
		} 

		//

/*
		if (! $id) //if id hasn't been passed
		{
			redirect(site_url('contacts'));
			return;
		}
		
		*/
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