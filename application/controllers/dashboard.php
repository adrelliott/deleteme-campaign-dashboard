<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for Dashboard
*/

class Dashboard extends MY_Controller
{
	//What models should we load?
	public $models = array('contact', 'contact_action', 'saved_search');

	// What view are we using?
	protected $view = 'dashboard';

	public function index()
	{
		//Autoloads the view defined above
	}

}
