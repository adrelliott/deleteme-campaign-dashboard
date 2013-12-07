<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Saved_search_presenter extends Presenter
{

	public function get_results($paginate = TRUE)
	{
		//Get stat data as an object
		$d = $this->saved_search;


		//Set up config for paginate
		if ($paginate)
		{
			$offset = 0;
			$config = array(
				'base_url' => site_url('search/results/' . $this->id),
				'per_page' => 5,
				'uri_segment' => 4
				);
			$d->id_as_key = TRUE;


			if ($offset = $this->uri->segment($config['uri_segment']));
			
			$d->offset = (int) $offset;
			$d->limit = $config['per_page'];
		}

		//Load model
		$m = strtolower($d->model_name . '_model');
		$this->load->model($m);

		//Do the saved search
		$q = $this->$m->do_saved_search($d);

		//Do we need to paginate?
		if ($paginate)
		{
			//Get the total rows
			$config['total_rows'] = $d->total_rows = $this->$m->do_saved_search($d, 'count');
			$this->pagination->initialize($config);
			$this->saved_search->pag_links = $this->pagination->create_links();
		}

		return $q;
	}

}