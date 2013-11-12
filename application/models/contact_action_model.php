<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
         'single_record' => array(
                          'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description', 'action_status', 'completed', 'owner_id'),
         'multiple_record' => array(
                          'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description',  'action_status', 'completed', 'created_at', 'owner_id')
    );

    public $belongs_to = array('contact');

	
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
    public function get_records($id, $col = 'contact_id')
    {
        //Intp what do we want these actions grouped? (I.e. what are all the contact_action types?)
        $retval = array('note' => array(), 'tweet' => array(), 'email' => array(), 'task'  => array(), 'appointment' => array(), 'TEST' => array());

        //Get the actions...
        $actions = $this->as_array()->order_by('id', 'DESC')->get_many_by($col, $id);

        //put them in an assoc array by action type
        foreach ($actions as $row => $array)
        {
            $action_type = $array['action_type'];
            $id = $array['id'];
            $retval[$action_type][$id] = $array;
        }
        return $retval;
    }
    
     public function get_records_by_action($contact_id, $action_type)
    {
       $conditions = array('contact_id' => $contact_id, 'action_type' => $action_type);
        //Get the actions...
        return $this->as_array()->order_by('id', 'DESC')->get_many_by($conditions);
    }


    public function toggle_value($id, $field_name)
    {
        $q = $this->get($id, array($field_name));
    //    dump($q->$field_name);
    	//Get current value
        $new_value = 1;
        if ($q->$field_name == 1)
        {
            $new_value = 0;
        }

        
            
  //dump($new_value);
// R$new_value = 0;
        //insert new_value
        $this->update($id, array($field_name => $new_value));
//die();
  //      dump($this->get($id, array($field_name)));die();
        return $new_value;
    }

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */