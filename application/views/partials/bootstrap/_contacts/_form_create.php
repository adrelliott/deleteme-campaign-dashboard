
<legend>What's your new friend's name...?</legend>
<div class=" form-inline">
	<?= form_open(site_url('contacts/edit'), 'role="form"'); ?>
		
		<?= partial('_form_overview'); ?>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Create This Contact...</button>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<p class="help-block"><strong>Got more to say?</strong> Don't worry, there's space on the next page for all that</p>
		</div>

	<?= form_close();?>
</div>

