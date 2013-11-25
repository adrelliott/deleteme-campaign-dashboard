  <div class="page-header">
    <h1 id="navbar">Lead for<? //= $lead->get_full_name(); ?></h1>
</div>

<div class="row">
    <div class="col-lg-6">
      <div class="well">

         <div class="tabbable"><!-- Start of pills -->
            <ul class="nav nav-pills">
              <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
              <li><a href="#indepth" data-toggle="tab">In-Depth</a></li>
              <li><a href="#notes" data-toggle="tab">Notes</a></li>
          </ul>

          <div class="tab-content">

              <div class="tab-pane active" id="overview">
                <br/><p class="lead">More of XXXX data under each blue tab</p>
                <div class="message-contact">
                  <?= $this->messages->show(); ?>
              </div>
<?= form_open('contacts/edit/', 'class="form-horizontal ajax" data-section="contact" role="form"'); ?>
              
                  <fieldset>

                      <!-- Form Name -->
                      <legend>Form Name</legend>

                      <!-- Text input-->
                      <div class="control-group">
                        <label class="control-label" for="lead_name">Short Description</label>
                        <div class="controls">
                          <input id="lead_name" name="lead_name" type="text" placeholder="E.g. Interested in buying Cheese" class="input-xlarge">
                          <p class="help-block">Pssst. Keep it short - There is a box elsewhere for long descriptions</p>
                      </div>
                  </div>

                  <!-- Select Basic -->
                  <div class="control-group">
                    <label class="control-label" for="stage">What stage is it at?</label>
                    <div class="controls">
                      <select id="stage" name="stage" class="input-xlarge">
                        <option>Potential</option>
                        <option>Lead</option>
                        <option>Prospect</option>
                        <option>Won</option>
                        <option>Snoozing</option>
                        <option>Not Interested</option>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="control-group">
                <label class="control-label" for="user_id">Who owns this lead?</label>
                <div class="controls">
                  <select id="user_id" name="user_id" class="input-xlarge">
                    <option>Robbie</option>
                    <option>Mark</option>
                    <option>Jason</option>
                    <option>Gary</option>
                    <option>Howard</option>
                </select>
            </div>
        </div>

    </fieldset>
</form>

<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
</div>
</div>
<div class="message-contact"></div>
</div>

<div class="tab-pane" id="indepth">
    <br/><p class="lead">All of <?//= $contact->get_name_owned(); ?> secrets...</p>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
    </div>
</div>
<div class="message-contact clearfix"></div>
</div>



<div class="tab-pane" id="notes">
    <br/><p class="lead">All the stuff we've said about <?//= $contact->get_first_name(); ?>...</p>
    <table class="table DataTable" table-id="note-table" id="note-table" data-source="<?php //echo site_url('ajax/contact_actions/get_table/id/created_at/action_description?action_type=note&contact_id=' . $contact->id()); ?>"  table-type="">
      <thead>
        <tr>
          <th>Id</th>
          <th>Creation Date</th>
          <th>Note</th>
      </tr>
  </thead>
</table>
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="" class="btn btn-success pull-right"><i class="icon-ok"></i> Add New Note</button> 
</div>
</div>
</div>

<a href="<?php //echo site_url('leads/delete/' . $contact->id()); ?>">
    <button class="btn btn-danger btn-xs pull-left" onclick="return deletechecked();">Delete This Lead</button>
</a>
</div>

</div><!-- End of pills -->
</div>
</div>
<div class="col-lg-5 col-lg-offset-1">

    <!-- Start of pills -->
    <div class="tabbable">
      <ul class="nav nav-pills">
        <li class="active"><a href="#tasks" data-toggle="tab">Tasks</a></li>
        <li><a href="#files" data-toggle="tab">Files</a></li>
        <li><a href="#tags" data-toggle="tab">Tags</a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane active" id="tasks">
          <br><p class="lead">"Todo's for <?//= $contact->get_first_name(); ?></p>
          <table class="table StandardDataTable" table-id="tag-table" id="tag-table">
            <? 
              //Set up the table...
            $cols = array('Id' => 'id', 'Action Type' => 'action_type', 'Action Title' => 'action_title', 'Completed' => 'completed');
            $attr = array('data-target' => '#contactaction-modal', 'html-source' => site_url('contact_actions/show'), 'data-toggle' => 'modal', 'class' => "edit-record-modal");
              //$delete = '<a href="' . site_url('contact_actions/delete/record_id/' . $contact->id()) . '" data-toggle="tooltip" title="Delete this record"><i class="icon-trash "></i></a>';
              //$completed = '<a href="' . site_url('contact_actions/toggle_completed/record_id/' . $contact->id()) . '" data-toggle="tooltip" title="Mark as Completed"><i class="icon-ok "></i></a>';

              //Output header...
              //echo $contact->table_header($cols, array(''));

              //Output body...
              //echo $contact->table_body($contact->get_contact_actions('task'), $cols, '#', $attr, $delete, $completed);
            ?>
        </table>
        <a class="btn btn-primary pull-right edit-record-modal" href="#" html-source="<?php //echo site_url('contact_actions/create/task/' . $contact->id() ); ?>" >Create New Task &raquo;</a>
    </div>

    <div class="tab-pane" id="files">
      <br><p class="lead">"files " <?//= $contact->get_first_name(); ?> did that thing..?</p>
  </div>

  <div class="tab-pane" id="tags">
      <br><p class="lead">"Tags's for <? //= $contact->get_first_name(); ?></p>

      <table class="table" table-id="tag-table" id="tag-table">
        <? 
              //Set up the table...
        $cols = array('id' => 'Id', 'action_type' => 'Action type', 'action_title' => 'Action titttle');
        $attr = array('data-target' => '#contactaction-modal', 'html-source' => site_url('contact_actions/show/tag/'), 'data-toggle' => 'modal');
        $extra_cols = array('<a href="del" data-toggle="tooltip" title="Delete this record"><i class="icon-trash "></i></a>');

              //Output header...
              //echo $contact->table_header($cols, array(''));
              //Output body...
              //echo $contact->table_body($contact->get_contact_actions('note'), $cols, '#', $attr, $extra_cols);
        ?>
    </table>
    <a class="btn btn-primary pull-right" data-target="#contactaction-modal" href="" data-toggle="modal">Create New Tag &raquo;</a>
</div>

</div>
</div>
<!-- End of pills -->
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="contactaction-modal" tabindex="-1" role="dialog" aria-labelledby="contactaction-modal-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Action for <?//= $contact->get_first_name(); ?></h4>
    </div>

    <div class="modal-body">
        <!-- The rest fo the form is added in modal window -->
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<? //dump($contact); ?>