
  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h1 id="tables"><i class="icon-user"></i> All Your People</h1>
        <p class="lead">Just <em>look</em> at them - sitting there all shiny and proud... (And the best bit? They're all yours!)</p>
      </div>

      <table class="table DataTable" table-id="dashboard-table" id="dashboard-table" data-source="<?php echo site_url('ajax/contacts/get/id/first_name/last_name/owner_id'); ?>" link="contacts/show/">
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
  </div>
