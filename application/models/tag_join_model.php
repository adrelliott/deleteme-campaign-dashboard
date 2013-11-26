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

		public function get($id)
		{
			$this->join_on_tags();
			return parent::get($id);
		}

		public function get_associated_records($id, $col = 'contact_id')
		{
			$this->join_on_tags();
			//get the records
			 $this->q->tags = $this->as_array()->order_by(array('tag_joins.id' => 'DESC'))->get_many_by($col, $id);

			 // return $q;
		}

		public function join_on_tags($foreign_key = 'tag_id')
		{
			//join on tags
			$join_fields = array('tags.tag_name');
			$this->_join('tags', 'tags.id=tag_joins.' . $foreign_key);
			$this->set_select('join', $join_fields);
		}
		
		

	}

	/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */