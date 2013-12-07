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


	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
	protected $_models = array(
		'test' => array(
			'join' => array(
				array(
					'table' => 'contacts',
					'join_on' => 'contacts.id=tests.contact_id',
					'join_type' => '',
					'join_fields' => array('tags.tag_id', 'tags.tag_id')
					),
				),
			),
		
		// 'contact' => array(
		// 	'where' => array(
		// 		array('contact_id' => '%id%'),
		// 		),
		// 	'join' => array(
		// 		array(
		// 			'table' => 'users',
		// 			'join_on' => 'users.id=contacts.user_id',
		// 			'join_type' => '',
		// 			'join_fields' => array('tags.tag_id', 'tags.tag_id')
		// 			),
		// 		),
		
		);

	

	protected $_layout = FALSE; 	//Defaults to 'application' - override here with false or another name
	
	// protected $_view_settings = array(); 	//Defaults to 'application' - override here with false or another name
	
	protected $_presenter = FALSE; 	//Defaults to $this->main_model - override here with false or another name
	
	protected $_main_model = FALSE;	//Defaults to class name, but overwrite or set to FALSE
	// 
	
	protected $_datum_structure = array();	//the structure of the datum
	protected $_like = array();	//used for searching for queries, as in 'remote'
	protected $_cols = array();	//The cols to return

	

	/* --------------------------------------------------------------
     * METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are defined in MY_Controller. You can extend them (return parent::{method_name}() ) or over-ride them by defning a new method here.
     *
     */
    

	//We don't need a presenter here
	// protected $_presenter = FALSE;
	// public $q;	//Holds the datat returned by the query
	// public $_datum_structure = array();	//the structure of the datum
	// public $like = array();	//used for searching for queries, as in 'remote'
	// public $cols = array();	//The cols to return

	public function __construct()
    {        
    	parent::__construct();
        $this->output->enable_profiler(FALSE);
	}

	public function _remap($table, $params = array())
	{
		$this->view = FALSE;
	    //Load the model
	    $model_name = singular($table) . '_model';
	    $this->load->model($model_name, 'm');
	    
	    //Extract the method & load it (pass through the params)
	    $method = $params[0];
	    if (method_exists($this, $method))
	    {
	        return call_user_func_array(array($this, $method), $params);
	    }
	    show_404();


    	$this->view = FALSE;
	}

	
	/**
	 * Return a JSON array.
	 *
	 * Use the URI segments ot define the fields and the $_GET array to define the where
	 * conditions:
	 *
	 * e.g. domain.com/ajax/contacts/id/first_name?owner_id=222
	 */
	public function get_table()
	{
		$this->view = FALSE;
		//is there a join passed?
		// if (isset($_GET['join']))
		// {
		// 	$params = explode(',', $_GET['join']);
		// 	//dump($params);
		// 	$join = array(
  //             	'table' => $params[0],
  //             	'fk' => $params[1],
  //             	);

		// 	$where['deleted'] = 0;
		// 	$where['owner_id'] = OWNER_ID;

		// 	unset($_GET['join']);

		// }
		// else $join = FALSE;

		//Now get the data (using datatables library)
		$this->set_cols(TRUE);
		$where = $_GET;
		$output = $this->m->get_datatables_ajax($this->cols, $where);

		echo $output;
	}


	/**
	 * Return a JSON array ready for the typeahead function.
	 *
	 * Use the URI segments ot define the fields and the $_GET array to define the where
	 * conditions:
	 *
	 * e.g. domain.com/ajax/contacts/id/first_name?owner_id=222
	 */
	public function typeahead_contacts()
	{
		$this->view = FALSE;
		$this->_datum_structure = array (
			'value' => '%first_name% %last_name% %postal_code%',
			'tokens' => array('%first_name%', '%last_name%'),
			'id' => '%id%'
			);

		//set up the wildcard search
		// $this->like =  array(
		// 	'CONCAT(first_name, " ", last_name)' => $_GET['q']
		// 	);
		// $this->like =  array('CONCAT(first_name, " ", last_name)' => $_GET['q']);
		$s = explode(' ', $_GET['q']);
		//if the search has first and last name, then set this up as like statements
		foreach ($s as $l =>$v)
		{	
			$this->like[] = array(
				'first_name' => $v,
				'last_name' => $v,
				'CONCAT(first_name, " ", last_name)' => $v
				);
		}

		echo $this->typeahead_core();
	}

	
	public function typeahead_tags()
	{
		$this->view = FALSE;
		$this->_datum_structure = array (
			'value' => '%tag_name%',
			'tokens' => array('%tag_name%'),
			'tag_name' => '%tag_name%',
			'id' => '%id%',
			);

		echo $this->typeahead_core();
	}

	public function typeahead_products()
	{
		$this->view = FALSE;
		$this->_datum_structure = array (
			'value' => '%product_name%',
			'tokens' => array('%id%', '%product_name%'),
			'product_name' => '%product_name%',
			'id' => '%id%',
			'product_price' => '%product_price%',
			);

		echo $this->typeahead_core();
	}


	public function typeahead_core()
	{
		$this->view = FALSE;
		$this->set_cols();

		$this->m->set_select('ajax', $this->cols);
		if ( count($this->like) )
		{
			foreach ($this->like as $k => $l)
			{
				$this->m->set_like($l, TRUE);
			}
		}
		$this->m->order_by($this->cols[0], 'ASC');
		
		$this->q = $this->m->get_all();

		return json_encode($this->set_up_datum());
	}

	public function set_up_datum()
	{
		$this->view = FALSE;
		$datum = array();
		$count = 0;

		//Set up the datum
		foreach ($this->q as $obj)
		{
			$t = $this->_datum_structure;
			foreach ($obj as $prop => $val)
			{
				//set up the 'tokens' array
				foreach ($t['tokens'] as $k => $v)
				{
					$t['tokens'][$k] = str_replace('%' . $prop . '%', $val, $t['tokens'][$k]);
				}

				//Now str_replace in the remaining array indexes
				foreach ($t as $k => $v)
				{
					$t[$k] = str_replace('%' . $prop . '%', $val, $t[$k]);
				}
				$datum[$count] = $t;
			}
			$count++;
		}

		return $datum;
	}


	/**
	 * Set the columns for the query. They are passed as URI paramaters
	 * //e.g. /ajax/table_name/col1/col2/col3/col4
	 * @param boolean $csv Output as a comma sep list (FALSE = array)
	 */
	protected function set_cols($csv = FALSE)
	{
		$this->cols = array_slice($this->uri->rsegment_array(), 3);
		if ($csv) $this->cols = implode(',', $this->cols);
	}
















	// public function do_query()
	// {
	// $this->view = FALSE;
	// 	$this->set_cols();
	// 	if ( count($this->like) )
	// 	{
	// 		foreach ($this->like as $k => $l)
	// 		{
	// 			$this->m->set_like($l, TRUE);
	// 		}
	// 	}

	// 	$this->m->set_select('ajax', $this->cols);
	// 	$this->m->order_by($this->cols[0]);
		
	// 	$this->q = $this->m->get_all();
	// }







// public function typeahead_tags7()
// 	{
// 		$cols = $this->set_cols();

// 		$this->m->set_select('ajax', $cols);
// 		$this->m->order_by('tag_name');

// 		$q = $this->m->get_all();
		
// 		//Now format the array into datums (https://github.com/twitter/typeahead.js#datum)
// 		$dataset = array();;
// 		foreach ($q as $o)
// 		{
// 			$datum = array();
// 			// dump($o);
// 			$datum['value'] = $o->tag_name;
// 			$datum['tokens'] = array($o->id, $o->tag_name);
// 			$datum['id'] = $o->id;
// 			$datum['tag_name'] = $o->tag_name;
// 			// $datum['postal_code'] = $o->postal_code;

// 			$dataset[] = $datum;
// 			//
// 		}		
// //dump(json_encode($dataset));
// // $this->output->enable_profiler(TRUE);

// 		echo json_encode($dataset);			

		

// 	}


// public function typeahead_contacts()
// 	{
// 		$_datum_structure = array (
// 			'value' => '%first_name% %last_name% %postal_code%',
// 			'tokens' => array('%first_name%', '%last_name%'),
// 			'id' => '%id%'
// 			);


// 		//set up thew wildcard search
// 		$like = array();
// 		$s = explode(' ', $_GET['q']);
// 		foreach ($s as $l =>$v)
// 		{	$like[] = array(
// 				'first_name' => $v,
// 				'last_name' => $v);
// 		}
// 		// if (count($_GET))
// 		// {
// 		// 	//Has the user typed 2 names?
// 		// 	if (strpos($_GET['q'], ' '))
// 		// 	{
// 		// 		//YES... search for both names
// 		// 		$q = explode(' ', $_GET['q']);
// 		// 		$this->m->set_like(array('first_name' => $q[0]));
// 		// 		$this->m->set_like(array('last_name' => $q[1]));
// 		// 	} 
// 		// 	else
// 		// 	{
// 		// 		//NO... just search for input as either first or last
// 		// 		$q = $_GET['q'];
// 		// 		$this->m->set_like(array('first_name' => $q));
// 		// 		$this->m->set_like(array('last_name' => $q));
// 		// 	}
// 		// }

// 		//set the cols & sort order
// 		$q = $this->do_query($like);
		
// 		//Now format the array into datums (https://github.com/twitter/typeahead.js#datum)
// 		$dataset = $this->set_up_datum($q, $_datum_structure);
// 		$this->output->enable_profiler(TRUE);

// 		echo json_encode($dataset);			
// 	}

	


}