<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relationship_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id','contact_id', 'other_contact_id', 'type', 'notes', 'deleted', 'owner_id', 'created_at', 'updated_at'),
		'multiple_record' => array(
			'id','other_contact_id', 'type', 'deleted', 'owner_id', 'created_at', 'updated_at')
		);

	protected $_sort = array('contacts.last_name' => 'DESC');

  // //What are the foreign keys for each table?
  // protected $_foreign_key = array(
  //   // 'users' => 'user_id',
  //   // 'leads' => 'lead_id',
  //   // 'orders' => 'order_id',
  //   );

  // //Define the join - can be overidden within a method
  // protected $_join = array(
  //       // 'join_table' => 'contacts',  //e.g. 'orders'
  //       // 'join_key' => '',  //usually '{jointablename}_id'
  //       // 'join_type' => 'inner',  //defaults to LEFT
  //       //  i.e. JOIN `orders` ON `orders`.`orders_id`=`{this_table}`.`id`
  //   );


	
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
			$this->join_on_contacts();
			return parent::get($id);
		}

		public function get_associated_records($id, $col = 'contact_id')
		{
			$this->join_on_contacts('other_contact_id');

			//get the records
			 $relationships = $this->as_array()->order_by($this->_sort)->get_many_by($col, $id);

			 return $relationships;
		}

		public function join_on_contacts($foreign_key = 'contact_id')
		{
			//join on contacts
			$join_fields = array('contacts.first_name', 'contacts.last_name');
			$this->_join('contacts', 'contacts.id=relationships.' . $foreign_key);
			$this->set_select('join', $join_fields);
		}
		

	}

	/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */