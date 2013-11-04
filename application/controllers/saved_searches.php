<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for saved searches
*/

class Saved_searches extends MY_Controller
{
	//What models should we load?
	public $models = array('saved_search');

	//What views are we using? Defaults to views/__CLASS__/__METHOD__
	//public $view ; //FALSE = load no view, 'view_name' = load view_name.php instead

	public function __construct()
	{
		parent::__construct();
		require_once (APPPATH . 'presenters/saved_search_presenter.php');
		$this->load->library('pagination');
		$this->load->helper('inflector');

		//$this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		$this->data['saved_searches'] = $this->saved_search->get_all();
	}


	public function show($id = NULL)
	{
		//Query saved_searches table for a record where 'id' = $id
		$q = $this->saved_search->get($id);
		
		//If we return a record, then do the query & set up the  'edit record' view
		if (isset($q->id))
		{
			//Do the saved search
			if (isset($q->query))	//what about if its not been created yet?
			{
				//Do the query
				$q->data = $this->paginate_results($id, $q->query);
			}

			//Set up an object to contain details of the saved_search record itself
			$this->data['saved_search'] = new saved_search_Presenter($q);
		}

		//...otherwise, set a message and go to index
		else
		{
			$this->session->set_userdata(array('message' => '[not_found]'));
			redirect(site_url('saved_searches'));
		}
	}

	public function export($id, $offset = NULL, $type = 'csv')
	{
		//Don't autoload a view
		$this->view = FALSE;

		//Load the libraries
		$this->load->dbutil();
  		$this->load->helper('file');
  		$this->load->helper('download');

  		$q = $this->saved_search->get($id);
		
		//If we return a record, then do the query & set up the  'edit record' view
		if (isset($q->id))
		{
			//Do the saved search
			if (isset($q->query))	//what about if its not been created yet?
			{
				//Do the query
				$r = $this->saved_search->do_query($q->query);
				
				//define the name and 
				$filename = $q->id . '_csv_' . date('dmy_His') . '.csv';
				$export = $this->dbutil->csv_from_result($r, ",", "\n");
				force_download($filename, $export);
				$this->show($id, $offset);

				// $results = $this->saved_search->do_query($q->query);
				
				// //define the name and 
				// $filename = ($q->search_name ? $q->search_name : 'csv_download') . 'csv';
				// $export = $this->dbutil->csv_from_result($results, ",", "\n");
				// force_download($filename, $export);
				// $this->show($id, $offset);

			}

		}

	}


	public function paginate_results($id, $sql)
	{
		$retval;

		//Set up the config
		$config = array();
        $config["base_url"] = base_url() . 'saved_searches/show/' . $id;
        $config["total_rows"] = $this->saved_search->num_rows_in_query($sql);
        $config["per_page"] = 7;
        $config["uri_segment"] = 4;
        $config['offset'] = ($this->uri->segment(4)) ? (int)$this->uri->segment(4) : 0;;

        $this->pagination->initialize($config);

 		//Do the query...
		$retval->results = $this->saved_search->do_query($sql, $config['per_page'], $config['offset']);

		//Set up links & other info
		$retval->results->result_array();
		//$retval->data = $retval->results->result();
		$retval->links = $this->pagination->create_links();
		$retval->pagination = $config;
		//$retval->query = $config['total_rows'];

		//die(dump($retval));

		return $retval;
	}
	
	
		
		

	public function create()
	{
		//Shows a blank record with the form action = create/edit
		$this->data['saved_search'] = new saved_search_Presenter();
	}


	public function edit($id = FALSE)
	{
		//Don't autoload a view
		$this->view = FALSE;

		if ($id && $this->input->post())
		{
			//update
			$this->saved_search->update($id, $this->input->post());
			$message = array('message' => '[updated]');
		}
		elseif (!$id && $this->input->post())
		{
			//Insert
			$id = $this->saved_search->insert($this->input->post());
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
		else redirect(site_url('saved_searches/show/' . $id));
	}

	public function delete($id)
	{
		// Destroy a record (not really - 'softdelete' it!)
		$this->saved_search->delete($id);
		$this->session->set_userdata('message', '[deleted]');

		redirect(site_url('saved_searches'));
	}

	
}