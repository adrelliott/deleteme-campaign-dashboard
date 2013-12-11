
<legend>What are we going to call this broadcast...?</legend>
<div class=" form-inline">
	<?= form_open(site_url('broadcasts/edit'), 'role="form"'); ?>

	<div class="form-group col-lg-8 col-md-8 col-sm-12  col-xs-12">
		<label class="" for="broadcast_name">Broadcast Name</label>
		<input type="text" class="form-control input-lg" name="broadcast_name" id="broadcast_name" placeholder="E.g. Newsletter <?= date('d/m/y'); ?>"  value="<?= $p->broadcast_name(); ?>">
	</div>

	<div class="form-group col-lg-4 col-md-4 col-sm-12  col-xs-12">
		<label class="" for="broadcast_type">Type of Broadcast</label>
		<?= form_dropdown('broadcast_type', config('broadcast_type', 'dropdowns'), '', 'class="form-control input-lg" input-sm'); ?>
	</div>
	
	<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
		<label class="" for="broadcast_description">Broadcast Description</label>
		<textarea class="form-control input-lg" rows="5" placeholder="This broadcast is tell everyone I know that I have change my name to 'Odin the Great, Leader of the Badger Revolution', and they should update their Christmas card list accordingly." name="broadcast_description" id="broadcast_description"><?= $p->broadcast_description(); ?></textarea>
	</div>
	
	<div class="form-group col-lg-8 col-md-6 col-sm-12 col-xs-12">
		<p class="help-block"><strong>"Oh no! Where do I write my email?"</strong><br/> Calm down dear, there's space on the next page for all that</p>
	</div>

	<div class="form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
		<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Create This Broadcast...</button>
	</div>

	
	<?= form_close();?>
</div>

