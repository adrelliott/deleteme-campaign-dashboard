<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
  

    /**
     * Create the headers for the table
     */
function generate_datatable($cols, $table, $table_class = '')
    {
      
      $output = array();

      //generate the table HTML
      $output['html'] = '<table class="table data_table ' . $table_class . '">';
      $output['html'] .= '<thead><tr>';

      foreach ($cols as $col)
      {
          $output['html'] .= '<th>' . $col . '</th>';
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
              } );
            </script>';

      //Outputs the HTML for table, headers and sdds the classes
      return $output;
    }
