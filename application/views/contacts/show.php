<hr/>
<div style='width:47.5%;border-right:1px solid grey;float:left;height:100%;padding:1%'>
	<?php 
		echo form_open('contact/edit/' . $result->contact->id);
		echo form_label('First Name', 'first_name');
		echo form_input('first_name', 'xxx'), '<br/>';
		echo form_label('Last Name', 'last_name');
		echo form_input('last_name', 'xxx'), '<br/>';
		echo form_label('Email', 'email');
		echo form_input('email', 'xxx'), '<br/>';
		echo form_submit('SUBMIT', 'submit');
		echo form_close();
	?>
</div>
<div style='width:47.5%;float:left;height:100%;padding:1%'>
	col 2
</div>
<hr style='clear:both'>

	this si contact/show.php
	<br/>This si the record_id - <?php //echo $result->record_id(); ?>
	<br/>This si the contact_id - <?php //echo $result->contact_id(); ?>
	<br/>This is <?php //echo $result->name_owned(); ?> record...
	<br/><?php //echo $result->name_owned(); ?> last name: <?php //echo $result->contact->last_name; ?>

	<?php //dump($result); ?>

	<?php 
	//dump($result->get_actions('task')); 
	//dump($result->get_actions('note')); 
	//dump($result->get_actions('tweet')); 
	//dump($result->get_actions('email')); 
	//dump($result->get_actions('appointment')); 
	//$result_>get_actions($)
	



	//$contact_actions = $result->get_actions(); 
	//$result->contact_actions = $contact_actions;
//echo '<h1>Here are the contact actions</h1>';dump($contact_actions);

	?>



