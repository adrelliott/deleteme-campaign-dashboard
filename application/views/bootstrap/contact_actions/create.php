<script src="<?php echo site_url('assets/bootstrap-3/js/libs/ajax.js"'); ?>"></script>
<h3>Create new <?= $contact_action->action_type(); ?>...</h3>
ID = <?= $contact_action->contact_id(); ?>..
ID = <?= $contact_action->id(); ?>..
<?= form_open('contact_actions/edit/', 'class="form-horizontal ajax" role="form" '); ?>
    <?= form_hidden('contact_id', $contact_action->contact_id()); ?>
    <?= form_hidden('action_type', $contact_action->action_type()); ?>

	<?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_actions/_form_contact_actions_' . $contact_action->action_type() . '.php');?>

	<div class="form-group">
	    <div class="col-lg-10 col-lg-offset-2">
	      <button id="create-task" type="submit" class="btn btn-success pull-right modal-submit" ><i class="icon-ok"></i> Save Changes</button> 
	    </div>
  	</div>
  	<div class="message-task"></div>
<?= form_close(); ?>
<?php //dump($contact_action); ?>


