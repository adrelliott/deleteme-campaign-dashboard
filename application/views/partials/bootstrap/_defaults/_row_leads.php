<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div id="alert-lead" class=" hide">
				<div class="alert alert-success">Woo hoo! Changes Saved!</div>
			</div>
		</div>
		<div id="container-lead-table">
			<?//= $this->table->gen_table('lead_table', $contact->get_leads()); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" data-source="<?= site_url('contact_actions/create/lead/' . $contact->id() ); ?>"  ><i class="fa fa-plus"></i> Create New Task</a>
	</div>
</div>