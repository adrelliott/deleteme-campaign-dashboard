<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Dashboard extends MY_Controller
{
	
	protected $view = 'dashboard/index';

	public function index()
	{
		//What layout folder are we using? (Set in config/client_configs/{owner_id}.php)
		$this->layout = 'layouts/' . $this->config->item('layout_folder') . '/contacts';
	}
}
