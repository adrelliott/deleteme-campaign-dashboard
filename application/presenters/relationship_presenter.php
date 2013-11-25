<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* relationship_presenter - deals with allt he functions for the relationship view
*/

class Relationship_presenter extends Presenter
{

	/*-----------------------------------------------
	/ CONTACT PROPERTY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing contact properties
	/ e.g. full name
	*/

	
	public function other_contact_full_name()
	{
		if( ! $this->relationship->first_name) return $this->relationship->last_name;
		else return $this->relationship->first_name . ' ' . $this->relationship->last_name;
	}
	

	public function tidy_name($name)
	{
		if ( ! $name) ;
		else
		{
			//Upper capitals of the words
			$name = ucwords(strtolower($name));

			//Trim any whitespace
			trim($name);	
		}

		

		return $name;
	}

	//Create full name
	public function get_first_name()
	{
		return $this->tidy_name($this->relationship->first_name);
	}

	//Create full name
	public function get_last_name()
	{
		return $this->tidy_name($this->relationship->last_name);
	}

	//Create full name
	public function get_full_name()
	{
		if ($this->relationship->first_name && $this->relationship->last_name)
		{
			return $this->tidy_name($this->relationship->first_name . ' ' . $this->relationship->last_name);
		}
		elseif ($this->relationship->first_name) 
			return $this->tidy_name($this->relationship->first_name);
		
		elseif ($this->relationship->last_name) 
			return $this->tidy_name($this->relationship->last_name);
		
	}

	

	



	

	
}