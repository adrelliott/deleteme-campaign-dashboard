<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lead_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
		'single_record' => array(
			'id','contact_id', 'lead_title', 'deleted', 'owner_id', 'created_at', 'updated_at'),
		'multiple_record' => array(
			'id','contact_id', 'lead_title', 'deleted', 'owner_id', 'created_at', 'updated_at'),
		// 'join_fields' => array(
    		//'users.first_name')
		);

	protected $_sort = array('leads.id' => 'DESC');

	//What are the foreign keys for each table?
	protected $_foreign_key = array(
		'order' => 'lead_id',
		);

	//Define the join - can be overidden within a method
	protected $_join = array(
				// 'join_table' => '',	//e.g. 'orders'
				// 'join_key' => '',	//usually '{jointablename}_id'
        		// 'join_type' => 'INNER',  //defaults to LEFT
				//  i.e. JOIN `orders` ON `orders`.`orders_id`=`{this_table}`.`id`
				);

	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

		public function __construct() 
		{ 
			parent::__construct();
		}

		public function get_contacts_records($id)
		{
			//Over-ride sort order:
			// $this->_sort = array('leads.id' => 'ASC');

			//Set the Join table (Leave blank to have no join)
			// $this->_join['join_table'] = 'orders';


			//Get the records
        	$q = $this->as_array()->order_by()->join_by()->get_many_by($this->_table . '.contact_id', $id);
        	return $q;
		}

		

	}

	/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */