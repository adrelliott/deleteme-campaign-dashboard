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
		//dump($this->data['contact']);
		
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




























public function index_old()
	{
		//Set up pagination config
		$config = array
		(	
		 	'per_page' => 10,	//Or can take from a client config array?
		 	'offset' => $this->uri->segment(3),	//change for staging *&production
		 	//'table' => $this->table,
		 	'base_url' => site_url('contacts/index'),
		 	'total_rows' => $this->contact->count_all_owner_records(),
		);

		//Do the query * buld the pagination array
		$this->data['contacts'] = $this->contact
		->limit($config['per_page'], $config['offset'])
		->contact->get_all();
		$this->data['pagination'] = $this->pagination($config);
	}

	public function test()
	{
		//$this->layout = FALSE;
		$this->view = 'contacts/post';
	}

	
}