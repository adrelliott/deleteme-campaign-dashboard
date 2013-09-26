
<?= $this->messages->show(); ?>

<?= form_open('contact_actions/edit/' . $contact_action->id(), 'class="form-horizontal" role="form" data-async data-target="#contactaction-modal" id="myForm" '); ?>
    <?= form_hidden('contact_id', $contact_action->contact_id()); ?>

	<? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_contact_actions/_form_contact_actions_' . $action_type . '.php');?>

	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
      </div>
  	</div>

<?= form_close(); ?>




<?	//Remove me when going live 
dump($contact_action); 
$this->output->enable_profiler(FALSE); 
?>