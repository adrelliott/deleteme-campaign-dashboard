var editor;  
$(document).ready(function () {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": "",
        "domTable": "#dashboard-table",
        "display": 'lightbox'
    } );
    /* Datatable */
    $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var linkClass = $(this).attr("link-class");

        /* Test to see if we've passed $(this).attr("number-rows") */
        if ($(this).attr('sScrollY')) {
            var sScrollY = $(this).attr("sScrollY");
        } else {
            var sScrollY = 200;
        }

        /* If its modal, then set the link to just # and set the html-source attr */
        if ($(this).attr('table-type') === 'modal') {
            var htmlSource = $(this).attr('html-source');
            var datatableoptions = {
                "bProcessing": true,
                "bServerSide": true,
                "sPaginationType": "bootstrap",
                "sAjaxSource": dataSource,
                "sServerMethod": "POST",
                "bProcessing": true,
                "bServerSide": true,
                "sPaginationType": "bootstrap",
                "sAjaxSource": dataSource,
                "sServerMethod": "POST",
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "sScrollY": sScrollY + "px",
                "iDisplayLength": 15,
                "bDestroy": true,
				 "aoColumnDefs": [
                    {
                    "aTargets": ['_all'],
                    "sDefaultContent": '<a href="" class="editor_edit"><i class="icon-ok"></i></a>  <a href="" class="editor_remove"><i class="icon-trash "></i></a>',
					
                    "mRender": function (data, type, full) {
                        /* return the <a> element */
						//if(data)
                        return '<a href="#" class="edit-record-modal" data-id="'+ full[0] + '" html-source="' + htmlSource + '">' + data + '</a>';
                        }
                    }
                ]
            };
        }
        else {  /* Otherwise write the full link out and exclude html-source */
            var link = $(this).attr('data-link');
            var datatableoptions = {
                "bProcessing": true,
                "bServerSide": true,
                "sPaginationType": "bootstrap",
                "sAjaxSource": dataSource,
                "sServerMethod": "POST",
                "bProcessing": true,
                "bServerSide": true,
                "sPaginationType": "bootstrap",
                "sAjaxSource": dataSource,
                "sServerMethod": "POST",
                "bScrollInfinite": true,
                "bScrollCollapse": true,
                "sScrollY": sScrollY + "px",
                "iDisplayLength": 15,
                "bDestroy": true,
                "aoColumnDefs": [
                    {
                    "aTargets": [ '_all' ],
                    "mRender": function (data, type, full) {
                            if (!link) {
                                return data;
                            } else {
                                return '<a href="' + link + full[0] + '" class="' + linkClass + '" data-id="'+ full[0] + '">' + data + '</a>';
                            }
                        }
                    }
                ]
            }
        };
        var dTable = $("#" + tableId ).dataTable(datatableoptions);
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline" /* This is Bootstrap styling? */
        } );
      });

    /* Modal for tasks */
    $(document).on('click', '.edit-record-modal', function(e) {
        e.preventDefault();
        var htmlSource = $(this).attr("html-source");
        //var existingHtml = $(".modal-body").html();

        $(".modal-body").html('');
        $("#contactaction-modal").modal('show');
        $.post(htmlSource,
               {id: $(this).attr('data-id')},
               function(html) {
                $(".modal-body").html(html);
               }
        );
    });



/* Turns all forms with class 'ajax' into ajax powered forms */
    $('form.ajax').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            sectionId = that.attr("data-section"),
            data = {};

        that.find('[name]').each(function(index, value) {
            var that = $(this),
                name = that.attr('name'),
                value = that.val();

            data[name] = value;
        });

        /*console.log(url);
        console.log(type);
        console.log(sectionId);
        console.log(data);*/
        
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                //console.log(response);
                $(".message-" + sectionId).html(response);
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 1500);
            }
        });

        return false;
    });
// delete confirmation
$('.DataTable').on('click', 'a.editor_remove', function (e) {
														
        e.preventDefault();
 
        editor.message( "Are you sure you wish to delete this row?" );
        editor.remove(
            $(this).parents('tr')[0],
            'Delete Row',
            { "label": "Delete", "fn": function () { editor.submit() } }
        );
    } );

});