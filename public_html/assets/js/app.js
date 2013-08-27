/* This file contains the javascript for the app */
    $(document).ready(function() {
        

        //Set up a server_side datatable
        var url = $(".data_table_ajax").attr("data-source");
        var link = $(".data_table_ajax").attr("link");
        $(".data_table_ajax").dataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "sPaginationType": "bootstrap",
          //"sAjaxSource": 'http://campaigndashboard.dev/contacts/get_by_ajax/id/first_name/last_name/owner_id',
          "sAjaxSource": url,
          "sServerMethod": "POST",
          "bScrollInfinite": true,
          "bScrollCollapse": true,
          "sScrollY": "400px",
          "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $('td:eq(0)', nRow).html('<a href="' + link + aData[0] + '">' +
                aData[0] + '</a>');
            return nRow;
          },
        } );
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );


        //Set up a normal datatable
        $('.data_table').dataTable();

        //Rowlink
        //$('table.rowlink').rowlink();

        $(".data_table tbody tr td").on('click',function() {
            var id = $(this).attr('id');
            document.location.href = "?PostID=" + id;
        });


    








    } );
	