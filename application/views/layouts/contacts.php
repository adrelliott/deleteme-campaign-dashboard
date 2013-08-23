<?php 
	//Load the right header
	include (APPPATH . 'views/partials/_header.php');

	//Load the navbar 
	include (APPPATH . 'views/partials/_navbar.php');

	//Echo the view (this could be seperated out or layed out like widgets)
	echo $yield;

	//finally incldue the footer
	include (APPPATH . 'views/partials/_footer.php'); 
?>