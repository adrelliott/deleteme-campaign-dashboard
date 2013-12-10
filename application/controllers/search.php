<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for saved searches
*/

class Search extends MY_Controller
{

	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
	protected $_models = array(
        'product' => array(
            ),  
        );


	// protected $_layout = FALSE; 	//Defaults to 'application' - override here with false or another name
	
	protected $_view_settings = array('export' => 'no-view', 'results' => 'show_results'); 	//Defaults to 'application' - override here with false or another name
	
	protected $_presenter = 'saved_search'; 	//Defaults to $this->main_model - override here with false or another name
	
	protected $_main_model = 'saved_search';	//Defaults to class name, but overwrite or set to FALSE

	

	/* --------------------------------------------------------------
     * METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are defined in MY_Controller. You can extend them (return parent::{method_name}() ) or over-ride them by defning a new method here.
     *
     */
    
	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

    public function create()
    {
        foreach ($this->models as $model => $attr)
        {   
            $this->load->model($this->_model_name($model), $model);
            $this->q->{plural($model)} = $this->$model->list_records($this->models[$model]);
        }
        
        parent::create();
    }

	public function perform_search($id = FALSE)
	{
		dump($this->input->post());
		die();
	}

	public function results($id)
	{
		$this->show($id);
	}

	public function export($id, $offset = NULL)
	{
		$this->id = $id;
		//Get the saved search
		$d = $this->m->get($this->id);

		if (! isset($d->id))
        {
            $this->retval->message = '[not_found]';
            $this->redirect('index');
        }
        else 
        {
            //Set id & load libs
			$this->load->dbutil();
	  		$this->load->helper('file');
	  		$this->load->helper('download');

	  		//Load model
			$m = strtolower($d->model_name . '_model');
			$this->load->model($m);

			//Do the saved search
			$q = $this->$m->do_saved_search($d, 'export');

			//Set up and download the file
			$filename = $d->search_name . '_' . date('dmy_His') . '.csv';
			$export = $this->dbutil->csv_from_result($q, ",", "\n");
			force_download($filename, $export);

			redirect(site_url('saved_searches/results/' . $id . '/' . $offset));

        }

		//
		

		//do saved search
	}

}