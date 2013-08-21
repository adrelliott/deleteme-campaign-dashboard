<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Presenter class is a thin layer between the view and the data object returned
*
* e.g $contact_list is an object full of the contact records. We'd use contact_presenter
* to format this into a tabnle ready for outputting
*/
class Presenter {
	
	public function __construct($object = NULL)
	{
		$name = strtolower(str_replace("_presenter", "", get_class($this)));
		$this->$name = $object;
	}

	public function __get($attr)
	{
		if (isset(get_instance()->$attr))
		{
			return get_instance()->$attr;
		}
	}

        
}