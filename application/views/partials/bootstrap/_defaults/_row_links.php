<div class="row">
	<legend>Relationships</legend>
	<div id="alert-relationship"></div>
    <div id="container-relationship">
    	<code>Realtionship table</code>
      <?//= $this->table->gen_table('notes_table', $contact->get_contact_actions('note')); ?>
    </div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right edit-record-modal" href="#" html-source="<?php echo site_url('relationships/create/contact/' . $contact->id() ); ?>" table-id="note-table"><i class="fa fa-plus"></i> Create New Relationship</a>
  </div>
	
</div>

