<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Contact_presenter extends Presenter
{
	/*-----------------------------------------------
	/ DATA RETRIEVAL METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for data retrieval.
	*/
	//Sets up the new record ready for create
	public function new_record($contact_id = NULL)
	{
		$retval->id = 'new';
		return $retval;
	}

	public function get_contacts_records($result, $tables)
	{
		$query = array();

		//cycle through the tables
		foreach ($tables as $table)
		{
			//Set up & do the query
			$table = singular($table);
			$this->load->model($table . '_model', 'model');
			$where['contact_id'] = $this->contact_id();
			$query[$table] = $this->model->get_many_by($where);

			//if its contact_action, the  sort them into each action_type
			if ($table == 'contact_action') 
				$query[$table] = $this->sort_actions($query[$table]);
			$result->$table = $query[$table];
		}
		return $result;
	}

	
	/*-----------------------------------------------
	/ CONTACT ACTION METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing and sorting contact actions
	*/
	public function sort_actions($all_actions)
	{
		$retval = array();

		//Cycle through the actions and sort into type - Store in $retval
		foreach ($all_actions as $k => $action)
		{
			$type = $action->action_type;
			$retval[$type][] = $action;
		}

		return $retval;
	}

	/*-----------------------------------------------
	/ CONTACT PROPERTY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing contact properties
	/ e.g. full name
	*/
	//Return record Id
	public function record_id()
	{
		return $this->contact->id;
	}

	//Same thing in the contact context
	public function contact_id()
	{
		return $this->contact->id;
	}

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


	

	
}