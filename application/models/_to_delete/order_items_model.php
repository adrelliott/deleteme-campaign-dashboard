<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_item_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
                 'single_record' => array(
                                  'id', 'contact_id', 'order_title', 'owner_id'),
                 'multiple_record' => array(
                                 'id', 'contact_id', 'order_title', 'owner_id')
                 );

  protected $_sort = array('id' => 'DESC');

	
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

      //get the records
       $q = $this->as_array()->order_by(array('orders.id' => 'DESC'))->get_many_by($col, $id);

       return $q;
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