
  <div class="page-header">
    <h1 id="navbar"><?= $contact->get_full_name(); ?></h1>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="well">
        
       <div class="tabbable"><!-- Start of pills -->
          <ul class="nav nav-pills">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#indepth" data-toggle="tab">In-Depth</a></li>
            <li><a href="#notes" data-toggle="tab">Notes</a></li>
            <li><a href="#relationships" data-toggle="tab">Relationships</a></li>
            <li><a href="#optins" data-toggle="tab">Opt-ins</a></li>
          </ul>

          <div class="tab-content">
            
            <div class="tab-pane active" id="overview">
              <br/><p class="lead">Use the blue tabs to see more of <?= $contact->get_name_owned(); ?> information</p>
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
              <br/><p class="lead">All of <?= $contact->get_name_owned(); ?> secrets...</p>
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
              <br/><p class="lead">All the stuff we've said about <?= $contact->get_first_name(); ?>...</p>
                <?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
                  <? foreach ($contact->get_actions($actions, 'note') as $note): ?>
                    <? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_notes.php');?>
                <? endforeach; ?>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                  </div>
                </div>
                <?= form_close(); ?>
            </div>

            <div class="tab-pane" id="relationships">
              <br/><p class="lead">Who does <?= $contact->get_first_name(); ?> know?</p><?= form_open('contacts/edit/' . $contact->id(), 'class="form-horizontal" role="form"'); ?>
                <? foreach ($contact->get_actions($actions, 'relationship') as $note): ?>
                    <? include (APPPATH. 'views/partials/' . $this->config->item('layout_folder') . '/_form_contact_relationships.php');?>
                <? endforeach; ?>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" class="btn btn-success pull-right"><i class="icon-ok"></i> Save Changes</button> 
                  </div>
                </div>
                <?= form_close(); ?>
            </div>

            <div class="tab-pane" id="optins">
              <br/><p class="lead">Manage <?= $contact->get_name_owned(); ?>
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

            <a href="<?php echo site_url('contacts/delete/' . $contact->id()); ?>"><button class="btn btn-danger btn-xs pull-left" onclick="return deletechecked();">Delete <?= $contact->get_first_name()?></button></a>
          </div>
          
        </div><!-- End of pills -->
      </div>
    </div>
    <div class="col-lg-5 col-lg-offset-1">

      <!-- Start of pills -->
      <div class="tabbable">
          <ul class="nav nav-pills">
            <li class="active"><a href="#orders" data-toggle="tab">Orders</a></li>
            <li><a href="#tasks" data-toggle="tab">Tasks</a></li>
            <li><a href="#roles" data-toggle="tab">Roles</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="orders">
              <br><p class="lead">See what <?= $contact->get_first_name(); ?> has been buying</p>
               <? 
                $table_header = array('id', 'action_type', 'action_title');
                $table_style = array('table_open' => '<table class="table table-striped table-bordered table-hover">');
                $this->table->set_heading($table_header);
                $this->table->set_template($table_style);
                echo $this->table->generate($contact->get_actions($actions, 'tweet', $table_header));
              ?>
              <a href="#modal-task" class="btn" >open Task modal</a>
              <a class="btn">open Task modal</a>

                <a class="btn btn-lg btn-primary pull-right" href="#modal-task" data-toggle="modal">Open Modal &raquo;</a>
            </div>
            <div class="tab-pane" id="tasks">
              <br><p class="lead">"Todo's for <?= $contact->get_first_name(); ?></p>
                <? 
                $table_header = array('id', 'action_type', 'action_title');
                $table_style = array('table_open' => '<table class="table table-striped table-bordered table-hover">');
                $this->table->set_heading($table_header);
                $this->table->set_template($table_style);
                echo $this->table->generate($contact->get_actions($actions, 'task', $table_header));
              ?>
            </div>
            <div class="tab-pane" id="roles">
              <br><p class="lead">"Remember when " <?= $contact->get_first_name(); ?> did that thing..?</p>
                <? 
                $table_header = array('id', 'action_type', 'action_title');
                $table_style = array('table_open' => '<table class="table table-striped table-bordered table-hover">');
                $this->table->set_heading($table_header);
                $this->table->set_template($table_style);
                echo $this->table->generate($contact->get_actions($actions, 'role', $table_header));
              ?>
              <a href="#myModal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>
            </div>
          </div>
        </div>
      <!-- End of pills -->
    </div>
  </div>
  <div class="modal " data-toggle="modal" id="modal-task">
    <div class="modal-header">Modal Header</div>
    <div class="modal-body">Modal Body</div>
    <div class="modal-footer">Modal footer<btn></div>
  </div>

  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Modal header</h3>
    </div>
    <div class="modal-body">
      <p>One fine body…</p>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button class="btn btn-primary">Save changes</button>
    </div>
  </div>



  <? dump($contact); ?>
  <? dump($actions); ?>
  <? dump($contact->get_actions($actions, 'note')); ?>
  <? foreach ($contact->get_actions($actions, 'note') as $note)
                    echo '<br>', $note->action_title;