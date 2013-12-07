<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id','contact_id', 'other_contact_id', 'type', 'notes'),
		'multiple_record' => array(
			'id','other_contact_id', 'type'),
		);

	protected $_sort = array('test.id' => 'ASC');
	
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