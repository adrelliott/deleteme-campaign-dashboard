<?= form_open('contact_actions/edit/' . $contact_action->id(), 'class="form-horizontal ajax" role="form" data-section="' . $contact_action->action_type() . '" '); ?>
	<?= form_hidden('contact_id', $contact_action->contact_id()); ?>
	<?= form_hidden('action_type', $contact_action->action_type()); ?>

	<?= partial('_form_contactactions_' . $contact_action->action_type()); ?>

	<div class="form-group">
	    <div class="col-lg-10 col-lg-offset-2">
	      <button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="icon-ok"></i> Save Changes</button> 
	    </div>
  	</div>
<?= form_close(); ?>

<script src="<?= site_url('/assets/bootstrap-3/js/libs/ajax.js'); ?>"></script>