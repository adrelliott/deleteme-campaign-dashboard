<div class="form-group">
  <label for="optionsRadio" class="col-lg-3 control-label">Record type: </label>
  <div class="radio-inline">
    <label>
      <input type="radio" xxxname="contact_type" id="optionsRadio1" value="individual" checked="">
      <i class="icon-user"></i>
    </label>
  </div>
  <div class="radio-inline">
    <label>
      <input type="radio" xxxname="contact_type" id="optionsRadio2" value="organisation">
      <i class="icon-truck"></i>
    </label>
  </div>
  <div class="offset-3"><p class="help-block ">Example block-level help text here.</p></div>
  

</div>

<div class="form-group">
  <label for="title" class="col-lg-3 control-label">Title</label>
  <div class="col-lg-3">
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
<code>primary email, Mobile</code>
 
<br>
<legend>Address Details</legend>
<div class="form-group">
  <label for="last_name" class="col-lg-3 control-label">Postcode</label>
  <div class="col-lg-4">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="E.g. M1 2JW">
      <span class="input-group-btn">
        <button class="btn btn-success" type="button"><i class="icon-search "></i></button>
      </span>
    </div><!-- /input-group -->
  </div>
</div>

<div class="form-group">
  <label for="org_name" class="col-lg-3 control-label">Organisation Name</label>
  <div class="col-lg-8">
    <input type="text" class="form-control" id="org_name"  value="<?= $contact->org_name(); ?>" xxxname="org_name" placeholder="E.g. Dallas Matthews Ltd...">
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-lg-3 control-label">Street Name</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="first_name"  value="<?= $contact->first_name(); ?>" xxxname="first_name" placeholder="What does your Ma call you..?">
  </div>
</div>

<div class="form-group">
  <label for="first_name" class="col-lg-3 control-label">Locality</label>
  <div class="col-lg-9">
    <input type="text" class="form-control" id="first_name"  value="<?= $contact->first_name(); ?>" xxxname="first_name" placeholder="What does your Ma call you..?">
  </div>
</div>

<div class="form-group">
  <label class="col-lg-3 control-label ">City & County:</label>
  <div class="col-lg-9">
    <div class="form-inline">
      <div class="form-group ">
        <div class="col-lg-12">
          <label class="sr-only" for="city">City</label> 
          <input type="text" id="city" name="city" class="form-control " placeholder="E.g. Manchester" >
        </div>
      </div> 
      <div class="form-group ">
        <div class="col-lg-12">
          <label class="sr-only" for="county">County</label> 
          <input type="text" id="county" name="county" class="form-control " placeholder="E.g. Lancashire" >
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-lg-3 control-label ">Record Type</label>
  <div class="col-lg-9">
    <div class="radio-inline">
      <div class="form-group ">
        <div class="col-lg-12">
          <label class="sr-only" for="city">City</label> 
          <input type="radio" xxxname="contact_type" id="optionsRadio1" value="individual" checked="">
      <i class="icon-user"></i> <span class="hidden-xs"></span>
        </div>
      </div> 
      <div class="form-group ">
        <div class="col-lg-12">
          <label class="sr-only" for="county">County</label> 
          <input type="radio" xxxname="contact_type" id="optionsRadio1" value="individual" checked="">
      <i class="icon-user"></i> <span class="hidden-xs"></span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="form-group">

        <div class="col-lg-12">
          <label for="optionsRadio" class="col-lg-3 control-label">Record type: </label>
  <div class="radio-inline">
    <label>
      <input type="radio" xxxname="contact_type" id="optionsRadio1" value="individual" checked="">
      <i class="icon-user"></i> <span class="hidden-xs">Individual</span>
    </label>
  </div>
        </div>

     <div class="col-lg-12">

      <div class="radio-inline">
        <label>
          <input type="radio" xxxname="contact_type" id="optionsRadio2" value="organisation">
          <i class="icon-truck"></i> <span class="hidden-xs">Organisation</span>
        </label>
      </div>
    </div<
</div>