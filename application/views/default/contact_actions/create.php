<?php $contact_action = new Contact_action_Presenter();?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Contact Action <a href="<?php echo site_url('contact_action/delete/' . $contact_action->id()); ?>"><button class="btn btn-danger btn-xs pull-right">Delete action</button></a></h4>

				</div>
				<div class="panel-body">
					<?php 
				//Start contact form
				//
					echo $this->messages->show();
					echo form_open('contact_actions/edit/', 'role="form"');
					include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_action_form.php');
					echo form_submit('', 'submit', 'class="btn btn-default pull-right"');
					echo form_close();
				//End Contact form
					?>
				</div>
			</div>
		</div>
	</div>  <!-- /row -->
</div> <!-- /container -->