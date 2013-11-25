
<div class="row">
	<div class=" form-inline">
		<?= form_open('relationships/edit/' . $relationship->id(), 'class="form-horizontal ajax_form modal_form" role="form" data-section="relationship" data-column="' . $_POST['column'] . '" '); ?>
		<?= form_hidden('contact_id', $relationship->contact_id()); ?>

		<?//= partial('_form_relationships'); ?>

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="">Who is related?</label>
			<input type="text" class="form-control input-lg contact-search" name="" id="" placeholder="Start typing the surname..."  value="<?//= $relationship->other_contact_full_name(); ?>">
		</div>
		<input type="text" name="other_contact_id" id="other_contact_id" value="">

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="type">Relationship Type:</label>
			<select class="form-control input-lg" name="type" id="type">
			  <option>1</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
			<!-- <input type="date" class="form-control input-lg" name="type" id="type"  value="<?//= $relationship->type(); ?>"> -->
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
			<label class="" for="notes">Any notes?</label>
			<textarea class="form-control" id="notes" name="notes" placeholder="E.g. Got married in our shop" rows="6"><?= $relationship->notes(); ?></textarea>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<button type="submit" class="btn btn-success pull-right" class="modal-submit"><i class="fa fa-plus"></i> Create Relationship</button> 
		</div>
		<?= form_close(); ?>
	</div>
</div>


<? dump($relationship);?>