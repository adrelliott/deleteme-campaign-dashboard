<?php $contact = new Contact_Presenter($contacts);?>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
		  <div class="panel-heading">
		    <h4 class="panel-title">Contact Details <a href="<?php echo site_url('contacts/delete/' . $contact->id()); ?>"><button class="btn btn-danger btn-xs pull-right">Delete Contact</button></a></h4>

		  </div>
		  <div class="panel-body">
		    <?php 
				echo message($this->session->flashdata('message'), 'success');
				echo form_open('contacts/edit/' . $contact->id(), 'role="form"');
				include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_form.php');
				echo form_submit('', 'submit', 'class="btn btn-default pull-right"');
				echo form_close();
			?>
		  </div>
		</div>
	</div>
    <div class="col-md-6">
      <div class="panel panel-default">
		  <div class="panel-heading">
		    <h3 class="panel-title">Contact Details</h3>
		  </div>
		  <div class="panel-body">
		    Panel content
		  </div>
		</div>
   </div>
  </div>  <!-- /row -->
</div> <!-- /container -->
