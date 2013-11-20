<div class="row">
	<div class=" form-inline">
		<?= form_open('contact_actions/edit/', 'class="form-horizontal ajax_form modal_form" role="form" data-section="' . $contact_action->action_type() . '" data-column="' . $_POST['column'] . '" '); ?>
			<?= form_hidden('contact_id', $contact_action->contact_id()); ?>
			<?= form_hidden('action_type', $contact_action->action_type()); ?>

			<?= partial('_form_contactactions_' . $contact_action->action_type()); ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="fa fa-plus"></i> Add this...</button> 
			</div>
		<?= form_close(); ?>
	</div>
</div>


<? dump($contact_action);?>