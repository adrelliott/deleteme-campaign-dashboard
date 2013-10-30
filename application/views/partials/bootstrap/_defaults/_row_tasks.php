  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <?= partial('_table_tasks'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
     <a class="btn btn-primary pull-right edit-record-modal" href="#" html-source="<?php echo site_url('contact_actions/create/task/' . $contact->id() ); ?>" >Create New Task &raquo;</a>
    </div>
  </div>