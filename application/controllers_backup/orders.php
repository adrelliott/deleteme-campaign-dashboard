<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Orders extends MY_Controller
{
	//What models should we load?
	public $models = array('contact_action');

	//What other tables are assoc with these records?
	protected $_assoc_models = array('order_items');

	// protected $_presenter = ''; //Define a new name or pass FALSE

	//What views are we using? Defaults to views/__CLASS__/__METHOD__
	// public $view_settings = array();

	public function __construct()
	{
		parent::__construct();
	}


	public function show($id = NULL)
	{
		$this->set_view($this->input->post('view'));

		//Get the Id, if passed, and load the record
		if (!$id) $id = $this->input->post('id');

		//Query contacts table for a record where 'id' = $id
		$this->q = $this->{$this->main_model}->get($id);
		
		//If we return a record, then set up the record...
		if (isset($this->q->id))
		{
			$id = $this->q->id;

			//Get associated records
			foreach ($this->_assoc_models as $m)
			{
				//$this->load->model($m);
				// $this->q->{plural($m)} = $this->{$m}->get_associated_records($id);	
				$this->{$m}->get_associated_records($id);
			}

			//Create a Presenter object to handle this data
			$this->q = (object)array_merge((array)$this->input->post(), (array) $this->q);
			$this->data{$this->main_model} = new $this->_presenter($this->q);
		}

		//...otherwise, set a message and go to index
		else
		{
			$this->session->set_userdata(array('message' => '[not_found]'));
			redirect(site_url($this->router->class));
		}
	}
		
		

	public function create()
	{
		
		//Set the view and create an empty presenter object
		if (element('modal',$this->input->post(), FALSE))
			$this->layout = 'modal';

		$this->set_view($this->input->post('view'));
		$this->data{$this->main_model} = new $this->_presenter();
		
	}


	public function edit($id = FALSE)
	{
		//Don't autoload a view
		$this->view = FALSE;

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

		//Set the message to show the user
		$this->session->set_userdata($message);

		if ($this->input->is_ajax_request())
		{
			
			echo $this->messages->show();
	/********************************** Remove this line! ***********/
	$this->output->enable_profiler(FALSE);
		}
		else redirect(site_url('contacts/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->contact->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		redirect(site_url('contacts'));
	}


	public function show_board()
	{
		$this->view = 'show_board';
		$this->index();
	}
	
}