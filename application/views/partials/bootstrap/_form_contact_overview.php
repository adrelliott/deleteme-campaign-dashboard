<div class="form-group">
  <label for="title" class="col-lg-3 control-label">Title</label>
  <div class="col-lg-9">
    <select class="form-control" id="select" name="title">
      <option>Mr</option>
      <option>Mrs</option>
      <option>Miss</option>
      <option>Ms</option>
      <option>Dr</option>
    </select>
  </div>
</div>


<div class="form-group">
  <label for="first_name" class="col-lg-3 control-label">First Name</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="first_name"  value="<?= $contact->first_name(); ?>" name="first_name" placeholder="What does your Ma call you..?">
  </div>
</div>

<div class="form-group">
  <label for="last_name" class="col-lg-3 control-label">Last name</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="last_name"  value="<?= $contact->last_name(); ?>" name="last_name" placeholder="What would a Grammar School teacher call you...?">
  </div>
</div>
//Nickname
//primary email
//Mobile
//landline

<br>
<legend>Address Details</legend>
<div class="form-group">
  <label for="last_name" class="col-lg-4 control-label">Postcode</label>
  <div class="col-lg-8">
    <div class="input-group">
      <input type="text" class="form-control" placeholder"Enter a postcode here & press">
      <span class="input-group-btn">
        <button class="btn btn-success" type="button">Lookup Postcode</button>
      </span>
    </div><!-- /input-group -->
    <span class="help-block">Enter a postcode in the box and press 'Lookup'</span>
  </div>
</div>

<div class="form-group">
  <label for="org_name" class="col-lg-4 control-label">Organisation Name</label>
  <div class="col-lg-8">
    <input type="text" class="form-control" id="org_name"  value="<?= $contact->org_name(); ?>" name="org_name" placeholder="E.g. Dallas Matthews Ltd...">
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-lg-3 control-label">First Name</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="first_name"  value="<?= $contact->first_name(); ?>" name="first_name" placeholder="What does your Ma call you..?">
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-lg-3 control-label">First Name</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="first_name"  value="<?= $contact->first_name(); ?>" name="first_name" placeholder="What does your Ma call you..?">
  </div>
</div>




<div class="form-group">
  <label for="optionsRadio" class="col-lg-3 control-label">Record type: </label>
  <div class="radio-inline">
    <label>
      <input type="radio" name="contact_type" id="optionsRadio1" value="individual" checked="">
      <i class="icon-user"></i> Individual
    </label>
  </div>
  <div class="radio-inline">
    <label>
      <input type="radio" name="contact_type" id="optionsRadio2" value="organisation">
      <i class="icon-truck"></i>  Organisation
    </label>
  </div>
</div>