<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/


class Dashboard_presenter extends Presenter
{

	

	//Create full name
	public function full_name()
	{
		//return $this->contact->first_name . ' ' . $this->contact->last_name;
	}

	//Create ownership, e.g John's
	public function name_owned()
	{
		//return $this->contact->first_name . '\'s';
	}

	
	public function get_contact_action_records($type)
	{
		if (isset($this->dashboard->contact_actions[$type]))
			return (array)$this->dashboard->contact_actions[$type];
	}

	public function get_stat($id)
	{
		//Get stat data
		$d = $this->dashboard->saved_searches[$id];

		//Load model
		$m = strtolower($d['model_name']) . '_model';
		$this->load->model($m);

		$q = $this->$m->do_saved_search($d);

		//if its in an array, extract first row
		if (count($q))
		{
			$q = reset($q[0]);

		}
		
		if (is_object($q)) $q = $q->$d['select'];

		return $q;
	}






	

	
}