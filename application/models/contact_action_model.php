<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_action_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
   'single_record' => array(
    'id', 'contact_id', 'action_type', 'action_subtype', 'action_other_notes', 'action_title', 'action_description', 'action_status', 'user_id', 'action_enddate', 'completed', 'owner_id'),
   
   'multiple_record' => array(
    'id', 'owner_id', 'contact_id', 'action_type', 'action_subtype', 'action_other_notes', 'action_title', 'action_description',  'action_status', 'user_id', 'action_enddate', 'completed', 'created_at', 'DATE_FORMAT(contact_actions.created_at, \'%e/%m/%Y\') date', 'owner_id'),
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

  public function list_records($attr = array())
  {
    $q = parent::list_records($attr);
    $sorted_actions = array();
    
    //put them in an assoc array by action type
    foreach ($q as $row => $array)
    {
      $sorted_actions[$array['action_type']][$array['id']] = $array;
    }

    return $sorted_actions;
  }

  }

  /* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */