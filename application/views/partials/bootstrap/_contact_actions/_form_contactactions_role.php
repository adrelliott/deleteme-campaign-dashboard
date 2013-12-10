
<div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
	<label class="" for="action_subtype">Type of Role:</label>
	<?= form_dropdown('action_subtype', config('role_types', 'dropdowns'), $p->action_subtype(), 'class="form-control input-lg" id="action_subtype"'); ?>
</div>

<div class="form-group col-md-1 col-sm-1 visible-md visible-sm"></div>

<div class="form-group col-lg-6 col-md-5 col-sm-5  col-xs-12">
    <label class="" for="action_other_notes">Season</label>
    <?= form_dropdown('action_other_notes', config('seasons', 'dropdowns'), $p->action_other_notes(), 'class="form-control input-lg" id="action_other_notes"'); ?>
</div>



<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_title">Full Description</label>
	<input type="text" class="form-control input-lg" name="action_title" id="action_title" placeholder="E.g. King of all of Manchester"  value="<?= $p->action_title(); ?>">
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_description">Add some notes</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="E.g. Kneel before him" rows="3"><?= $p->action_description(); ?></textarea>
</div>


<div class="form-group col-lg-6 col-md-5 col-sm-5  col-xs-12">
	<label class="" for="action_startdate">Start Date</label>
	<input type="date" class="form-control input-lg" name="action_startdate" id="action_startdate" placeholder="dd/mm/yy"  value="<?= $p->action_startdate(); ?>">
</div>

<div class="form-group col-md-1 col-sm-1 visible-sm visible-md"></div>

<div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
	<label class="" for="action_enddate">End Date</label>
	<input type="date" class="form-control input-lg" name="action_enddate" id="action_enddate" placeholder="dd/mm/yy"  value="<?= $p->action_enddate(); ?>">
</div>
<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>