<?php


/*
	This helper shows messages if they are passed.
 */

function message($message = FALSE, $class = 'info')
{
	$retval = '';

	//Is there  a message to show? If so, add the passed css class
	if ($message)
	{
		$retval = '<span class="notification ' . $class . '">';
		$retval .= $message;
		$retval .= '</span>';
	} 

	return $retval;
}