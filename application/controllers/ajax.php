<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A controller dedicated to outputting ajax
 * Set the table in the first URI segment, then the fields ot retrieve in the next.
 * Pass any where conditionsa via $_GET 
 * 
 * E.g. to return all TASK contact_action records belonging to contact 343 you'd pass:
 * 	site.com/ajax/contact_actions/id/action_type/action_title?action_type=task&contact_id=343
 * 	
 */

class Ajax extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
	}

	public function _remap($table, $params = array())
	{
	    //Load the model
	    $model_name = substr($table, 0, -1) . '_model';
	    $this->load->model($model_name, 'model');

	    //Extract the method & load it (pass through the params)
	    return call_user_func_array(array($this, 'get'), $params);
	}


	protected function set_cols()
	{
		$cols = array_slice($this->uri->rsegment_array(), 2);
		return implode(',', $cols);
	}

	
	/**
	 * Return a JSON array.
	 *
	 * Use the URI segments ot define the fields and the $_GET array to define the where
	 * conditions:
	 *
	 * e.g. domain.com/ajax/contacts/id/first_name?owner_id=222
	 */

	public function get()
	{
		$cols = $this->set_cols();
		$where = $_GET;

		//Send to the datatables library
		echo $this->model->get_datatables_ajax($cols, $where);
	}


}