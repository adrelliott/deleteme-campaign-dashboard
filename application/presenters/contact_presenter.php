<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Contact_presenter extends Presenter
{


	/*-----------------------------------------------
	/ CONTACT PROPERTY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing contact properties
	/ e.g. full name
	*/

	/**
	 * Tidy up a name
	 */
	public function tidy_name($name)
	{
		if ( ! $name) $name = 'this contact';
		else
		{
			//Upper capitals of the words
			$name = ucwords(strtolower($name));

			//Trim any whitespace
			trim($name);	
		}

		

		return $name;
	}

	//Create full name
	public function get_first_name()
	{
		return $this->tidy_name($this->contact->first_name);
	}

	//Create full name
	public function get_last_name()
	{
		return $this->tidy_name($this->contact->last_name);
	}

	//Create full name
	public function get_full_name()
	{
		if ($this->contact->first_name && $this->contact->last_name)
		{
			 
			return 'Introducing ' . $this->tidy_name($this->contact->first_name . ' ' . $this->contact->last_name);
		}
		else return 'Hang on, why do we not know this contact\'s full name, eh?';
		
	}

	//Create ownership, e.g John's
	public function get_name_owned()
	{
		return $this->tidy_name($this->contact->first_name) . '\'s';
	}

	public function generate_table($header_array, $record_type, $url=NULL)
	{
		$data = $this->contact->contact_actions[$record_type]; 
		return $data;
		//$this->table->generate_custom($header_array, $data, $url, $attr = '');
	}






	// public function get_contact_actions($action_type)
	// {
	// 	//Note - the indexes of the contact_actions array are always singular
	// 	return $this->contact->contact_actions[$action_type];
	// }
	
	public function get_contacts_records($type)
	{
		if (isset($this->contact->{$type}))
			return (array)$this->contact->{$type};
	}


	
	// public function get_contact_actions_old($action_type)
	// {
	// 	$this->load->model('contact_action_model', 'm');
	// 	$where = array(
	// 		 	'action_type' => $action_type,
	// 		 	'contact_id' => $this->id(),
	// 		 	);
	// 	$q = $this->m->get_many_by($where);

	// 	return $q;
	// }





















	/* Old methods - no longer neded */
	/*public function get_actions($actions, $type, $cols = FALSE)
	{
		$data = array();

		if (isset($actions[$type]))
		{
			//If cols has been passed then go through the cols passed
			//and remove the array elements not requested
			if ($cols)
			{
				foreach ($actions[$type] as $id => $array)
				{
					foreach ($cols as $col)
					{
						$data[$id][$col] = $actions[$type][$id]->$col;
					}
				} 
			}
			else $data = $actions[$type];
		}
		
		return $data;
	}
	*/

	/*-----------------------------------------------
	/ DATA DISPLAY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for data retrieval.
	*/
	//Create a table
	/*public function create_table($contacts_list, $cols = array())
	{
		$output['html'] = '';
		$link = '';
		$col_count = count($cols);
		
		//Do we have columns to show?
		if ($col_count >= 1)
		{
			//Set up the table headers
			foreach ($cols as $col)
			{
				$output['th'][] = '<th>' . $col . '</th>';
			}
			$output['th'] = '<tr>' . join('', $output['th']) . '</tr>';

			//Now set up the table rows
			foreach ($contacts_list as $row => $data)
			{
				foreach ($cols as $col => $col_name)
				{
					$link = '<a href="' . site_url('contacts/show/' . $data->id) . '">';
					$output['tr'][$row]['td'][] = '<td>' . $link;
					$output['tr'][$row]['td'][] = $data->$col_name;
					$output['tr'][$row]['td'][] = '</a></td>';
				}
				$output['td'][$row] = '<tr>' . join('', $output['tr'][$row]['td']) . '</tr>';
				
			}

			//Now put it all together
			$output['html'] = "<table border=1>";
			$output['html'] .= $output['th'] . join('', $output['td']);
			$output['html'] .= '</table>';

		}
		return $output['html'];
	} 
*/

	

	
}