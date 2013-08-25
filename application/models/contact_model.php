<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
                 'single_record' => array(
                                  'id', 'first_name', 'last_name', 'email', 'deleted', 'owner_id'),
                 'multiple_record' => array(
                                  'id', 'first_name', 'last_name', 'email', 'owner_id')
                 );

	
	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

	public function __construct() 
	{ 
        parent::__construct();
    }

    public function get_datatables_ajax($cols, $where = array())
    {
    	//Define a condition for the ajax call
		//$where = array('last_name' => 'Bridges', 'first_name' => 'Lunea');
		return parent::get_datatables_ajax($cols, $where);
    }

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */