var editor;  
(function($) {
        
    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy"
    });
    
    editor = new $.fn.dataTable.Editor( {
        "ajaxUrl": "/tellenis_clients/campaign-dashboard/public_html/contact_actions/",
        "domTable": "#dashboard-table",
        "display": 'lightbox'
    } );
    /* Datatable */
    $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var linkClass = $(this).attr("link-class");
        var contactId = $(this).attr("contact-id"); 

        /* Test to see if we've passed $(this).attr("number-rows") */
        if ($(this).attr('sScrollY')) {
            var sScrollY = $(this).attr("sScrollY");
        } else {
            var sScrollY = 200;
        }

        /* If its modal, then set the link to just # and set the html-source attr */
        if ($(this).attr('table-type') === 'modal') {
            var htmlSource = $(this).attr('html-source');
            //alert(htmlSource);
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
                    "sDefaultContent": '<a href="" class="editor_markcomplete"><i class="icon-ok"></i></a>   <a href="" class="editor_remove"><i class="icon-trash "></i></a>',
                    
                    "mRender": function (data, type, full) {
                        /* return the <a> element */
                        //if(data)
                        //alert(data);
                        return '<a href="#" data-id="'+ full[0] + '" class="edit-record-modal" contact-id="'+ contactId + '"  html-source="' + htmlSource + '">' + data + '</a>';
                        }
                    }
                ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                nRow.className = aData[3]=="1" ? "active" : "disabled_row";
                    //$('td', nRow).addClass('class_edit');
                return nRow;
            }
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



/* Turns all forms with class 'ajax' into ajax powered forms */
// this has been moved to new js file ajax.js
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
   $("#contactaction-modal").modal('hide');
        return false;
    });
    
    
//delete record
    $('.DataTable').on('click', 'a.editor_remove', function (e) {
                                                        
        e.preventDefault();     
        var confirmDelete=confirm("Are you sure you wish to delete?");
        if (confirmDelete){         
        var dataId = $(this).closest('td').find('a:first').attr('data-id'); 
        var contactId =  $(this).closest('td').find('a:first').attr('contact-id'); 
        
        var url = '/tellenis_clients/campaign-dashboard/public_html/contact_actions/delete/'+dataId+'/'+contactId;
        var type = 'delete';
      
          $.ajax({
            url: url,
            type: type,
            data: contactId,
            success: function(response) {
                
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
               document.getElementById('message-task').style.visibility="visible";
               $("#message-task").html("Record deleted!");
        }); 
        }else{ // if false
        return false;
        }

    

    } );

 $('#contactaction-modal').bind('dialogclose', function(event) {
     alert('closed');
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

 //edit a record
    $('.DataTable').on('click', 'a.editor_markcomplete', function (e) {                                                     
        e.preventDefault();
        var dataId = $(this).closest('td').find('a:first').attr('data-id'); 
        var contactId =  $(this).closest('td').find('a:first').attr('contact-id');      
        var url = '/tellenis_clients/campaign-dashboard/public_html/contact_actions/toggle_completed/'+dataId+'/'+contactId;
        var type = 'markcomplete';
      
          $.ajax({
            url: url,
            type: type,
            data: contactId,
            success: function(response) {
                
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 1500);
            }
        });

    var status = $(this).closest('tr').children('td:nth-child(4)').text();
    document.getElementById('message-task').style.visibility="visible";
    if(status == 0){
    $("#message-task").html("Record updated as completed!");
    }
    else{
    $("#message-task").html("Record updated as in completed!");
    }
    var dTable = $('#dashboard-table').dataTable({ bRetrieve : true });
    dTable.fnClearTable(); 
    dTable.fnDraw();

    } );

 $('#contactaction-modal').bind('dialogclose', function(event) {
     alert('closed');
 });




})(jQuery);