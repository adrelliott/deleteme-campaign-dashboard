<?php
	//echo form_label('First Name', 'first_name');
	//echo form_input('first_name', $contact->first_name()), '<br/>';
	//echo form_label('Last Name', 'last_name');
	//echo form_input('last_name', $contact->last_name()), '<br/>';
	//echo form_label('Email', 'email');
	//echo form_input('email', $contact->email()), '<br/>';
	?>
<div class="form-group">
	<label for="first_name">contact Id</label>
	<?php echo form_input('contact_id', $contact_action->contact_id(), 'class="form-control" id="contact_id" placeholder="Contacts id"'); ?>
</div>
<div class="form-group">
	<label for="last_name">Action Type</label>
	<?php echo form_input('action_type', $contact_action->action_type(), 'class="form-control" id="action_type" placeholder="Contact_action type..."'); ?>
</div>
<div class="form-group">
	<label for="email">Action title</label>
	<?php echo form_input('action_title', $contact_action->action_title()); ?>
</div>
  