<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lead_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id','contact_id','user_id', 'product_id', 'lead_title','lead_stage','DATE_FORMAT(leads.target_completion_date, \'%e/%m/%Y\') AS target_completion_date','target_completion_date', 'deleted', 'owner_id', 'created_at', 'updated_at'),
		'multiple_record' => array(
			'id','contact_id', 'lead_title', 'lead_stage', 'deleted', 'owner_id', 'created_at', 'updated_at'),
		);

	protected $_sort = array('leads.id' => 'DESC');
	
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