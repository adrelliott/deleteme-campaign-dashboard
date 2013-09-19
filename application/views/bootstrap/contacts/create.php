<div class="page-header">
  <h1 id="navbar">Add a new contact here...</h1>
</div>
<div class="row">

  <div class="col-lg-6">
    <div class="well">
      <p class="lead">Go on <?= $contact->user_first_name(); ?>... you can do this. <br>Add anything you like. This is your big moment.</p>
      <? echo form_open('contacts/edit', ' role="form"'); ?>
      <? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_create.php'); ?>
      <?php echo form_close(); ?>
      <p>Add more details on the next screen...</p>
    </div>
  </div>
  
</div>