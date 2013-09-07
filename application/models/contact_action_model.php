<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
         'single_record' => array(
                          'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description', 'owner_id'),
         'multiple_record' => array(
                          'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'action_description', 'owner_id')
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
     * @return array             an array of objects, sorted into action type
     * e.g. retval['tasks'] = array([0] -> OBJECT)
     */
    public function get_records($contact_id)
    {
    	$retval = array('note' => array(), 'tweet' => array(), 'email' => array(), 'task'  => array(), 'appointment' => array(), 'TEST' => array());
    	$action = $this->get_many_by('contact_id', $contact_id);

    	//put them in an assoc array
    	foreach ($action as $row)
    	{
    		$retval[$row->action_type][$row->id] = $row;
    	}

    	return $retval;
    }

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */