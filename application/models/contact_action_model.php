<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
   'single_record' => array(
    'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description', 'action_status', 'user_id', 'action_enddate', 'completed', 'owner_id'),
   
   'multiple_record' => array(
    'id', 'owner_id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description',  'action_status', 'user_id', 'action_enddate', 'completed', 'created_at', 'owner_id'),
   
   'join_fields' => array(
    'users.first_name')
   );

  protected $_sort = array('id' => 'DESC');

  //What are the foreign keys for each table?
  protected $_foreign_key = array(
    'users' => 'user_id',
    'leads' => 'lead_id',
    'orders' => 'order_id',
    );

  //Define the join - can be overidden within a method
  protected $_join = array(
        // 'join_table' => '',  //e.g. 'orders'
        // 'join_key' => '',  //usually '{jointablename}_id'
        // 'join_type' => 'inner',  //defaults to LEFT
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

    /**
     * Gets all of this contact's actions and sorts them into types
     * @param  int $contact_id the id of the current contacts
     * @param  string $col What is the column we're searching for here?
     * @return array             an array of objects, sorted into action type
     * e.g. retval['tasks'] = array([0] -> OBJECT)
     */
    public function get_associated_records($id, $col = 'contact_id')
    {
        //Intp what do we want these actions grouped? (I.e. what are all the contact_action types?)
      $retval = array('note' => array(), 'tweet' => array(), 'email' => array(), 'task'  => array(), 'appointment' => array(), 'TEST' => array());

      //Set the Join table (Leave blank to have no join)
      // $this->_join['join_table'] = 'users';

        //Get the actions...
      // $actions = $this->as_array()->order_by(array('id' => 'DESC', 'completed' => 'ASC'))->join_by()->get_many_by($col, $id);
      $actions = $this->as_array()->order_by(array('id' => 'DESC', 'completed' => 'ASC'))->get_many_by($col, $id);

        //put them in an assoc array by action type
      foreach ($actions as $row => $array)
      {
        $action_type = $array['action_type'];
        $id = $array['id'];
        $retval[$action_type][$id] = $array;
      }
      return $retval;
    }
    
    
    public function toggle_value($id, $field_name)
    {
      $q = $this->get($id);

// dump('The existing value is '. $q->$field_name);

    	//Set default and get current value
      $new_value = 1;
      if ($q->$field_name == 1)
      {
        $new_value = 0;
      }

        //insert new_value
      $this->update($id, array($field_name => $new_value));
      $q->$field_name = $new_value;
// dump('The changed value is '.$new_value);
      return $q;
    }

  }

  /* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */