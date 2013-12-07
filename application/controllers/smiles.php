<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Smiles extends MY_Controller
{

	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */


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