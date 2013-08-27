<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
  

    /**
     * Create the headers for the table
     *
     * $cols = array( 'col_name' => 'Label for Column', etc)
     */
function generate_ajax_datatable($cols, $table, $table_class = '')
    {
      
      $output = array();

      //generate the table HTML
      $output['html'] = '<table class="table data_table ' . $table_class . '">';
      $output['html'] .= '<thead><tr>';

      //Make sure that the id column has been passed  
      if (array_key_exists('id', $cols) === FALSE)
      {
          $output['html'] .= '<th>Id</th>'; //Yep, there's probably a nicer way to do this!
          $output['url'][] = 'id';
      }

      //Now do the rest
      foreach ($cols as $col => $label)
      {
          $output['html'] .= '<th>' . $label . '</th>';
          $output['url'][] = $col;
      }
      $output['html'] .= '</tr></thead>';

      //Create a 'loading data' notice
      $output['html'] .= '<tbody><tr><td colspan="5" class="dataTables_empty">Loading data from server</td></tr></tbody>';
      $output['html'] .= '</table>';

      //Now create javascript required to run this
      $output['url'] = implode('/', $output['url']);
      $url_for_ajax = site_url($table . '/get_by_ajax/' . $output['url']);
      $output['js'] = '<link href="' . site_url('assets/css/datatables_table.css') . '" rel="stylesheet">';
      $output['js'] .= '<script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
                $(".data_table").dataTable( {
                  "bProcessing": true,
                  "bServerSide": true,
                  "sAjaxSource": "' . $url_for_ajax . '",
                  "sServerMethod": "POST"
                } );
                $.extend( $.fn.dataTableExt.oStdClasses, {
                      "sWrapper": "dataTables_wrapper form-inline"
                } );
               $(".data_table tbody tr").click(function () {
                  var position = table.fnGetPosition(this); //get position of the selected row
                  var id = table.fnGetData(position)[0];    //value of the first column (can be hidden)
                  document.location.href = "?q=node/6?id=" + id;   //redirect
                });
            } );
            </script>';

      //Outputs the HTML for table, headers and sdds the classes
      return $output;
    }

    function generate_datatable()
    {
        //What are the cols?
        
        //where's the data from?
        //
        //output the html table
        //
        //output the JS

    }
