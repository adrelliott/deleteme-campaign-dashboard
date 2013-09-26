
<?= form_open('contact_actions/edit/' . $contact_action->id(), 'class="form-horizontal ajax1" role="form"  '); ?>
    <?= form_hidden('contact_id', $contact_action->contact_id()); ?>
    <?= form_hidden('action_type', $action_type); ?>

	<? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_actions/_form_contact_actions_' . $action_type . '.php');?>

	<div class="form-group">
	    <div class="col-lg-10 col-lg-offset-2">
	      <button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="icon-ok"></i> Save Changes</button> 
	    </div>
  	</div>
  	<div class="message-contact"></div>
<?= form_close(); ?>



<?	//Remove me when going live 
dump($contact_action); 
$this->output->enable_profiler(FALSE); 
?>