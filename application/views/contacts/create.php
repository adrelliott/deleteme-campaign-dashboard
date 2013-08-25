<?php $contact = new Contact_Presenter();?>
<div class="container">

   <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Hi Al!</h1>
      <p>While you've been out eating cake and pretending you're a busy person, I've been hard at work.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar">See what I've done &raquo;</a>
      </p>
    </div>

  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">
      <h2>Your Contacts</h2>
      <code>Datatable of contacts goes here</code>

      <p><a class="btn btn-lg btn-primary pull-right padding-right-10" href="#">Create a new contact &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Quick Actions</h2>
      <code>Buttons go here</code>
   </div>
  </div>
</div> <!-- /container -->







<?php if ($this->session->flashdata('message')) echo $this->session->flashdata('message'); ?>
<hr/>
<div style='width:47.5%;border-right:1px solid grey;float:left;height:100%;padding:1%'>
	<?php 
		echo form_open('contacts/edit');
		include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_form.php');
		echo form_submit('', 'submit');
		echo form_close();
	?>
</div>
<div style='width:47.5%;float:left;height:100%;padding:1%'>
	col 2
</div>
<hr style='clear:both'>
