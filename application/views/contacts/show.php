<?php 
	$contact = new Contact_Presenter($contacts);
	//$contact_actions = $contact->sort_actions($contact_actions);

	//$contact_actions = new Contact_Action_Presenter($contacts);
?>
<?php if ($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>
<hr/>
<?php //dump($contact); ?>
<?php //dump($contact_actions); ?>
<div style='width:47.5%;border-right:1px solid grey;float:left;height:100%;padding:1%'>
	<?php 
	//get partial
		echo form_open('contacts/edit/' . $contact->id());
		include (APPPATH. 'views/partials/_contact_form.php');
		echo form_submit('', 'submit');
		echo form_close();
	?>
</div>
<div style='width:47.5%;float:left;height:100%;padding:1%'>
	col 2
</div>
<hr style='clear:both'>

	this si contact/show.php
	<br/>This si the record_id - <?php echo $contact->id(); ?>
	<br/>This si the contact_id - <?php echo $contact->first_name(); ?>
	<br/>This is <?php echo $contact->name_owned(); ?> record...
	<br/><?php echo $contact->name_owned(); ?> last name: <?php echo $contact->contact->last_name; ?>

	<?php 
	//$contact_actions = $result->contact;
	//echo '<br/><br/><br/>here it is!'; dump($data); ?>

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



