<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Smile_presenter extends Presenter
{


	public function attribution()
    {
        if ( ! empty($this->{$this->_objectName}->smile_attribution))
            return '<small>' . $this->{$this->_objectName}->smile_attribution . '</small>';
    }



















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