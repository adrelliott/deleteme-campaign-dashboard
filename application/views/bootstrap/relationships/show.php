
<div class="row">
	<div class=" form-inline">
		<?= form_open('relationships/edit/' . $p->id(), 'class="form-horizontal ajax_form modal_form" role="form" data-section="relationship" alert-class="' . $p->alert_class() . '" '); ?>

        <div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
        	<label class="" for="typeahead_contacts">test....</label>
        	<input type="text" class="form-control input-lg typeahead" data-remote="<?= site_url('ajax/contacts/typeahead_contacts/first_name/id/last_name/postal_code'); ?>" idfield="other_contact_id" id="typeahead_contacts" placeholder="Start typing a first or last name..."  value="">
        </div>

		<div class="form-group col-lg-6 col-md-6 col-sm-6  col-xs-12">
			<label class="" for="type">Relationship Type:</label>
			<?= form_dropdown('type', config('relationship_types', 'dropdowns'), $p->type(), 'class="form-control input-lg" id="type"'); ?>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="notes">Any notes?</label>
			<textarea class="form-control" id="notes" name="notes" placeholder="E.g. Got married in our shop" rows="6"><?= $p->notes(); ?></textarea>
		</div>

        <input type="hidden" name="user_id" value="<?= $p->user_id(); ?>" id="user_id">
        <input type="hidden" name="other_contact_id" value="<?= $p->other_contact_id(); ?>" id="other_contact_id">
        <input type="hidden" name="contact_id" value="<?= $p->contact_id(); ?>" id="contact_id" >
    
        <?//= form_hidden('user_id', $p->user_id()); ?>
        <?//= form_hidden('other_contact_id', $p->other_contact_id(), 'id="other_contact_id"'); ?>
        <?//= form_hidden('contact_id', $p->contact_id(), 'id="contact_id"'); ?>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="fa fa-plus"></i> Add this...</button> 
		</div>
		<?= form_close(); ?>
	</div>
</div>
<?dump($p); ?>