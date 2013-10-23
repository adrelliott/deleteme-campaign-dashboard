<?php
/**
 * Clean up your view code and remove nasty, brittle logic using
 * the presenters - from The CodeIgniter Handbook - Volume One - Who Needs Ruby?
 *
 * @link http://github.com/jamierumbelow/codeigniter-presenters
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class Presenter
{
	/**
	 * Stores the object's name
	 */
	protected $_objectName = '';

	/**
	 * Takes an object and prepares to present . Default to 'NULL' to allow 'create' view to work
	 */
	public function __construct($object = NULL, $name = '')
	{
		$this->_objectName = $name ?: strtolower(str_ireplace('_presenter', '', get_class($this)));
		$this->{$this->_objectName} = $object;
		//$this->_objectName = $object;
	}

	/**
	 * Dynamically fetch properties from the object
	 */
	public function __call($name, $args = array())
	{
		if (isset($this->{$this->_objectName}->$name))
		//if (isset($this->_objectName->$name))
		{
			//return $this->_objectName->$name;
			return $this->{$this->_objectName}->$name;
		}
		else
		{
			//Remove the erro message and allow us to use the object in new records too
			//throw new BadMethodCallException("Call to undefined method " . get_class($this) . "::" . $name . '()');
			return '';
		}
	}

	public function __get($attr)
	{
		if (isset(get_instance()->$attr))
		{
			return get_instance()->$attr;
		}
	}


	/*   User name functions */
	
	/**
	 * Echos logged in user's name
	 * @return [string] e.g. Al
	 */
	public function user_first_name()
	{

	}


	public function load_partial($partial_name)
	{
		return $this->load->view('partials/' . $this->config->item('layout_folder')  . '/_' . $this->router->class . '/' . $partial_name);
		///$view = implode('/', array('partials', $this->config->item('layout_folder') , $this->router->class, $partial_name));
		//return $this->load->view($view);
	}


	/*  	Table Functions */
	
	/**
	 * Generates the <thead> .. </thead> part of the table
	 * @param  array $cols An array of cols to show in format ('col_name' => 'Col Title')
	 *                     e.g. array('contact_id' => 'The Contact/'s Id')
	 * @return string       HTML of the top part of the table
	 */
	public function table_header($cols, $extra_cols = FALSE)
	{
		//Build the head part of the table
		$html = '<thead><tr>';
		foreach ($cols as $nice_name => $field)
		{
			$html .= '<th>' . $nice_name . '</th>';
		}

		//Do we want any extra columns?
		if (is_array($extra_cols))
		{
			foreach ($extra_cols as $col_name)
			{
				$html .= '<th>' . $col_name . '</th>';
			}
		}

		//Finish and output
		$html .= '</tr></thead>';
		return $html;
	}


	public function table_body($data, $cols, $url = FALSE, $attr = FALSE, $delete = FALSE, $completed = FALSE, $extra_cols = FALSE)
	{
		$rows = array();
		$att = array();
		$cell = '';

		//Go through each column and set up the row
		foreach ($data as $row => $array)
		{
			$rows[$row] = '<tr>';
			$id = $array['id'];
			
			foreach ($cols as $nice_name => $field)
			{
				$cell = $array[$field];

				//Have we passed a URL..?
				if ($url)
				{
					$cell = '<a data-id="' . $id . '" ';
					$cell .= 'href="' . $url . '" ';
					
					//Have we passed any attributes for this <a tag..?
					if (is_array($attr))
					{
						foreach ($attr as $tag => $val)
						{
                			$att[] = $tag . '="' . $val . '"';
						}

						//Join the array of attributes with a space between each
						$cell .= implode(' ', $att);
					}
					//Complete the link..
					$cell .= ' >' . $array[$field] . '</a>';
				}
				$rows[$row] .= '<td>' . $cell . '</td>';
			}
			//Did we want a 'delete' button...?
			if ($delete)
			{
				//swap out 'record_id' for this id
				$r_id = str_replace('record_id', $id, $delete);
				$rows[$row] .= '<td>' . $r_id . '</td>';
			}
			
			//Did we want a 'mark as completed' button (used for tasks)...?
			if ($completed)
			{
				//swap out 'record_id' for this id
				$r_id = str_replace('record_id', $id, $completed);
				$rows[$row] .= '<td>' . $r_id . '</td>';
			}
			$rows[$row] .= '</tr>';
		}

		//Now combine to make the full HTML
		$html = '<tbody>' . implode('', $rows) . '</tbody>';

		return $html;
	}

}