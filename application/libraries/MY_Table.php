<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Table extends CI_Table {

	 public function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     * @param  [array] $header_array [A list of columns ot show as an assoc array, e.g. array('id' => 'Record Id', 'col_name' => 'Label')]
     * @param  array $data         The data returned from the query
     * @param  string $url          The first part of the link, e.g. 'contacts/show'
     * @param  string $attr         the classes
     * @return string               HTML output of the table
     */
	public function generate_custom($header_array, $data, $url, $attr = '')
	{
		$table = array();

		//Set the template
		$tmpl = array('table_open'=> '<table class="table ' . $attr . '" data-provides="">'); 
		$this->set_template($tmpl);

		//Set the headers
		$this->set_heading(array_values($header_array));
		
		//Set the table body
		foreach ($data as $row => $array)
		{
			$link =  site_url($url . '/' . $array['id']);
			foreach (array_keys($header_array) as $col)
			{
				$table[$row][$col] = '<a href="' . $link . '">' . $array[$col] . '</a>';
			}
		}

		return $this->generate($table);
	}
}
