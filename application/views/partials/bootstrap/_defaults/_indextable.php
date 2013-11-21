<div class="row">
	<?= $this->table->gen_table(controller('singular') . '_table'); ?>
</div>
<div class="row">
	<div>
		<a href="<?= site_url(controller() . '/create'); ?>" class="btn btn-primary btn-lg pull-right"><i class="fa fa-plus"></i> Create New <?= controller('label'); ?></a>
	</div>
</div>

