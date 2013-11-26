<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id','tag_name'),
		'multiple_record' => array(
			'id','tag_name'),
		);

	protected $_sort = array('tags.tag_name' => 'ASC');
	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

		public function __construct() 
		{ 
			parent::__construct();
		}

		public function get($id)
		{
			//$this->join_on_tags();
			return parent::get($id);
		}

		
		
		

	}

	/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */