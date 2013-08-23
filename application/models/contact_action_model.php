<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
                 'single_record' => array(
                                  'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'owner_id'),
                 'multiple_record' => array(
                                  'id', 'contact_id', 'action_type', 'action_subtype', 'action_title', 'owner_id')
                 );

	
	/*
		You can set observers to call methods before create, update, get and delete
		See here: https://github.com/jamierumbelow/codeigniter-base-model
	 */

	public function __construct() 
	{ 
        parent::__construct();
    }

    /*-----------------------------------------------
	/ CONTACT ACTION METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing and sorting contact actions
	*/
	public function sort_actions($all_actions)
	{
		$retval = array();

		//Cycle through the actions and sort into type - Store in $retval
		foreach ($all_actions as $k => $action)
		{
			$type = $action->action_type;
			$retval[$type][] = $action;
		}

		return $retval;
	}

}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */