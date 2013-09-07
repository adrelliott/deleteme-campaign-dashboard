<div class="page-header">
  <h1 id="navbar">Add a new contact here...</h1>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="well">
      <!-- Start of pills -->
     <div class="tabbable">
        <ul class="nav nav-pills">
          <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="overview">
            <br/><p class="lead">Go on <?= $contact->user_first_name(); ?>... you can do this. <br>Add anything you like. This is your big moment.</p§>
            <? echo form_open('contacts/edit', ' role="form"'); ?>
            <? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_create.php'); ?>
            <?php echo form_close(); ?>
          </div>
        </div>
        <!-- End of pills -->
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-lg-offset-1">
	<? //left empty on create ?>
  </div>
</div>