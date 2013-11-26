var editor;  
(function($) {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });

 // editor = new $.fn.dataTable.Editor( {
 //        "ajaxUrl": "/tellenis_clients/campaign-dashboard/public_html/contact_actions/",
 //        "domTable": "#dashboard-table",
 //        "display": 'lightbox'
 //    } );


    /*---------------------- datatables old code ------------------------*/
    // editor = new $.fn.dataTable.Editor( {
    //     "ajaxUrl": "/tellenis_clients/campaign-dashboard/public_html/contact_actions/",
    //     "domTable": "#dashboard-table",
    //     "display": 'lightbox'
    // } );
    // /* Datatable */
    // $('.DataTable').each(function() {
    //     var dataSource = $(this).attr("data-source");
    //     var tableId = $(this).attr("table-id");
    //     var linkClass = $(this).attr("link-class");
    //     var contactId = $(this).attr("contact-id"); 

    //     /* Test to see if we've passed $(this).attr("number-rows") */
    //     if ($(this).attr('sScrollY')) {
    //         var sScrollY = $(this).attr("sScrollY");
    //     } else {
    //         var sScrollY = 200;
    //     }

    //     /* If its modal, then set the link to just # and set the html-source attr */
    //     if ($(this).attr('table-type') === 'modal') {
    //         var htmlSource = $(this).attr('html-source');
    //         //alert(htmlSource);
    //         var datatableoptions = {
    //             "bProcessing": true,
    //             "bServerSide": true,
    //             "sPaginationType": "bootstrap",
    //             "sAjaxSource": dataSource,
    //             "sServerMethod": "POST",
    //             "bProcessing": true,
    //             "bServerSide": true,
    //             "sPaginationType": "bootstrap",
    //             "sAjaxSource": dataSource,
    //             "sServerMethod": "POST",
    //             "bScrollInfinite": true,
    //             "bScrollCollapse": true,
    //             "sScrollY": sScrollY + "px",
    //             "iDisplayLength": 15,
    //             "bDestroy": true,
    //              "aoColumnDefs": [
    //                 {
    //                 "aTargets": ['_all'],
    //                 "sDefaultContent": '<a href="" class="editor_markcomplete"><i class="icon-ok"></i></a>   <a href="" class="editor_remove"><i class="icon-trash "></i></a>',
                    
    //                 "mRender": function (data, type, full) {
    //                     /* return the <a> element */
    //                     //if(data)
    //                     //alert(data);
    //                     return '<a href="#" data-id="'+ full[0] + '" class="edit-record-modal" contact-id="'+ contactId + '"  html-source="' + htmlSource + '">' + data + '</a>';
    //                     }
    //                 }
    //             ],
    //         "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
    //             nRow.className = aData[3]=="1" ? "active" : "disabled_row";
    //                 //$('td', nRow).addClass('class_edit');
    //             return nRow;
    //         }
    //         };
    //     }
    //     else {  /* Otherwise write the full link out and exclude html-source */
    //         var link = $(this).attr('data-link');
    //         var datatableoptions = {
    //             "bProcessing": true,
    //             "bServerSide": true,
    //             "sPaginationType": "bootstrap",
    //             "sAjaxSource": dataSource,
    //             "sServerMethod": "POST",
    //             "bProcessing": true,
    //             "bServerSide": true,
    //             "sPaginationType": "bootstrap",
    //             "sAjaxSource": dataSource,
    //             "sServerMethod": "POST",
    //             "bScrollInfinite": true,
    //             "bScrollCollapse": true,
    //             "sScrollY": sScrollY + "px",
    //             "iDisplayLength": 15,
    //             "bDestroy": true,
    //             "aoColumnDefs": [
    //                 {
    //                 "aTargets": [ '_all' ],
    //                 "mRender": function (data, type, full) {
    //                         if (!link) {
    //                             return data;
    //                         } else {
    //                             return '<a href="' + link + full[0] + '" class="' + linkClass + '" data-id="'+ full[0] + '">' + data + '</a>';
    //                         }
    //                     }
    //                 }
    //             ]
    //         }
    //     };
    //     var dTable = $("#" + tableId ).dataTable(datatableoptions);
    //     $.extend( $.fn.dataTableExt.oStdClasses, {
    //           "sWrapper": "dataTables_wrapper form-inline" /* This is Bootstrap styling? */
    //     } );
    //   });
    /*---------------------- datatables old code ------------------------*/
    
    
    /* Datatables */
    $('.data-table').each(function() {
        /* Set up common vars */
        var Id = $(this).attr("id");
        var contactId = $(this).attr("contact-id"); //Tellenis

        var dropdown = false;
        if ($(this).attr("table-dropdown")) {
            var dropdown = true;
        }
        var options = {
            "iDisplayLength": 5,
            "bDestroy": true,
            "sPaginationType": "bootstrap",
            "bLengthChange": dropdown,
            "aLengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            "aaSorting": []
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
        if ($(this).hasClass('open-modal')) {
            var htmlSource = $(this).attr('html-source');
            // var urlSource  = $(this).attr("url-source");    //tellenis
            var urlSource  = 'xx';
            //var tableId = $(this).attr('table-id');
            //console.log(htmlSource);
            options["aoColumnDefs"] = [
                {
                   "aTargets": [3],
                   "mRender": function (data, type, full) {
                    /* return the <a> element */
                    return '<a href="" class="editor_markcomplete" data-id="'+ full[0] + '" url-source="'+ urlSource + '" ><i class="fa fa-check"></i></a>&nbsp&nbsp&nbsp   <a href="" class="editor_remove" data-id="'+ full[0] + '" url-source="'+ urlSource + '" ><i class="fa fa-trash-o "></i></a>';
                    }
                },
                {
                "aTargets": [ '_all' ],
                // "sDefaultContent": '<a href="" class="editor_markcomplete"><i class="fa fa--ok"></i></a>   <a href="" class="editor_remove"><i class="fa fa--trash "></i></a>',
                "mRender": function (data, type, full) {
                    /* return the <a> element */
                    return '<a href="http://google.com" class="edit-record-modal" data-id="'+ full[0] + '" html-source="' + htmlSource + '">' + data + '</a>';
                    }
                }
            ];

            options["fnRowCallback"] = function( nRow, aData, iDisplayIndex ) {
                nRow.className = aData[3]=="1" ? "completed" : "not_completed";
                    //$('td', nRow).addClass('class_edit');
                return nRow;
            };


        }
        else {
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
        
        if ($(this).attr('data-link')) {
            //Not needed...?
        }
        
        /* Now combine the 2 arrays of options */
        $.extend(true, options, optionsExtra );
console.log(options);
        /* Now apply the datatable */
        $('#' + Id).dataTable( options );

        /* Any post processing? */
        // table.fnSetColumnVis( 0, false );

    });


////////////////////////////////////////////////////////

    /* Datatables */
    //$('.data-table').each(
    // function createDataTable( selector )
    // {
        
    //     var o = {
    //         aoColumnDefs: []
    //     };
    //     var t = $( selector );

    //     if ( t.attr('data-source') ) {
    //         o.sAjaxSource = t.attr('data-source');
    //     }

    //     if ( t.attr('data-render') && t.attr('data-render') === 'complete' ) {
    //         // Could inject a cloned node here if needed?
            
    //         o.aoColumnDefs.push( {
    //             aTargets: -1,
    //             mRender: function ( data, type, row ) {
    //                 return '<a href="#" data-id="'+ row[0] + '" class="edit-record-modal">icons...</a>';
    //             }
    //         } );

    //         // Add class to the row's if completed
    //         o.fnCreatedRow = function ( row, data, idx ) {
    //             if ( data[ data.length - 1 ] == '1' ) {
    //                 $(row).addClass( 'completed' );
    //             }
    //         }
    //     }

    //     return t.dataTable( $.extend( true, o, {
    //         "bProcessing": true,
    //         "sServerMethod": "POST"
    //     } ) );
    // }

// $(document).ready( function () {
//     createDataTable( '#simple' );
//     createDataTable( '#ajax' );
// } );

    $('.data-table1').each(function() {
        var that = $(this);

        //Set up default options
        var dataTableOptions = {
            "iDisplayLength":5,
            "bDestroy":true,
            "sPaginationType":"bootstrap",
            "bLengthChange":true,
            "aLengthMenu":[[5, 10, 25, 50], [5, 10, 25, 50]],
            "aaSorting":[],
            "bProcessing":false,
            "bServerSide":false,
            "sAjaxSource":"",
            "sServerMethod":"",
            "aoColumnDefs":[],
            "fnRowCallback":false
        };

        //Set up the vars for this table
        var attributes = {
            "tableid" : "",
            "linkurl": false,
            "linkclass": "",
            "deleteurl": false,
            "toggleurl": false,
            "htmlsource": "",
            // "serverside": false
        };

        //Iterate over the attributes object and test to see if we've passed a new attribute
        $.each(attributes, function(key, value) {
                if (that.data(key)){
                attributes[key] = that.data(key); //Overwrite with the new value
            }
        });

        // //is it a server-side table?
        // if (attributes[serverside] !== false) {
        //     dataTableOptions.bProcessing = true,
        //     dataTableOptions.bServerSide = true,
        //     dataTableOptions.sAjaxSource = true,
        //     dataTableOptions.sServerMethod = "POST",
        // }

        //Now Iterate over the dataTablesOptions object and test to see if we've passed a new attribute
         $.each(dataTableOptions, function(key, value) {
                var newkey = key.toLowerCase(); //we cannot pass camelCase
                if ( that.data(newkey) ){
                    console.log('found one!', key);
                dataTableOptions[key] = that.data(newkey); //Overwrite with the new value
            }
        });

        //Now set up the aoColumnDefs
        if ( attributes.linkurl ) { //Have we passed attr data-linkurl?
            dataTableOptions.aoColumnDefs = [
                //Do the <a> tag first....
                {
                    "aTargets": ["_all"],
                    "mRender": function (data, type, full) {
                        return '<a href="'+attributes.linkurl+'/'+full[0]+'" class="'+attributes.linkclass+'" data-id="'+full[0]+'" html-source="'+attributes.htmlsource+'">'+data+'</a>';
                    }
                }
            ];

            //Now add the delete icon if passed
            if ( attributes.deleteurl ) {
                //add a new col
                that('tr').each( function () {
                    that.append('<td />');
                });
                //now add the delete
                //Do we need ot add a toggle icon too?
            }
        }
        console.log('datatablesoptins after linkurl= ', dataTableOptions);
        
        //Now apply it all
        $('#' + attributes.tableid).dataTable( dataTableOptions );

    });



////////////////////////////////////////////////////////


/* Control Small Modal */
    $(document).on('click', '.small-modal1', function(e) {
        e.preventDefault();
        var htmlSource = $(this).attr("data-source");
        if($(this).attr('data-id')) {
            htmlSource =  htmlSource+"/"+$(this).attr('data-id'); 
        }
console.log(htmlSource);
        $(".modal-body").html('');
        $("#small-modal").modal('show');
        $.post(htmlSource,
               {id: $(this).attr('data-id')},
               function(html) {
                $(".modal-body").html(html);
               }
        );
    });




/* new: open modal */
    $('.open-modal').click(function(e) {
        e.preventDefault();
        var modalType = $(this).attr('modal-type');
        var dataSource = $(this).attr('data-source');
        var dataId = $(this).attr('data-id');

        //Put loader css class here..
        //..
        //..

        $('#modal-'+modalType).modal('show');

        //if we have a dataSource, the load the view from that url
        if ( dataSource ) {
            $('.modal-body').html('');

            //if we have passed a data id, append it to the end of the url
            if ( dataId ) {
                dataSource = dataSource+'/'+dataId;
            }

            $.post( dataSource,
                function(html) {
                    $('.modal-body').html(html);
                }
            );
        }

    });


    $('form.ajax_form1').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            modalType = that.parent().attr('modal-type'),
            sectionId = that.data('section');
            //Serialise the data to allow for radio/checkboxes
            data = that.serialize();

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                console.log(response);
                if ( response.length < 3 ){//I know - this is horrible. Just want to see if the response is null
                    $('.modal-alert').removeClass('hide');
                }
                else {
                    $('#modal-'+modalType).modal('hide');
                    $('#alert-'+sectionId).removeClass('hide');
                    window.setTimeout(function() {
                        $('#alert-'+sectionId).fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                        });
                    }, 1500);
                }
            }
        });

        return false;
    });






    /* Modal for tasks */
    $(document).on('click', '.edit-record-modal', function(e) {
        e.preventDefault();
        var htmlSource = $(this).attr("html-source");
        if($(this).attr('data-id'))
        htmlSource =  htmlSource+"/"+$(this).attr('data-id');
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



/* Turns all non-modal forms with class 'ajax_form' into ajax powered forms */

/* Note - see ajax.js for the code that controls forms in modal windows */

    $('form.ajax_form').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            sectionId = that.attr("data-section"),
            //Serialise the data to allow for radio/checkboxes
            data = that.serialize();

        // that.find('[name]').each(function(index, value) {
        //     var that = $(this),
        //         name = that.attr('name'),
        //         value = that.val();

        //     data[name] = value;
        // });
     //console.log(data);
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

        // $("#contactaction-modal").modal('hide');
        return false;
    });

//delete record
    $('.data-table').on('click', 'a.editor_remove', function (e) {
                                                        
        e.preventDefault();     
        var confirmDelete=confirm("Are you sure you wish to delete?");
        if (confirmDelete){         
            var dataId = $(this).closest('td').find('a:first').attr('data-id'); 
            var contactId =  'rubbish'; 
            
            var url = '/contact_actions/delete/'+dataId;
            var type = 'delete';
          
              $.ajax({
                url: url,
                type: type,
                data: contactId,
                success: function(response) {
                    //$(".message-" + sectionId).html(response);
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                        });
                    }, 1500);
                }
            });
            var delTr = this;
            $(this).closest('tr').find('td').fadeOut('fast', 
            function(delTr){ 
                $(delTr).parents('tr:first').remove();  
                   // document.getElementById('message-task').style.visibility="visible";
                   // $("#message-task").html("Record deleted!");
            }); 
        }else{ // if false
        return false;
        }

    

    } );

 // $('#contactaction-modal').bind('dialogclose', function(event) {
 //     alert('closed');
 // });

          
    $('.data-table').on('click', 'a.editor_markcomplete', function (e) {                                                     
            e.preventDefault();
            var dataId = $(this).closest('td').find('a:first').attr('data-id'); 
            // var contactId =  $(this).closest('td').find('a:first').attr('contact-id');
            var tableId = $(this).closest('table').attr("id"); 
            var contactId = 'rubbish';

            var url = '/contact_actions/toggle_completed/'+dataId;
            var type = 'markcomplete';
          
              $.ajax({
                url: url,
                type: type,
                data: contactId,
                success: function(response) {
                    console.log(dataId, url, tableId);
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                        });
                    }, 1500);
                    //redraw the table
            // var oTable = $('.data-table #'+tableId).dataTable();
            // cosole.log('otable = '+oTable);
                }
            });

            

        // var status = $(this).closest('tr').children('td:nth-child(4)').text();
        // document.getElementById('message-task').style.visibility="visible";
        // if(status == 0){
        // $("#message-task").html("Record updated as completed!");
        // }
        // else{
        // $("#message-task").html("Record updated as in completed!");
        // }
        // var dTable = $('#dashboard-table').dataTable({ bRetrieve : true });
        // dTable.fnClearTable(); 
        // dTable.fnDraw();

        } );

     // $('#contactaction-modal').bind('dialogclose', function(event) {
     //     alert('closed');
     // });



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


})(jQuery);