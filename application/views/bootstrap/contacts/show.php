<? $contact = new Contact_Presenter($contact);?>
<div class="page-header">
  <h1 id="navbar">Let me tell you a story about <?= $contact->full_name(); ?>...</h1>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="well">
      <!-- Start of pills -->
     <div class="tabbable">
        <ul class="nav nav-pills">
          <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
          <li><a href="#indepth" data-toggle="tab">In-Depth</a></li>
          <li><a href="#notes" data-toggle="tab">Notes</a></li>
          <li><a href="#relationships" data-toggle="tab">Relationships</a></li>
          <li><a href="#optins" data-toggle="tab">Opt-ins</a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="overview">
            <br/><p class="lead">Use the blue tabs to see more of <?= $contact->name_owned(); ?> information</p>
              <?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
              <?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_overview.php'); ?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                </div>
              </div>
              <?= form_close(); ?>
          </div>
          <div class="tab-pane" id="indepth">
            <br/><p class="lead">All of <?= $contact->name_owned(); ?> secrets...</p>
              <?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
              <?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_indepth.php'); ?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                </div>
              </div>
              <?= form_close(); ?>
          </div>
          <div class="tab-pane" id="notes">
            <br/><p class="lead">All the stuff we've said about <?= $contact->first_name(); ?>...</p>
              <?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
              <?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_notes.php'); ?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                </div>
              </div>
              <?= form_close(); ?>
          </div>
          <div class="tab-pane" id="relationships">
            <br/><p class="lead">Who does <?= $contact->first_name(); ?> know?</p><?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
              <?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_relationships.php'); ?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                </div>
              </div>
              <?= form_close(); ?>
          </div>
          <div class="tab-pane" id="optins">
            <br/><p class="lead">Manage <?= $contact->name_owned(); ?>
             communication preferences...</p>
              <?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
              <?php include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_optin.php'); ?>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                </div>
              </div>
              <?= form_close(); ?>
          </div>
        </div>
        <!-- End of pills -->
      </div>
    </div>
  </div>
  <div class="col-lg-4 col-lg-offset-1">

    <form class="" role="form">
      <div class="form-group">
        <label class="control-label" for="focusedInput">Focused input</label>
        <input class="form-control" id="focusedInput" type="text" value="This is focused...">
      </div>
      <div class="form-group">
        <label class="control-label" for="disabledInput">Disabled input</label>
        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
      </div>
      <div class="form-group has-warning">
        <label class="control-label" for="inputWarning">Input warning</label>
        <input type="text" class="form-control" id="inputWarning">
      </div>
      <div class="form-group has-error">
        <label class="control-label" for="inputError">Input error</label>
        <input type="text" class="form-control" id="inputError">
      </div>
      <div class="form-group has-success">
        <label class="control-label" for="inputSuccess">Input success</label>
        <input type="text" class="form-control" id="inputSuccess">
      </div>
      <div class="form-group">
        <label class="control-label" for="inputLarge">Large input</label>
        <input class="form-control input-lg" type="text" id="inputLarge">
      </div>
      <div class="form-group">
        <label class="control-label" for="inputDefault">Default input</label>
        <input type="text" class="form-control" id="inputDefault">
      </div>
      <div class="form-group">
        <label class="control-label" for="inputSmall">Small input</label>
        <input class="form-control input-sm" type="text" id="inputSmall">
      </div>
      <div class="form-group">
        <label class="control-label">Input addons</label>
        <div class="input-group">
          <span class="input-group-addon">$</span>
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Button</button>
          </span>
        </div>
      </div>
    </form>

  </div>
</div>