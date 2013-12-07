<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Contacts extends MY_Controller
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
				array('contact_id' => '%id%'),
				),
			),
			// 'join' => array(
			// 	array(
			// 		'table' => 'users',
			// 		'join_on' => 'users.id=contacts.user_id',
			// 		'join_type' => '',
			// 		'join_fields' => array('tags.tag_id', 'tags.tag_id')
			// 		),
            //'other' => array(   //ensure this is a valid active record method
                // 'limit' => 4,
                // ),         
				// ),
		'relationship' => array(
			'where' => array(
				array('contact_id' => '%id%'),
				),
			'join' => array(
				array(
					'table' => 'contacts',
					'join_on' => 'relationships.other_contact_id=contacts.id',
					'join_type' => '',
					'join_fields' => array('contacts.first_name', 'contacts.last_name')
					),
				),
			),
		'order' => array(
			'where' => array(
				array('contact_id' => '%id%'),
				),
			),
		'tag_join' => array(
			'where' => array(
				array('contact_id' => '%id%'),
				),
			'join' => array(
				array(
					'table' => 'tags',
					'join_on' => 'tag_joins.tag_id=tags.id',
					'join_type' => '',
					'join_fields' => array('tags.tag_name')
					),
				),
			),
		'lead' => array(
			'where' => array(
				array('contact_id' => '%id%'),
				),
			),
		
		);

	// protected $_layout = FALSE; 	//Defaults to 'application' - override here with false or another name
	
	// protected $_view_settings = array(); 	//Defaults to 'application' - override here with false or another name
	
	// protected $_presenter = FALSE; 	//Defaults to $this->main_model - override here with false or another name
	
	// protected $_main_model = FALSE;	//Defaults to class name, but overwrite or set to FALSE

	

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