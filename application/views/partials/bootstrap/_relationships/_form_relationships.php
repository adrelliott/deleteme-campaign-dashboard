<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="">Who is related?</label>
	<input type="text" class="form-control input-lg contact-search" name="" id="" placeholder="Start typing the surname..."  value="<?= $relationship->other_contact_full_name(); ?>">
</div>
<input type="hidden" name="other_contact_id" id="other_contact_id" value="<?= $relationship->other_contact_id(); ?>">

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="type">Relationship Type:</label>
	<?= form_dropdown('type', config('relationship_types', 'dropdowns'), $relationship->type(), 'class="form-control input-lg" id="type"'); ?>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="notes">Any notes?</label>
	<textarea class="form-control" id="notes" name="notes" placeholder="E.g. Got married in our shop" rows="6"><?= $relationship->notes(); ?></textarea>
</div>
