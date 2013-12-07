<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Test extends MY_Controller
{

	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'private' here
     */
    
	private $_models = array(
		'test' => array(
			'join' => array(
				array(
					'table' => 'contacts',
					'join_on' => 'contacts.id=tests.contact_id',
					'join_type' => '',
					'join_fields' => array('tags.tag_id', 'tags.tag_id')
					),
				),
			),
		
		// 'contact' => array(
		// 	'where' => array(
		// 		array('contact_id' => '%id%'),
		// 		),
		// 	'join' => array(
		// 		array(
		// 			'table' => 'users',
		// 			'join_on' => 'users.id=contacts.user_id',
		// 			'join_type' => '',
		// 			'join_fields' => array('tags.tag_id', 'tags.tag_id')
		// 			),
		// 		),
		
		);

	

	// private $_layout = FALSE; 	//Defaults to 'application' - override here with false or another name
	
	// private $_view_settings = array(); 	//Defaults to 'application' - override here with false or another name
	
	// private $_presenter = FALSE; 	//Defaults to $this->main_model - override here with false or another name
	
	// private $_main_model = FALSE;	//Defaults to class name, but overwrite or set to FALSE

	

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

}