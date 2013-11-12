<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Contact_action_presenter extends Presenter
{

	/*-----------------------------------------------
	/ CONTACT PROPERTY METHODS
	/*-----------------------------------------------
	/ 
	/ These are all the methods for retriveing contact properties
	/ e.g. full name
	*/

	
	

	//Create full name
	public function create_notes()
	{
		foreach ($this->contact_action['note'] as $note)
		{
			echo '<br/>Note: '. dump($note);
		}
		//return $this->$action->action_title;
	}
	//Create full name
	public function note_title($action)
	{
		dump($action);
		//return $this->$action->action_title;
	}

	public function note_body()
	{
		return $this->action_title;
	}
	
	

	



	

	
}