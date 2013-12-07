<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for Dashboard
*/
 // dump(constant("USER_ID"));

class Dashboard extends MY_Controller
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
		'contact_action' => array(
			'where' => array(
				array('action_type' => 'task'),
				array('user_id' => '%user_id%')
				),
            'other' => array(   //ensure this is a valid active record method
                'limit' => 4,
                ),
			),
		'saved_search' => array(
			'where' => array(
				array('search_type' => 'stat'),
				array('id' => '11000'),
				),
			'id_as_key' => TRUE,
			),
			// 'join' => array(
			// 	array(
			// 		'table' => 'users',
			// 		'join_on' => 'users.id=contacts.user_id',
			// 		'join_type' => '',
			// 		'join_fields' => array('tags.tag_id', 'tags.tag_id')
			// 		),
				// ),
		
		);

	// protected $_layout = FALSE; 	//Defaults to 'application' - override here with false or another name
	
	protected $_view_settings = array('index' => 'dashboard'); 	//Defaults to 'application' - override here with false or another name
	
	//protected $_presenter = FALSE; 	//Defaults to $this->main_model - override here with false or another name
	
	protected $_main_model = FALSE;	//Defaults to class name, but overwrite or set to FALSE

	//What models should we load?
	// public $models = array('contact', 'contact_action', 'saved_search');

	// // What view are we using?
	// protected $view = 'dashboard';

	//We don't use a presenter here
	// protected $_presenter = FALSE;

	
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
	}

	public function index()
	{
		parent::index();
		if (count($this->models))
		{	
			foreach ($this->models as $model => $attr)
	        {   
	            $this->load->model($this->_model_name($model), $model);
	            $this->q->{plural($model)} = $this->$model->list_records($this->models[$model]);
	        }
	        $this->create_presenter(); 
	    }
	    // dump(plural('saved_search'));
	}
	
}
