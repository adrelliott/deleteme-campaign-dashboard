<div class="tab-pane" id="contacts">
	<div class="row">
		<legend>Your Contacts</legend>
		<?= partial('_table_ajax', array('table_name' => 'contacts_table')); ?>
	</div>
	<div class="row">
		<div>
			<a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Contact</a>
		</div>
	</div>
</div>