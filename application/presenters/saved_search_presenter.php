<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Saved_search_presenter extends Presenter
{






	public function get_results($type = 'data', $row = NULL)
	{
		switch ($type) {
			case 'links':
				return $this->saved_search->data->links;	
				break;

			case 'description':
				$start = $this->saved_search->data->pagination['offset'];
				$number_returned = $this->saved_search->data->results->num_rows;
				$end = $start + $number_returned;
				$total_returned =  $this->saved_search->data->pagination['total_rows'];

				return '<p class="lead">Showing ' . $start . ' to ' . $end . ' of ' . $total_returned . ' entries</p>';
				break;
			
			case 'data':
				return $this->saved_search->data->results->result_array;	
				break;

			case 'headers':
				$cols = array();
				$sample_row = $this->saved_search->data->results->result_array[0];

				foreach ($sample_row as $col_name => $v)
				{
					$cols[humanize($col_name)] = $col_name;
				}

				return $cols;
				break;
			
			// case 'row':
			// 	$headers = array_keys($this->saved_search->data->results->result_array[0]);	
			// 	$data = $this->saved_search->data->results->result_array;
			// 	$html = '';

			// 	foreach ($headers as $header)
			// 	{
			// 		$html .= '<td>' . $data[$row][$header] . '</td>';
			// 	}

			// 	return $html;
			// 	break;
			
			default:
				# code...
				break;
		}
	}

}