<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Home extends MY_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
    protected $_layout = 'public';  //Defaults to 'application' - override here with false or another name
    
    // protected $_view_settings = array();  //Defaults to 'application' - override here with false or another name
    
    protected $_presenter = FALSE;  //Defaults to $this->main_model - override here with false or another name
    
    protected $_main_model = FALSE; //Defaults to class name, but overwrite or set to FALSE

    

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
        if ( $this->ion_auth->logged_in() && strtolower($this->uri->segment(1)) !== 'site' )
        {
            redirect('dashboard');
            return;
        }

    }


    //log the user in
    public function index()
    {
        echo 'This si the home page';
    
}