<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Contact_Presenter extends Presenter
{
	//For the index() function only
	public function create_table($contacts_list, $cols = array())
	{
		$output['html'] = '';
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
					$output['tr'][$row]['td'][] = '<td>';
					$output['tr'][$row]['td'][] = $data->$col_name;
					$output['tr'][$row]['td'][] = '</td>';
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


	//record Id
	public function record_id()
	{
		return $this->contact->id;
	}

	//Same thing in the contact context
	public function contact_id()
	{
		return $this->contact->id;
	}

	//Cfeate full name
	public function full_name()
	{
		return $this->contact->first_name . ' ' . $this->contact->last_name;
	}


	//Create full name
	public function last_name()
	{
		return $this->last_name;
	}

	//Return a property
	public function get1($property)
	{
		return $this->$property;
	}

	
}