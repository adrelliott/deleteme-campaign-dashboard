
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="message-task"></div>
    <div id="container-task">
      <?= $this->table->gen_table('tasks_table', $contact->get_contact_actions('task')); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right edit-record-modal" href="#" html-source="<?php echo site_url('contact_actions/create/task/' . $contact->id() ); ?>" table-id="task-table"><i class="fa fa-plus"></i> Create New Task</a>
  </div>
</div>