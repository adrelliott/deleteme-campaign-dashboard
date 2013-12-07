

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="form-success alert alert-success alert-relationship hide margin_top_30">
      Woo Hoo! Saved your changes!
    </div>
    <div id="container-relationship-table">
      <?= $this->table->gen_table('relationship_table', $p->get_contacts_records('relationships')); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('relationships/create'); ?>" data-alert_class="relationship" data-contact_id="<?= $p->id();?>"  ><i class="fa fa-plus"></i> Create New Relationship</a>
  </div>
</div>