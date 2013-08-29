<form role="form">
  <p>OK. So does <?php echo $contact->first_name(); ?> want us to send...</p>
  <div class="form-group">
    <label for="optionsRadio" class="col-lg-3 control-label">..emails?</label>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_email" id="optin_email" value="1" checked="">
        <i class="icon-thumbs-up-alt"></i> Hell yeah!
      </label>
    </div>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_email" id="optionsRadio2" value="0">
        <i class="icon-thumbs-down-alt"></i>  No way...
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="optionsRadio" class="col-lg-3 control-label">..letters?</label>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_letter" id="optionsRadio1" value="1" checked="">
        <i class="icon-thumbs-up-alt"></i> Hell yeah!
      </label>
    </div>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_letter" id="optionsRadio2" value="0">
        <i class="icon-thumbs-down-alt"></i>  No way...
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="optionsRadio" class="col-lg-3 control-label">..texts?</label>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_sms" id="optionsRadio1" value="1" checked="">
        <i class="icon-thumbs-up-alt"></i> Hell yeah!
      </label>
    </div>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_sms" id="optionsRadio2" value="0">
        <i class="icon-thumbs-down-alt"></i>  No way...
      </label>
    </div>
  </div>

  <div class="form-group">
    <label for="optionsRadio" class="col-lg-3 control-label">..merchandise emails?</label>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_newsletter" id="optionsRadio1" value="1" checked="">
        <i class="icon-thumbs-up-alt"></i> Hell yeah!
      </label>
    </div>
    <div class="radio-inline">
      <label>
        <input type="radio" name="optin_newsletter" id="optionsRadio2" value="0">
        <i class="icon-thumbs-down-alt"></i>  No way...
      </label>
    </div>
  </div>
  