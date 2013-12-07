<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Broadcast_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
	     'single_record' => array(
	     	//Leave balnk to get all fields
	                      ),
	     'multiple_record' => array(
	                      'id', 'broadcast_name')
	);

	// protected $_sort = array('id' => 'DESC');

  //What are the foreign keys for each table?
  // protected $_foreign_key = array(
    // 'users' => 'user_id',
    // 'leads' => 'lead_id',
    // 'orders' => 'order_id',
    // );

  //Define the join - can be overidden within a method
  //protected $_join = array(
        // 'join_table' => '',  //e.g. 'orders'
        // 'join_key' => '',  //usually '{jointablename}_id'
        // 'join_type' => 'inner',  //defaults to LEFT
        //  i.e. JOIN `orders` ON `orders`.`orders_id`=`{this_table}`.`id`
    // );


	
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