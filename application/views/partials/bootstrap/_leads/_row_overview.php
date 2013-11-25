  <div class="row">
  	<legend>Overview</legend>
    <div class=" form-inline">
      <?= form_open(site_url('leads/edit/' . $lead->id()), 'role="form" class="ajax_form" data-column="1"'); ?>

      <?= partial('_form_overview'); ?>

      <div class="form-group col-lg-12 col-md-12 col-sm-12">
        <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save Changes</button>
      </div>

      <?= form_close(); ?>
    </div>
  </div>