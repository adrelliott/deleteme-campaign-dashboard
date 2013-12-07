<div class="row">
	<legend>Other Details</legend>
	<div class="form-inline"><!-- .form-inline-->
	<div class="form-success alert alert-success alert-indepth hide">
      Woo Hoo! Saved your changes!
    </div>
	<?= form_open(site_url('contacts/edit/' . $p->id()), 'role="form" class="ajax_form" alert-class="indepth"'); ?>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="gender">Gender</label><br>
			<label class="radio-inline">
				<input type="radio" name="gender" value="male" <?= set_radio('gender', 'male', $p->gender() == 'male'); ?> > <i class="fa fa-male "></i> Male<br>
			</label>
			<label class="radio-inline">
				<input type="radio"  name="gender" value="female" <?= set_radio('gender', 'female', $p->gender() == 'female'); ?> > <i class="fa fa-female "></i> Female<br>
			</label>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="nickname">Known As</label>
			<input type="text" class="form-control input-sm" id="nickname" name="nickname" value="<?= $p->nickname(); ?>" placeholder="E.g. Big Trev">
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="email_2">Secondary Email</label>
			<input type="email" class="form-control input-sm" id="email_2" name="email_2" value="<?= $p->email_2(); ?>" placeholder="E.g. trev@hotmail.com">
		</div>

		<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="date_of_birth">Date of Birth</label>
			<input type="date" class="form-control input-sm" id="date_of_birth" name="date_of_birth" value="<?= $p->date_of_birth(); ?>" >
		</div>

		<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="legacy_id">Membership Number</label>
			<input type="text" class="form-control input-sm" id="legacy_id" name="legacy_id" value="<?= $p->legacy_id(); ?>" placeholder="E.g. 24342">
		</div>

		<legend>Address Details</legend>

	<div class="message-overview"></div>


		<div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
			<label for="nickname">Lookup the address...</label>
			<div class="input-group">
				<input type="text" class="form-control input-sm" id="lookup_postcode" placeholder="E.g. M1 2JW">
				<span class="input-group-btn">
					<button class="btn btn-default btn-success btn-sm" type="button">Click to Find</button>
				</span>
			</div><!-- /input-group -->
		</div><!-- /.form-group --> 

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="org_name">Organisation name</label>
			<input type="text" class="form-control input-sm" id="org_name" name="org_name" value="<?= $p->org_name(); ?>" placeholder="E.g. Haribo Plc">
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="address_1">Address 1</label>
			<input type="text" class="form-control input-sm" id="address_1" name="address_1" value="<?= $p->address_1(); ?>" placeholder="E.g. Tangtastic House">
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="address_2">Address 2</label>
			<input type="text" class="form-control input-sm" id="address_2" name="address_2" value="<?= $p->address_2(); ?>" placeholder="E.g. 22, Confection Street">
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<label for="address_3">Address 3</label>
			<input type="text" class="form-control input-sm" id="address_3" name="address_3" value="<?= $p->address_3(); ?>" placeholder="E.g. Sweetingborough">
		</div>

		<div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
			<label for="city">City</label>
			<input type="text" class="form-control input-sm" id="city" name="city" value="<?= $p->city(); ?>" placeholder="E.g. Chewton">
		</div>

		<div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<label for="postal_code">Postcode</label>
			<input type="text" class="form-control input-sm" id="postal_code" name="postal_code" value="<?= $p->postal_code(); ?>" placeholder="E.g. SW33 TIE">
		</div>

		<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="county">County</label>
			<input type="text" class="form-control input-sm" id="county" name="county" value="<?= $p->county(); ?>" placeholder="E.g. Treatshire">
		</div>

		<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="country">Country</label>
			<input type="text" class="form-control input-sm" id="country" name="country" value="<?= $p->country(); ?>" placeholder="E.g. United Kingdom">
		</div>

		<legend>Contact Details</legend>

		<div class="form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<label for="telephone_3">Work Number</label>
			<input type="text" class="form-control input-sm" id="telephone_3" name="telephone_3" value="<?= $p->telephone_3(); ?>" placeholder="E.g. 01613456565">
		</div>

		<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<label for="telephone_4">Overseas Number</label>
			<div class="input-group">
				<span class="input-group-addon">(00)</span>
				<input type="text" class="form-control input-sm" id="telephone_4" name="telephone_4" value="<?= $p->telephone_4(); ?>" placeholder="E.g. 447703534343">
			</div>
		</div>

		<div class="form-group col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<label for="twitter_id">Twitter</label>
			<div class="input-group">
				<span class="input-group-addon">@</span>
				<input type="text" class="form-control input-sm" id="twitter_id" name="twitter_id" value="<?= $p->twitter_id(); ?>" placeholder="E.g. big_trev">
			</div>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Save These Changes</button>
		</div>
	<?= form_close(); ?>
	</div><!-- /.form-inline-->
</div>

