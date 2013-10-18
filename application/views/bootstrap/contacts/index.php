
  <div class="row">

      <div class="page-header">
        <h1 id="tables"><i class="icon-user"></i> All Your People</h1>
        <p class="lead">Just <em>look</em> at them - sitting there all shiny and proud... (And the best bit? They're all yours!)</p>
      </div>
            <div class="clearfix">
        <a href="<?= site_url('contacts/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Contact</button></a>
      </div>
      
      <?= $this->messages->show(); ?>

      <table class="table DataTable" table-id="contact-table" id="contact-table" data-source="<?php echo site_url('ajax/contacts/get_table/id/first_name/last_name/owner_id'); ?>" data-link="<?php echo site_url() . 'contacts/show/'; ?>" link-class="test test2" sScrollY="500">
        <thead>
          <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Owner Id</th>
          </tr>
        </thead>
      </table>

      <div class="clearfix">
        <a href="<?= site_url('contacts/create'); ?>"><button type="button" class="btn btn-primary pull-right">Create New Contact</button></a>
      </div>

  </div>
