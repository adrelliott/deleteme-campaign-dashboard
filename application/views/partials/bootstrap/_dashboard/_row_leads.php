<div class="tab-pane" id="leads">
	<div class="row">
		<legend>Your Leads</legend>
		<?= partial('_table_ajax', array('table_name' => 'leads_table')); ?>
	</div>
	<div class="row">
		<div>
			<a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Lead</a>
		</div>
	</div>
</div>