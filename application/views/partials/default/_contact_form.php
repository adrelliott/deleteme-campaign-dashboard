<?php
	echo form_label('First Name', 'first_name');
	echo form_input('first_name', $contact->first_name()), '<br/>';
	echo form_label('Last Name', 'last_name');
	echo form_input('last_name', $contact->last_name()), '<br/>';
	echo form_label('Email', 'email');
	echo form_input('email', $contact->email()), '<br/>';