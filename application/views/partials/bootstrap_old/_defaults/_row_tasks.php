<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div id="alert-task" class=" hide">
				<div class="alert alert-success">Woo hoo! Changes Saved!</div>
			</div>
		</div>
		<div id="container-task-table">
			<?= $this->table->gen_table('task_table', $contact->get_contact_actions('task')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" data-source="<?= site_url('contact_actions/create/task/' . $contact->id() ); ?>" data-column="2"  ><i class="fa fa-plus"></i> Create New Task</a>
	</div>
</div>


<code>to do:
	<br>1. Check that the recoeds are saving ok
	<br>2. Unhide the alert on the modal if somethign has gone wrong: #modal-alert
	<br>3. show the success message when the modal closes and it has been saved ok : #alert-task
	<br>4. Duploicates ofr the other rows.
	<br>5. create the 'delete' and then 'toggle' JQuery functions
</code>