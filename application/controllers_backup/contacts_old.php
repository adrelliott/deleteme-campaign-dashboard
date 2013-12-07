<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
{
	
	//What other models should we load? (note, related records are below)
	public $models = array('contact');

	//What other tables are assoc with these records?
	protected $_assoc_models = array('contact_action', 'relationship', 'order', 'tag_join', 'lead');

	// protected $_presenter = ''; //Define a new name or pass FALSE
	// 
	//public $layout = 'modal';
	
	//Overwrite default views (defaults ot the name of the method)
	// 1p ublic $view_settings = array('create' => 'show', 'edit' => 'no-view', 'delete' => 'no-view'); 
	


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

			//Get other datasets
			## Get tags
			# get users
			# 

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
		$this->set_view($this->input->post('view'));
		$this->data{$this->main_model} = new $this->_presenter();
	}


	public function edit($id = FALSE)
	{
		//Don't autoload a view - we're going to redirect to $this->show()
		$this->set_view('edit');
		$this->session->set_userdata(array('message', '[uhoh]', 'post' => '', 'q' => ''));
		$retval = array('message' => '[uhoh]', 'post' => $this->input->post());

		if ($id && $this->input->post())
		{
			//If we have passed an id and we have POST data, then its an update
			if ($this->{$this->main_model}->update_record($id, $this->input->post()))
			{
				$retval['message'] = '[updated]';
				$retval['q'] = ($this->{$this->main_model}->get($id));
			}
				
		}
		elseif (!$id && $this->input->post())
		{
			//Otherwise, if we only have POST data its an insert
			if ($id = $this->{$this->main_model}->insert_record($this->input->post()))
			{
				$retval['message'] = '[created]';
				$retval['q'] = ($this->{$this->main_model}->get($id));
			}	
		}

		//is it an ajax call?
		if ($this->input->is_ajax_request())
		{
			echo json_encode($retval);
		}

		else
		{
			//Set the message to show the user
			$this->session->set_userdata($retval);
			redirect(site_url($this->router->class . '/show/' . $id));
		}
	}

	public function delete($id)
	{
		$this->set_view('delete');
		$this->session->set_userdata(array('message', '[uhoh]', 'post' => '', 'q' => ''));
		$retval = array('message' => '[uhoh]', 'id' => $id);

		// Destroy a record (not really - 'softdelete' it!)
		if ($this->{$this->main_model}->delete($id))
		{
			$retval['message'] = '[deleted]';
			$retval['q'] = ($this->{$this->main_model}->get($id));
		}
		
		if ($this->input->is_ajax_request())
		{
			echo json_encode($retval);
		}

		else
		{
			//Set the message to show the user
			$this->session->set_userdata($retval);
			redirect(site_url($this->router->class));
		}
	}
	
	
}