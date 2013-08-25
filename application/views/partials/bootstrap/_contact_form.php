<?php
	//echo form_label('First Name', 'first_name');
	//echo form_input('first_name', $contact->first_name()), '<br/>';
	//echo form_label('Last Name', 'last_name');
	//echo form_input('last_name', $contact->last_name()), '<br/>';
	//echo form_label('Email', 'email');
	//echo form_input('email', $contact->email()), '<br/>';
	?>
<div class="form-group">
	<label for="first_name">First Name</label>
	<?php echo form_input('first_name', $contact->first_name(), 'class="form-control" id="first_name" placeholder="Contact\'s first name..."'); ?>
</div>
<div class="form-group">
	<label for="last_name">Last Name</label>
	<?php echo form_input('last_name', $contact->last_name(), 'class="form-control" id="last_name" placeholder="Contact\'s last name..."'); ?>
</div>
<div class="form-group">
	<label for="email">Email Address</label>
	<?php echo form_input('email', $contact->email(), 'class="form-control" id="rmasl" placeholder="Contact\'s email..."'); ?>
</div>
  