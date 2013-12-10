<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Contact_presenter - deals with allt he functions for the contact view
*/

class Lead_presenter extends Presenter
{

    public function get_leads_by_type($type)
    {
        $retval = array();
        if (isset($this->{$this->_objectName}->sorted_by_type[$type]))
            $retval = $this->{$this->_objectName}->sorted_by_type[$type];

        return $retval;
    }






	public function get_element($page_element)
	{
		return $this->data['yield']['elements'][$page_element];
	}

	public function user_config($element)
	{
		# prestedn this si the config file returned form the model (the model actually queries the $_SESSION)
		$q[$element] = array('overview' => 'Overview', 'indepth' => 'In Depth');

		return $q;
	}



	//Get contact details
    public function get_full_name()
    {
        $contact_id = $this->{$this->_objectName}->contact_id;
        $this->load->model('contact_model');
        $q = $this->contact_model->get($contact_id);
        $retval = '';

        if (isset($q->first_name) && ! empty($q->first_name) )
        {
            $retval .= 'Lead for ' . $q->first_name; 
        }

        if (isset($q->last_name) && ! empty($q->last_name) )
        {
            if ( ! empty($retval) ) $retval .= ' ';
            $retval .= $q->last_name; 
        }

        return $retval;
    }
	

   	
}