<?php
function record_stat($contact)
{
	$html = '<small>This record was created on %s and last updated on %s. </small>';

	$created = date("dS F Y",strtotime($contact->created_at()));
	$updated = date("dS F Y,  H:i",strtotime($contact->updated_at()));

	return sprintf($html, $created, $updated);
}