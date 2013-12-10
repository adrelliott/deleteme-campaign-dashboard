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
            'join' => array(
                array(
                    'table' => 'users',
                    'join_on' => 'users.id=contact_actions.user_id',
                    'join_type' => '',
                    'join_fields' => array('users.first_name AS user_first_name', 'users.last_name AS user_last_name')
                    ),
                ),
			),
			
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