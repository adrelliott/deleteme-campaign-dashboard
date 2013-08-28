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
	    $method = $params[0];
	    if (method_exists($this, $method))
	    {
	        return call_user_func_array(array($this, $method), $params);
	    }
	    show_404();
	}


	protected function set_cols($csv = FALSE)
	{
		$cols = array_slice($this->uri->rsegment_array(), 3);
		if ($csv) return implode(',', $cols);
		else return $cols;
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
		$cols = $this->set_cols(TRUE);
		$where = $_GET;

		//Send to the datatables library
		echo $this->model->get_datatables_ajax($cols, $where);
	}

	/**
	 * Return a JSON array ready for the typeahead function.
	 *
	 * Use the URI segments ot define the fields and the $_GET array to define the where
	 * conditions:
	 *
	 * e.g. domain.com/ajax/contacts/id/first_name?owner_id=222
	 */

	public function typeahead()
	{
		$cols = $this->set_cols();
		$where = $_GET;

		//set the cols
		$this->model->set_select('multiple_record', $cols);
		$this->model->order_by('first_name');
		
		echo json_encode($this->model->get_all());
		//do the query

		//Send to the datatables library
		//echo $this->model->get_datatables_ajax($cols, $where);
	}


}