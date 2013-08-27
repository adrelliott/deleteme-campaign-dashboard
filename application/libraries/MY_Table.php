<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Table extends CI_Table {

	 public function __construct()
    {
        parent::__construct();
    }

	public function generate_custom($header_array, $data, $attr = '')
	{
		$table = array();

		//Set the template
		$tmpl = array('table_open'=> '<table class="table ' . $attr . '">'); 
		$this->set_template($tmpl);

		//Set the headers
		$this->set_heading(array_values($header_array));
		
		//Set the table body
		foreach ($data as $row => $array)
		{
			foreach (array_keys($header_array) as $col)
			{
				$table[$row][$col] = $array[$col];	
			}
		}

		return $this->generate($table);
	}
}
