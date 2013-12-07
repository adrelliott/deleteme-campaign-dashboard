<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="first_name">First name</label>
	<input type="text" class="form-control input-lg" name="first_name" id="first_name" placeholder="E.g. Lionel" value="<?= $p->first_name(); ?>">
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="last_name">Last name</label>
	<input type="text" class="form-control input-lg" name="last_name" id="last_name" placeholder="E.g. Blair"  value="<?= $p->last_name(); ?>">
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="telephone_1">Mobile Number</label>
	<input type="text" class="form-control input-lg" name="telephone_1" id="telephone_1" placeholder="E.g. 07976234234"  value="<?= $p->telephone_1(); ?>">
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="telephone_2">Landline Number</label>
	<input type="text" class="form-control input-lg" name="telephone_2" id="telephone_2" placeholder="E.g. 02082223344"  value="<?= $p->telephone_2(); ?>">
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label for="email_1">Email address</label>
	<input type="email" class="form-control input-lg" name="email_1" id="email_1" placeholder="E.g. lionel@GiveUsAclue.com"  value="<?= $p->email_1(); ?>">
</div>