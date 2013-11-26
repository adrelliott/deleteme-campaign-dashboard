
<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_subtype">Type of Role:</label>
	<?= form_dropdown('action_subtype', config('role_types', 'dropdowns'), $contact_action->action_subtype(), 'class="form-control input-lg" id="action_subtype"'); ?>
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_title">Full Description</label>
	<input type="text" class="form-control input-lg" name="action_title" id="action_title" placeholder="E.g. King of all of Manchester"  value="<?= $contact_action->action_title(); ?>">
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_description">Add some notes</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="E.g. Kneel before him" rows="3"><?= $contact_action->action_description(); ?></textarea>
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_other_notes">Season</label>
	<?= form_dropdown('action_other_notes', config('seasons', 'dropdowns'), $contact_action->action_other_notes(), 'class="form-control input-lg" id="action_other_notes"'); ?>
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-6">
	<label class="" for="action_startdate">Start Date</label>
	<input type="date" class="form-control input-lg" name="action_startdate" id="action_startdate" placeholder="dd/mm/yy"  value="<?= $contact_action->action_startdate(); ?>">
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-6">
	<label class="" for="action_enddate">End Date</label>
	<input type="date" class="form-control input-lg" name="action_enddate" id="action_enddate" placeholder="dd/mm/yy"  value="<?= $contact_action->action_enddate(); ?>">
</div>