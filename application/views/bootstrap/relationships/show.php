
<div class="row">
	<div class=" form-inline">
		<?= form_open('relationships/edit/' . $relationship->id(), 'class="form-horizontal ajax_form modal_form" role="form" data-section="relationship" alert-class="' . $relationship->alert_class() . '" '); ?>
		<?= form_hidden('contact_id', $relationship->contact_id()); ?>



<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="">test....</label>
	<input type="text" class="form-control input-lg typeahead" data-source="<?= site_url('ajax/contacts/typeahead_contacts/first_name/id/last_name/postal_code'); ?>" name="" id="" placeholder="Start typing a first or last name..."  value="">
</div>
<input type="text" name="test_id" id="test_id" value="">





		<?//= partial('_form_relationships'); ?>

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="">Who is related?</label>
			<input type="text" class="form-control input-lg contact-search" name="" id="" placeholder="Start typing the surname..."  value="<?= $relationship->other_contact_full_name(); ?>">
		</div>
		<input type="hidden" name="other_contact_id" id="other_contact_id" value="<?= $relationship->other_contact_id(); ?>">

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="type">Relationship Type:</label>
			<?= form_dropdown('type', config('relationship_types', 'dropdowns'), $relationship->type(), 'class="form-control input-lg" id="type"'); ?>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="notes">Any notes?</label>
			<textarea class="form-control" id="notes" name="notes" placeholder="E.g. Got married in our shop" rows="6"><?= $relationship->notes(); ?></textarea>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="fa fa-plus"></i> Add this...</button> 
		</div>
		<?= form_close(); ?>
	</div>
</div>


<? dump($relationship);?>