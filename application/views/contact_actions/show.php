<?php $contact_action = new Contact_action_Presenter($contact_action);?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Contact Actiomn <a href="<?php echo site_url('contact_action/delete/' . $contact_action->id()); ?>"><button class="btn btn-danger btn-xs pull-right">Delete Contact</button></a></h4>

				</div>
				<div class="panel-body">
					<?php 
				//Start contact form
				//
					echo $this->messages->show();
					echo form_open('contacts/edit/' . $contact->id(), 'role="form"');
					include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_form.php');
					echo form_submit('', 'submit', 'class="btn btn-default pull-right"');
					echo form_close();
				//End Contact form
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
					//stuff
				</div>
			</div>
		</div>
	</div>  <!-- /row -->
</div> <!-- /container -->




  <!-- Modal -->
  <div class="modal fade" id="modal-task" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add a Task</h4>
        </div>
        <div class="modal-body">
          <p>This should be able to reference the contact id - <?php echo $contact->id(); ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close without saving</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->