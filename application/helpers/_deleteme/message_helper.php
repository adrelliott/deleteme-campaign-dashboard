<?php


/*
	This helper shows messages if they are passed.
 */

function message($message = FALSE, $class = 'success')
{
	$retval = '';

	//Is there  a message to show? If so, add the passed css class
	if ($message)
	{
		$retval = '<div class="alert alert-' . $class . '">';
		$retval .= $message;
		$retval .= '</div>';
	} 

	return $retval;
}