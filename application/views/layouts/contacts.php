<?php 
	/*
		This file sets up the data and views for the contact context.
	 */

	//firstly, what data are we going to use here? (Table names not model names)
	if ($result->contact) 
		$result->get_contacts_records($result, array('contact_actions', 'orders'));
	else $result->contact->id = 'new';//$result->new_record();

	//Load the right header
	include (APPPATH . 'views/partials/_header.php');

	//Load the navbar 
	include (APPPATH . 'views/partials/_navbar.php');

	//Echo the view (this could be seperated out or layed out like widgets)
	echo $yield;

	//finally incldue the footer
	include (APPPATH . 'views/partials/_footer.php'); 
?>