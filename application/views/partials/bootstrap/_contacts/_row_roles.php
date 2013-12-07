<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-success alert alert-success alert-role hide margin_top_30">
      Woo Hoo! Saved your changes!
    </div>
    <div id="container-role-table">
      <?= $this->table->gen_table('role_table', $p->get_contact_action_records('role')); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('contact_actions/create'); ?>" data-alert_class="role" data-contact_id="<?= $p->id();?>" data-action_type="role" ><i class="fa fa-plus"></i> Create New Role</a>
  </div>
</div>