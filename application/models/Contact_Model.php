<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Model extends CI_Model {

	public function __construct() 
	{ 
        parent::__construct();
        //require_once APPPATH . 'presenters/record_presenter.php';
    }

	/**
	 * 
	 */
	public function get_all()
	{
		echo 'got here...';
		return $this->db->get('contacts');
	}
}

/* End of file xxxxxx.php */
/* Location: ./application/controllers/welcome.php */