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

		//What layout folder are we using? (Set in config/client_configs/{owner_id}.php)
		$this->layout = 'layouts/' . $this->config->item('layout_folder') . '/contacts';
/*@todo Move the above to my_controller?*/

	}

	/*
	Lists all contacts
	 */
	public function index()
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

	/*public function pagination($config)
	{
		$retval = array();

		$this->pagination->initialize($config);
		$retval['pagination_links'] = $this->pagination->create_links();
		$retval['pagination_text'] = 'Viewing records ' . $config['offset'] . ' to ';
		$retval['pagination_text'] .= $config['offset'] + $config['per_page'];
		$retval['pagination_text'] .= ' of ' . $config['total_rows'] . ' records';

		return $retval;
	}*/





	public function test()
	{
		//$this->layout = FALSE;
		$this->view = 'contacts/post';
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
			$this->session->set_flashdata('message', '<strong>Ooops.</strong> Not found anyone. Try one of these:');
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
			$this->session->set_flashdata('message', '<strong>Yay!</strong> Record updated!');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id = $this->contact->insert($this->input->post());
			$this->session->set_flashdata('message', '<strong>Woo hoo!</strong> New record created!');
		}
		else 
		{
			$this->session->set_flashdata('message', '<strong>Uh oh...</strong>. Couldn\'t find that record to change it.');
		}

		redirect(site_url('contacts/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact->delete($id);
		$this->session->set_flashdata('message', '<strong>They\'re OUTTA here!</strong> Deleted contact with id of ' . $id);

		redirect(site_url('contacts'));
	}
}