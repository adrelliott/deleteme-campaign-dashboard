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

	//Create full name
	public function full_name()
	{
		return $this->contact->first_name . ' ' . $this->contact->last_name;
	}

	//Create ownership, e.g John's
	public function name_owned()
	{
		return $this->contact->first_name . '\'s';
	}

	





	/*-----------------------------------------------
	/ DATA DISPLAY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for data retrieval.
	*/
	//Create a table
	public function create_table($contacts_list, $cols = array())
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


	

	
}