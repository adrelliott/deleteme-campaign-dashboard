<?php //$table = generate_ajax_datatable(array('first_name' => 'First Name', 'last_name' => 'Last Name'), 'contacts', 'table-striped table-bordered'); ?>
<div class="container">

   <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
      <h1>Hi Al!</h1>
      <p>While you've been out eating cake and pretending you're a busy person, I've been hard at work.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar">See what I've done &raquo;</a>
      </p>
    </div>

  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-8">
      <h2>Your Contacts</h2>
      
        <div class="table-responsive">
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
      <p><a class="btn btn-lg btn-primary pull-right padding-right-10" href="#">Create a new contact &raquo;</a></p>
    </div>
    <div class="col-md-4">
      <h2>Quick Actions</h2>
      <code>Buttons go here</code>
   </div>
  </div>
</div> <!-- /container -->