<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
* Controller for contacts table
*/

class Relationships extends MY_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
    //Set the layout to false (we're loading into a modal window)
    public $layout = 'modal';

    //Overwrite default views (defaults ot the name of the method)
    public $view_settings = array('create' => 'show', 'edit' => 'no-view', 'delete' => 'no-view');
       

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