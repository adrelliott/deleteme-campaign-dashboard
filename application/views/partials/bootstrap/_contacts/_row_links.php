<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <div id="alert-relationship" class=" hide">
        <div class="alert alert-success">Woo hoo! Changes Saved!</div>
      </div>
    </div>
    <div id="container-relationship-table">
      <? //die(dump($contact->get_contacts_records('relationships'))); ?>
      <?= $this->table->gen_table('relationship_table', $contact->get_contacts_records('relationships')); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <a class="btn btn-primary pull-right open-modal" href="#" data-source="<?= site_url('relationships/create/' . $contact->id() ); ?>"  data-column="1" ><i class="fa fa-plus"></i> Create New Relationship</a>
  </div>
</div>
<code>To do:
<br>1. Set up relationships table
<br>2. Create a relationships modal that has typeahead for contacts and reason dropdown

</code>
<?// dump($contact->get_contacts_records('relationships'));