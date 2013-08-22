<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
                 'single_record' => array(
                                  'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'owner_id'),
                 'multiple_record' => array(
                                  'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'owner_id')
                 );

	
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