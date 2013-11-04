$(document).ready(function () {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });
    
    
    /* Datatables */
    $('.data-table').each(function() {
        var tableId = $(this).attr("table-id");

        if ($(this).attr("table-dropdown")) {
            var dropdown = true;
        }
        else {
            var dropdown = false;
        }

        var options = {
            "iDisplayLength": 5,
            "bDestroy": true,
            "sPaginationType": "bootstrap",
            "bLengthChange": dropdown,
            "aLengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]]
        };
        var optionsExtra = [];

        /* is it a serverside?*/
        if ($(this).hasClass('server-side')) {
            var dataSource = $(this).attr("data-source");
            var optionsExtra = {
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": dataSource,
                "sServerMethod": "POST"
            };
        } 

        /* Generate the links... */
        if ($(this).attr('html-source')) {
            var htmlSource = $(this).attr('html-source');
            //console.log(htmlSource);
            options["aoColumnDefs"] = [
                {
                "aTargets": [ '_all' ],
                "mRender": function (data, type, full) {
                    /* return the <a> element */
                    return '<a href="#" class="edit-record-modal" data-id="'+ full[0] + '" html-source="' + htmlSource + '">' + data + '</a>';
                    }
                }
            ];

        }
        if ($(this).attr('data-link')) {

            var link = $(this).attr('data-link');
            var linkClass = $(this).attr("link-class");
            //var htmlSource = $(this).attr('html-source');
            //console.log(htmlSource);
            options["aoColumnDefs"] = [
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
            ];

        }

            
        
        /* Now combine the 2 arrays of options */
        $.extend(true, options, optionsExtra );

        /* Now apply the datatable */
        $('#' + tableId).dataTable( options );
        

    });


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
                    "aTargets": [ '_all' ],
                    "mRender": function (data, type, full) {
                        /* return the <a> element */
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




    /* Make sure the first pill in each pills nav & tab-pane is active */
    $("ul.nav.nav-pills").each(function() {
        $(this).find('li').first().addClass('active');
    });
    $("div.tab-content").each(function() {
        $(this).find('div.tab-pane').first().addClass('active');
    });

    /* Turn cards into clickable divs */
    $("card").click(function(){
        window.location=$(this).find("a").attr("href");
        return false;
    });


});