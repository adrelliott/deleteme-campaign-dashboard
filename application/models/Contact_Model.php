<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends MY_Model {
	/*
		Overides the standard naming convention of the table/models (for autoloading).
		Only define the table name here if it is NOT the plural of the model name
	 */
	//public $_table = '';	//e.g. public $_table = 'custom_fields' if model = custom_model
	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

	public function __construct() 
	{ 
        parent::__construct();
    }

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */