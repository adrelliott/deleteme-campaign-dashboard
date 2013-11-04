<div class="row">
	<legend>Relationships</legend>
	<?= partial('_table_sample', array('table_name' => 'sample_table')); ?> 
</div>
<div class="row">
	<div>
		<a href="<?= site_url('contacts/create'); ?>" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New Relationship</a>
	</div>
</div>