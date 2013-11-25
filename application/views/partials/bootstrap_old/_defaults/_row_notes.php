<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="row">
			<div id="alert-note" class=" hide">
				<div class="alert alert-success">Woo hoo! Changes Saved!</div>
			</div>
		</div>
		<div id="container-note-table">
			<?= $this->table->gen_table('note_table', $contact->get_contact_actions('note')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" data-source="<?= site_url('contact_actions/create/note/' . $contact->id() ); ?>" data-column="1"  ><i class="fa fa-plus"></i> Create New Note</a>
	</div>
</div>
<code>To do:
<br>1. Can we set a stndard width of the col for notes?
<br>2. Can we format the date a bit better?
<br>3. Can we also show the person who wrote the note?
</code>