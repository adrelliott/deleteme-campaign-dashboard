
<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_title">Describe your task:</label>
	<input type="text" class="form-control input-lg" name="action_title" id="action_title" placeholder="E.g. Follow up on last phone call"  value="<?= $p->action_title(); ?>">
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_description">Add more detail:</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="E.g. We discussed another repeat order last time we spoke." rows="6"><?= $p->action_description(); ?></textarea>
</div>

<div class="form-group col-lg-6 col-md-6 col-sm-12  col-xs-12">
	<label class="" for="action_enddate">Completion date:</label>
	<input type="date" class="form-control input-lg" name="action_enddate" id="action_enddate"  value="<?= $p->action_enddate(); ?>">
</div>


<div class="form-group col-lg-6 col-md-6 col-sm-12  col-xs-12">
	<label class="" for="user_id">Assigned to:</label>
	<input type="text" class="form-control input-lg" name="user_id" id="user_id" placeholder="E..g Susan"  value="<?= $p->user_id(); ?>">
</div>
