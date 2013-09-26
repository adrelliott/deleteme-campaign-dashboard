$(document).ready(function () {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });

    /* Datatable */
    $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var linkClass = $(this).attr("link-class");

        /* If its modal, then set the extra fields up */
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
                "sScrollY": "200px",
                "iDisplayLength": 5,
                "bDestroy": true,
                "aoColumnDefs": [
                    {
                    "aTargets": [ '_all' ],
                    "mRender": function (data, type, full) {
                        /* return the <a> element */
                        return '<a href="#" class="edit-record-modal" data-id="'+ full[0] + '" html-source="' + htmlSource + '"">' + data + '</a>';
                        }
                    }
                ]
            };
        }
        else {
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
                "sScrollY": "200px",
                "iDisplayLength": 5,
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
              "sWrapper": "dataTables_wrapper form-inline"
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

        console.log(url);
        console.log(type);
        console.log(sectionId);
        console.log(data);
        
        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                console.log(response);
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


    //jQuery(function($) {
        //$('form[data-async]').on('submit', function(e) {
        /*$(document).on('submit', 'form[data-async]', function(e) {
            e.preventDefault();
            var $form = $(this);
            var $target = $($form.attr('data-target'));
     
            $.ajax({
                type: $form.attr('method'),
                url: $form.attr('action'),
                data: $form.serialize(),
                result: 
     
                /*success: function(response)
                    {
                        alert(response);

                    },
                    error: function()
                    {
                        alert("Failure");
                    }*/
       /*         success: function(data, status) {
                    //$target.html(data);
                    //$target.html(data).modal('show');
                    
                     alert(status);
                }
            });
     
        });*/
   // });

});