<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
* Controller for contacts table
*/

class Relationships extends MY_Controller
{
	//What models should we load?
	public $models = array('relationship');

	//Set the layout to false (we're loading into a modal window)
	public $layout = 'modal';

	//Overwrite default views (defaults ot the name of the method)
	public $view_settings = array('create' => 'show', 'edit' => 'no-view', 'delete' => 'no-view');


	public function __construct()
	{
		parent::__construct();	}

	// Not used
	public function index()
	{
		
	}

	public function show($id = FALSE)
	{
		
	}

	public function create()
	{
		$this->set_view('create');
		//Convert the $_POST array into an object
		$post = $this->array_to_object($this->input->post());
		$this->data['relationship'] = new Relationship_Presenter($post);
	}
	// public function create2($contact_id)
	// {
	// 	//Set up an object to pass to relationship_presenter
	// 	$a->contact_id = $contact_id;
	// 	$this->data['relationship'] = new Relationship_Presenter($a);

	// 	$this->layout = 'modal';
// die(dump($this->data));
		//Autoloads the view 'Relationships/create'
	// }


	public function edit($id = FALSE)
	{
		$this->view = FALSE;
		$this->layout = FALSE;
		$message = array('message' => '[uhoh]');

		if ($id && $this->input->post())
		{
			//update
			$id = $this->relationship->update($id, $this->input->post());
			if ($id) $message = array('message' => '[updated_action]');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id1 = $this->relationship->insert($this->input->post());

			//Now create a similar record for the other contact
			$post = $this->input->post();
			$this_id = $post['contact_id'];
			$post['contact_id'] = $post['other_contact_id'];
			$post['other_contact_id'] = $this_id;
			
			$id2 = $this->relationship->insert($post);

			if ($id1 && $id2) $message = array('message' => '[updated_action]');
		}

		$this->session->set_userdata($message);

		//if its ajax then do this:
		////is it an ajax call?
		if ($this->input->is_ajax_request())
		{
			echo json_encode(array('message' => $message['message'], 'row' => $this->get_row($id)));
		}
		
		else redirect(site_url('contacts/show/' . $this->input->post('contact_id')));

	}

	public function get_row($id, $col_names = FALSE)
	{
		$this->view = FALSE;
		//Get the row from this table with the id of $id
		//$id=75757575;
		$q = $this->relationship->get($id);
		//if ( ! isset($q->id)) $q;
		return json_encode($q);
		 
	}


	public function delete($id, $contact_id = NULL)
	{
		$this->view = FALSE;
		$this->layout = FALSE;
		// Destroy a record (not really - 'softdelete' it!)
		// 
		// do;t forget to delete the relationship record for the other person too!
		// 
		// 
		$this->relationship->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		if ($this->input->is_ajax_request()) echo $this->messages->show();
		else redirect(site_url('contacts/show/' . $contact_id));
	}

	public function toggle_completed($id, $contact_id = NULL)
	{
		$this->view = FALSE;

		$this->relationship->toggle_value($id,'completed');
		$message = array('message' => '[updated_action]');

		//if its ajax then do this:
		if ($this->input->is_ajax_request())
		{
			echo $this->messages->show();
		}
		else redirect(site_url('contacts/show/' . $contact_id));

	}







}