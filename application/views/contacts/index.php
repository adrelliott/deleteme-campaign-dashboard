<?php 
    $contacts = new Contact_Presenter($contacts); 
    //$table = generate_ajax_datatable(array('first_name' => 'First Name', 'last_name' => 'Last Name', 'owner_id' => 'Owner Id'), 'contacts', 'table-striped table-bordered');
?>
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2>Your Contacts</h2>
        <?php echo message($this->session->flashdata('message'), 'success');?>
        <div class="table-responsive">
            <?php //echo $table['html']; ?>
            <table class="table data_table_ajax" data-source="<?php echo site_url('ajax/contacts/get/id/first_name/last_name/owner_id'); ?>" link="contacts/show/">
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
  </div>
</div>
<?php //echo $table['js']; ?>

