$(document).ready(function () {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });

    /* Dstatable */
    $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var link = $(this).attr('data-link');
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
            "aoColumnDefs": [
               {
                    "aTargets": [ '_all' ],
                    //"mData": null,
                    "mRender": function (data, type, full) {                        return '<a href="'+ link + full[0] +'">' + data + '</a>';
                    }
                }
             ]
        };
        var dTable = $("#" + tableId ).dataTable(datatableoptions);
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );



      });

});