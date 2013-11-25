<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div id="alert-task" class=" hide">
				<div class="alert alert-success">Woo hoo! Changes Saved!</div>
			</div>
		</div>
		<div id="container-task-table">
			<?//= $this->table->gen_table('task_table', $contact->get_contact_actions('task')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" data-source="<?= site_url('contact_actions/create/task/' . $lead->id() ); ?>" data-column="2"  ><i class="fa fa-plus"></i> Create New Task</a>
	</div>
</div>
<code>Remember: the button needs to pass the contact-> id() as well as the lead id - amend the form in contact_actions controller to allow for this</code>