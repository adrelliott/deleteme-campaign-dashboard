<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_join_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id', 'tag_id', 'contact_id'),
		'multiple_record' => array(
			'id', 'tag_id', 'contact_id'),
		);

	protected $_sort = array('tag_joins.id' => 'DESC');
	
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