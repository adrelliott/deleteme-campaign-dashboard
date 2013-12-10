<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Tasks extends MY_Controller
{


    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
    
    protected $_presenter = 'contact_action';   //Defaults to $this->main_model - override here with false or another name
    
    protected $_main_model = 'contact_action';  //Defaults to class name, but overwrite or set to FALSE

    

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
        $attr = array(
            'where' => array(
                array('user_id' => $this->the_user->id),
                array('action_type' => 'task'),
                ),
            'join' => array(
             array(
                 'table' => 'users',
                 'join_on' => 'users.id=contact_actions.user_id',
                 'join_type' => '',
                 'join_fields' => array('users.first_name', 'users.last_name')
                 ),
            'id_as_key' => TRUE,
            ),
        );
        $this->q->task = $this->m->list_records($attr);
        
        parent::index();
    }

}