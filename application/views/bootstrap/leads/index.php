
  <div class="row">

      <div class="page-header">
        <h1 id="tables"><i class="icon-user"></i> All Your Sales Leads</h1>
        <p class="lead">Just think. If every single one of them spent just £1,000,000 a year with you, you'd be sooo rich...</p>
      </div>
            <div class="clearfix">
        <a href="<?= site_url('leads/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Lead</button></a>
      </div>
      
      <?= $this->messages->show(); ?>
<code>This table is to be replaced with records from the 'lead' table</code>
      <table class="table DataTable" table-id="lead-table" id="lead-table" data-source="<?php echo site_url('ajax/contacts/get_table/id/first_name/last_name/owner_id/created_at'); ?>" data-link="<?php echo site_url() . 'leads/show/'; ?>" link-class="test test2" sScrollY="500">
        <thead>
          <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Company</th>
            <th>Lead title</th>
          </tr>
        </thead>
      </table>

      <div class="clearfix">
        <a href="<?= site_url('leads/create'); ?>"><button type="button" class="btn btn-primary btn-lg pull-right">Create New Lead</button></a>
      </div>

  </div>
