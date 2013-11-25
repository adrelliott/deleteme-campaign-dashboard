<code>Drop downof roles 9from config</code>
<code>notes as text area</code>
<code>season (as dropdown from config)</code>
<code>start date</code>
<code>end date</code>
<code>submit</code>



<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="action_description">Write your note</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="Write your note here" rows="6"><?//= $contact_action->action_description(); ?></textarea>
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="last_name">Last name</label>
	<input type="text" class="form-control input-lg" name="last_name" id="last_name" placeholder="E.g. Blair"  value="<?//= $contact->last_name(); ?>">
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="telephone_1">Mobile Number</label>
	<input type="text" class="form-control input-lg" name="telephone_1" id="telephone_1" placeholder="E.g. 07976234234"  value="<?//= $contact->telephone_1(); ?>">
</div>

<div class="form-group col-lg-6 col-md-12 col-sm-12  col-xs-12">
	<label class="" for="telephone_2">Landline Number</label>
	<input type="text" class="form-control input-lg" name="telephone_2" id="telephone_2" placeholder="E.g. 02082223344"  value="<?//= $contact->telephone_2(); ?>">
</div>

<div class="form-group col-lg-12 col-md-12 col-sm-12  col-xs-12">
	<label for="email">Email address</label>
	<input type="email" class="form-control input-lg" name="email" id="email" placeholder="E.g. lionel@GiveUsAclue.com"  value="<?//= $contact->email(); ?>">
</div>


<div class="form-group">
	<label for="action_description">Note</label>
	<textarea class="form-control" id="action_description" name="action_description" placeholder="Write your note here" rows="6"><?//= $contact_action->action_description(); ?></textarea>
</div>