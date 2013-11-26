<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-success alert alert-success alert-task hide margin_top_30">
			Woo Hoo! Saved your changes!
		</div>
		<div id="container-task-table">
			<?= $this->table->gen_table('task_table', $contact->get_contacts_records('task')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('contact_actions/create'); ?>" data-alert_class="task" data-contact_id="<?= $contact->id();?>" data-action_type="task"  data-view="create_modal" data-table_id="task-table"><i class="fa fa-plus"></i> Create New Task</a>
	</div>
</div>
    <a  href="#" class="redraw-table">redraw</a>
