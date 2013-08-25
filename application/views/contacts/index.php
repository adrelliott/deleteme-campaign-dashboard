<?php $contacts = new Contact_Presenter($contacts); ?>
<?php 
  $headings = array('id' => 'Id', 'first_name' => 'First Name', 'last_name' => 'Last name', 'email' => 'Email Address');
  $this->table->set_heading(array_values($headings));
  $this->table->set_template(array('table_open' => '<table class="table table-striped table-bordered" id="example">'));
?>
<div class="container">
    <div class="row">
    <div class="col-md-12">
      <h2>Your Contacts</h2>
      <?php echo message($this->session->flashdata('message'), 'success');?>
      <div class="">
        <p><?php echo $pagination['pagination_text']; ?></p>
        <div class="table-responsive">
          <?php echo $this->table->generate(); ?>
          <?php echo $pagination['pagination_links']; ?>
        </div>
      </div>

      <p><a class="btn btn-lg btn-primary pull-right padding-right-10" href="#">Create a new contact &raquo;</a></p>
    </div>
  </div>
</div>

<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#example').dataTable( {
          "bProcessing": true,
          "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('contacts/get_by_ajax/id/first_name/last_name/owner_id'); ?>",
          "sServerMethod": "POST"
        } );
        $.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
} );
      } );
    </script>