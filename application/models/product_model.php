<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends MY_Model {

	//define what columns to return in a search
	protected $_cols = array(
                 'single_record' => array(
                                  'id', 'owner_id'),
                 'multiple_record' => array(
                                 'id', 'owner_id')
                 );

  public function __construct() 
    { 
      parent::__construct();
    }

    public function get($id)
    {
      return parent::get($id);
    }

    
}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */