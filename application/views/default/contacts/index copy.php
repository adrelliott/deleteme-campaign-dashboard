<?php $contacts = new Contact_Presenter($contacts); ?>
<?php 
  $headings = array('id' => 'Id', 'first_name' => 'First Name', 'last_name' => 'Last name', 'email' => 'Email Address');
  $this->table->set_heading(array_values($headings));
  $tmpl = array (
        'table_open'          => '<table class="table table-bordered table-striped"  >',

        'heading_row_start'   => '<tr>',
        'heading_row_end'     => '</tr>',
        'heading_cell_start'  => '<th>',
        'heading_cell_end'    => '</th>',
        'tbody_open'      => '<tbody data-provides="">',
        'tbody_close'     => '</tbody>',

        'row_start'           => '<tr class="">',
        'row_end'             => '</tr>',
        'cell_start'          => '<td>',
        'cell_end'            => '</td>',

        'row_alt_start'       => '<tr class=" a">',
        'row_alt_end'         => '</tr>',
        'cell_alt_start'      => '<td>',
        'cell_alt_end'        => '</td>',

        'table_close'         => '</table>'
  );
$this->table->set_template($tmpl);

foreach ($contacts->contact as $count => $row)
{
  $output = array();
  foreach (array_keys($headings) as $header)
  {
     $output[] = anchor('contacts/show/' . $row->id, $row->$header, 'class="" title="View ' . $row->first_name . '\'s Record"');
     //$output[] = $row->$header;
  }
  //$output[] = anchor('contacts/show/' . $row->id, 'View');
  $table_row[$count] = array_values($output);
}

?>
<div class="container">
    <div class="row">
    <div class="col-md-12">
      <h2>Your Contacts</h2>
      <?php echo message($this->session->flashdata('message'), 'success');?>
      <div class="">
        <p><?php echo $pagination['pagination_text']; ?></p>
        <div class="table-responsive">
          <?php echo $this->table->generate($table_row); ?>
          <?php echo $pagination['pagination_links']; ?>
        </div>
      </div>

      <p><a class="btn btn-lg btn-primary pull-right padding-right-10" href="#">Create a new contact &raquo;</a></p>
    </div>
  </div>
</div>