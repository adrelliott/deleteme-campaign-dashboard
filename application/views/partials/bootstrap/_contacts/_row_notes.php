<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="form-success alert alert-success alert-note hide margin_top_30">
			Woo Hoo! Saved your changes!
		</div>
		<div id="container-note-table">
			<?= $this->table->gen_table('note_table', $p->get_contact_action_records('note')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<a class="btn btn-primary pull-right open-modal" href="#" modal-source="<?= site_url('contact_actions/create'); ?>" data-alert_class="note" data-contact_id="<?= $p->id();?>" data-action_type="note" data-view="show_modal"  ><i class="fa fa-plus"></i> Create New Note</a>
	</div>
</div>