<?php $contact = new Contact_Presenter($contacts);?>
<?php if ($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>
<hr/>
<div style='width:47.5%;border-right:1px solid grey;float:left;height:100%;padding:1%'>
	<?php 
		echo form_open('contacts/edit/' . $contact->id());
		include (APPPATH. 'views/partials/_contact_form.php');
		echo form_submit('', 'submit');
		echo form_close();
	?>
	
<a href="<?php echo site_url('contacts/delete/' . $contact->id()); ?>">
	<button>
		<h4>Delete this Contact</h4>
	</button>
</a>
</div>
<div style='width:47.5%;float:left;height:100%;padding:1%'>
	col 2
</div>
<hr style='clear:both'>
	<br/>This si the record_id - <?php echo $contact->id(); ?>
	<br/>This si the contact_id - <?php echo $contact->first_name(); ?>
	<br/>This is <?php echo $contact->name_owned(); ?> record...
	<br/><?php echo $contact->name_owned(); ?> last name: <?php echo $contact->contact->last_name; ?>