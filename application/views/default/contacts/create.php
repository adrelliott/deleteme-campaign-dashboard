<?php $contact = new Contact_Presenter();?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">New Contact's Details</h4>
        </div>
        <div class="panel-body">
          <?php 
            //Start contact form
              echo $this->messages->show();
              echo form_open('contacts/edit/', 'role="form"');
              include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_form.php');
              echo form_submit('', 'submit', 'class="btn btn-default pull-right"');
              echo form_close();
            //End Contact form
          ?>
        </div>
      </div>
    </div>
  </div>  <!-- /row -->
</div> <!-- /container -->