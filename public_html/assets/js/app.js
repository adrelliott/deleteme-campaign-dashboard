/* This file contains the javascript for the app */
    $(document).ready(function() {
        

        //Set up a server_side datatable
        var url = $(".data_table_ajax").attr("data-source");
        $(".data_table_ajax").dataTable( {
          "bProcessing": true,
          "bServerSide": true,
          //"sAjaxSource": 'http://campaigndashboard.dev/contacts/get_by_ajax/id/first_name/last_name/owner_id',
          "sAjaxSource": url,
          "sServerMethod": "POST"
        } );
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );


        //Set up a normal datatable
        $('.data_table').dataTable();

       


    








    } );
	