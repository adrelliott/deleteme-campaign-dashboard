/* This file contains the javascript for the app */
    $(document).ready(function() {

      $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var datatableoptions = {
            "bProcessing": true,
            "bServerSide": true,
            "sPaginationType": "bootstrap",
            //"sAjaxSource": 'http://campaigndashboard.dev/ajax/contacts/get/id/first_name/last_name/owner_id',
            "sAjaxSource": dataSource,
            "sServerMethod": "POST",
                      "bScrollInfinite": true,
                      "bScrollCollapse": true,
                      "sScrollY": "400px",
                      "bDestroy": true,
        };
        $("#" + tableId ).dataTable(datatableoptions);
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );

      });

/*      $('#tabs-with-tables .tab a').each(function() {
         var $this = $(this);
    $this.click(function (e) {
        //e.preventDefault();
        var table = $.fn.dataTable.fnTables(true);
if ( table.length > 0 ) {
$(table).dataTable().fnAdjustColumnSizing();
}
});
    });

$(".hidesearch").dataTable({
          "bFilter": false,
          "bInfo": false
        });

  */      

   /*


        //Set up a server_side datatable
        var url = $(".data_table_ajax").attr("data-source");
        var link = $(".data_table_ajax").attr("link");
        $(".data_table_ajax1").dataTable( {
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


    

*/






    } );
	