<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_Observer - Put any client specefic 
*/
	

class Contact_Presenter extends Presenter
{
	
	public $retval = array();

	public function full_name()
	{
		return $this->contact->first_name . ' ' . $this->contact->last_name;
	}

	public function name_company()
	{
		$this->retval = array(
                  $this->contact->first_name, 
                  $this->contact->last_name,
                  '(' . 'Thiswouldbe Companyname Ltd' . ')'
                  );

		return implode(' ', $this->retval);
	}
}