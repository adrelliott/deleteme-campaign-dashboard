$(document).ready(function () {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });

    /* Dstatable */
    $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var datatableoptions = {
            "bProcessing": true,
            "bServerSide": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": dataSource,
            "sServerMethod": "POST",
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "200px",
            "iDisplayLength": 5,
            "bDestroy": true,
        };
        $("#" + tableId ).dataTable(datatableoptions);
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );

      });

});