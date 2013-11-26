<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
    <div class="form-success alert alert-success alert-tag hide margin_top_30">
      Woo Hoo! Saved your changes!
    </div>

    <div class=" form-inline">
      <?= form_open(site_url('contacts/edit'), 'role="form" class="ajax_form"'); ?>
        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
          <label for="nickname">Add a tag</label>
          <div class="input-group">
            <input type="text" class="form-control tag-search" id="" placeholder="Start typing to search tags...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-success">Apply Tag</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.form-group -->
        <?= form_input('tag_id');?>
      <?= form_close(); ?>
    </div> 

    <div id="container-tag-table">
      <?= $this->table->gen_table('tag_table', $contact->get_contacts_records('tags')); ?>
    </div>

  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('contact_actions/create'); ?>" data-alert_class="tag" data-contact_id="<?= $contact->id();?>" data-action_type="tag" data-view="show_modal"  ><i class="fa fa-plus"></i> Create New tag</a>
  </div>
</div>