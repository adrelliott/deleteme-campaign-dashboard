<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="alert-note" class="hide clearfix">
    	<div class="alert alert-success">Note Saved!</div>
    </div>
    <a href="#" class="open-modal" modal-type="small" data-id="3419" data-source="<?= site_url('contact_actions/show'); ?>" >row link for 3419</a>
  
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right open-modal" href="#" modal-type="small" data-source="<?= site_url('contact_actions/create/note/' . $contact->id() ); ?>"  ><i class="fa fa-plus"></i> Create New Note</a>
  </div>

    <div id="container-notes">
      <?= $this->table->gen_table('notes_table', $contact->get_contact_actions('note')); ?>
    </div>
  </div>
</div>
<div class="row">
  //button goes here
</div>
<? dump( $contact->get_contact_actions('note') ); ?>