<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saved_search_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
         'single_record' => array(
                          ),
         'multiple_record' => array(
                          )
    );

    protected $_sort = array('id' => 'DESC');

  //What are the foreign keys for each table?
  protected $_foreign_key = array(
    // 'users' => 'user_id',
    // 'leads' => 'lead_id',
    // 'orders' => 'order_id',
    );

  //Define the join - can be overidden within a method
  protected $_join = array(
        // 'join_table' => '',  //e.g. 'orders'
        // 'join_key' => '',  //usually '{jointablename}_id'
        // 'join_type' => 'inner',  //defaults to LEFT
        //  i.e. JOIN `orders` ON `orders`.`orders_id`=`{this_table}`.`id`
    );

//Keep this!!!!!!!!!!!!!!!!!!!!!!!!
// public $num_rows = '';


    //private $_result;
	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

	public function __construct() 
	{ 
        parent::__construct();
    }


    // public function num_rows_in_query($sql)
    // {
    //     return  $this->do_query($sql)->num_rows();
    // }



    /**
     * Gets a stat as a query, and returns the result of the query 
     * @param  int $id Id of the search
     * @return mixed     Can be an integer/float
     */
  //   public function get_stat($id)
  //   {
  //   	//get the stat id
  //   	$stat = $this->get($id);

  //   	//Run that query
  //   	if ($stat->query)
		// {
		// 	$stat = $stat->query;
		// 	$result = $this->db->query($stat)->row();
		// 	return reset($result);	//Just returns the valueof $result[0]
		// }
  //   }

    /**
     * Calculates change between two stats
     * @param  int $id1 The id of search 1
     * @param  int $id2 The id of search 2
     * @param  string $type Type fo change, e.g. percentage
     * @return number      can be a percentage, an integer or a float
     */
    // public function get_change($id1, $id2, $type = 'percentage')
    // {
    // 	//do the two searches
    // 	//
    // 	//then calculate the change
    // 	//
    // 	//then return as percentage/integer/float as defined in $type
    // }

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */