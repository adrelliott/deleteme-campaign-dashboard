<div class="row"><!-- Page Row-->
  <div class="col-xs-12"><!-- Containing Column -->

    <div class="row">
      <div class="col-xs-12 hidden-lg hidden-md hidden-sm visible-xs">
        <a href="<?= site_url('leads/create'); ?>" class="btn btn-primary btn-lg pull-right">Create New Lead</a>
      </div>
    </div>

    <div class="row"><!-- Top line -->
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="page-header">
          <h1><i class="fa fa-briefcase"></i> All Your Sales Leads</h1>
            <p class="lead">Just think. If every single one of them spent just £1,000,000 a year with you, you'd be sooo rich...</p> 
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
        <div class="page-header border-none">
          <div class="btn-group pull-right">
            <div class="btn-group btn-block">
              <button type="button" class="btn btn-lg btn-default btn-block2 btn-justified dropdown-toggle " data-toggle="dropdown">
                Extra Actions... <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?= site_url('leads/create'); ?>"><p>Add a New Lead</p></a></li>
                <li class="divider"></li>
                <li><a href="<?= site_url('leads/index/cards'); ?>"><p>View in 'Card Layout'</p></a></li>
              </ul>
            </div>
          </div>  
        </div>
      </div>
    </div><!-- /Top line -->

    <div class="row">
      <div class="col-lg-8 col-md-10">
        <?= $this->messages->show(); ?>   
      </div>
    </div>

    <div class="row"><!-- Main table-->
      <div>
        <table class="table DataTable" table-id="contact-table" id="contact-table" data-source="<?php echo site_url('ajax/contacts/get_table/id/first_name/last_name/owner_id'); ?>" data-link="<?php echo site_url() . 'contacts/show/'; ?>" link-class="test test2" sScrollY="400">
        <thead>
          <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Owner Id</th>
          </tr>
        </thead>
      </table>    
      </div>
    </div> <!-- /Main table-->

    <div class="row">
      <div>
        <a href="<?= site_url('leads/create'); ?>" class="btn btn-primary btn-lg pull-right">Create New Lead</a>
      </div>
    </div>

  </div><!-- /Containing column-->
</div><!-- /Page Row-->