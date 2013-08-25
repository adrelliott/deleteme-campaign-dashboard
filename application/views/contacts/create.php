<?php $contact = new Contact_Presenter();?>
<?php if ($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>
<hr/>
<div style='width:47.5%;border-right:1px solid grey;float:left;height:100%;padding:1%'>
	<?php 
		echo form_open('contacts/edit');
		include (APPPATH. 'views/partials/_contact_form.php');
		echo form_submit('', 'submit');
		echo form_close();
	?>
</div>
<div style='width:47.5%;float:left;height:100%;padding:1%'>
	col 2
</div>
<hr style='clear:both'>
