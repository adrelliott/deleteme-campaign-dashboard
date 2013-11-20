// var editor;  
(function($) {

    
    /* DataTables */
    $('table.data-table').each( function() {
        createDataTable( this );
    } );

    function createDataTable( selector )
    {
        var t = $( selector );

        //Set up the default settings
        var o = {
            aoColumnDefs: [],
            iDisplayLength: 5,
            bDestroy: true,
            sPaginationType: "bootstrap",
            bLengthChange: false,
            aLengthMenu: [[5, 10, 25, 50], [5, 10, 25, 50]],
            aaSorting: [],
            aoColumnDefs: [],
            fnRowCallback: false
        };

        //Now Iterate over the dataTablesOptions object and test to see if we've passed a new attribute
        $.each(o, function(k, v) {
            var newk = k.toLowerCase(); //we cannot pass camelCase
            if ( t.data(newk) ){
                o[k] = t.data(newk); //Overwrite with the new value
            }
        });

//console.log('o=', o);

        var a = {
            // tableid : "",
            linkurl: false,
            linkclass: "",
            deleteurl: false,
            toggleurl: false,
            modalsource: "",
            ajaxsource: false,
            toggleclass: false,
            showid: false,
            unavailablecols: [] //Used to determine which colmsn have not got links
        };

        //Iterate over the attributes object and test to see if we've passed a new attributes
        $.each(a, function(k, v) {
            if (t.data(k)){
                a[k] = t.data(k); //Overwrite with the new value
            }
        });

//console.log('a=', a);

        //Is it an ajax table?
        if ( a.ajaxsource ) {
            o.sAjaxSource = a.ajaxsource;
        }

        //Set up a delete link
        if ( a.deleteurl ) {
        // Use the ID column as a button
            o.aoColumnDefs.push( {
                aTargets: [0],
                bSortable: false,
                mRender: function ( data, type, row ) {
                    return type === 'display' ?
                    '<a href="'+a.deleteurl+'/'+data+'" data-id="'+data+'" class="text-danger delete_record"><i class="fa fa-trash-o" /></a>' : data;
                }
            } );
        }
        else {
            if( ! a.showid )
            // Hide ID column
            o.aoColumnDefs.push( {
                aTargets: [0],
                bVisible: false
            } );
        }

        //set up a toggle link 
        if ( a.toggleurl ) {
           o.aoColumnDefs.push( {
            aTargets: [-1],
            bSortable: true,
            mRender: function ( data, type, row ) {
                return type === 'display' ? '<a href="'+a.toggleurl+'/'+row[0]+'" data-id="'+ row[0] + '" class="toggle_record"><i class="fa fa-check"></i></a>' : data ;
            }
        } );
       }

       //Set up the links
        if ( a.linkurl ) {
            o.aoColumnDefs.push( {
                aTargets: ['_all'],
                // aTargets: [1],
                mRender: function ( data, type, row ) {
                    return '<a href="'+a.linkurl+'/'+row[0]+'" class="'+a.linkclass+'" data-id="'+row[0]+'" data-source="'+a.modalsource+'"><i class=" fa fa-edit1"></i>'+data+'</a>';
                }
            } );
        }

        //Apply a 'completed' class if last is 1 & data-toggleclass is passed
        if ( a.toggleclass) {
            o.fnCreatedRow = function ( row, data, idx ) {
                var column = data.length - 1;
                if ( data[ column ] == '1' ) { //col count starts at 0
                    $(row).addClass( a.toggleclass );
                    //$(row 'td').eq(column).removeClass( 'fa' );
                }
            }
        }

        return t.dataTable( $.extend( true, o, {
            "bProcessing": true,
            "sServerMethod": "POST"
        } ) );
    }


////////////////////////////////////////////////////////

/* Open modal */
    $('.open-modal').click(function(e) {
        console.log('modal triggered');
        e.preventDefault();
        var modalType = $(this).attr('modal-type');
        var dataSource = $(this).attr('data-source');
        var dataId = $(this).attr('data-id');
        var columnNo = $(this).attr('data-column');
        console.log('col ni passed otmodal is ', columnNo);

        //Make it bigger...?   ########################## TO FINISH #######
        if ( modalType === 'large' ) {
            console.log('make it larger');
            $('#'+modalType).addClass('modalLarge');
        }

        //Put loader css class here..
        //..
        //..

        $('#modal').modal('show');

        //if we have a dataSource, the load the view from that url
        if ( dataSource ) {
            $('.modal-body').html('');

            //if we have passed a data id, append it to the end of the url
            if ( dataId ) {
                dataSource = dataSource+'/'+dataId;
            }

            $.post( dataSource,
                {'column': columnNo},
                function(html) {
                    console.log('html', html);
                    $('.modal-body').html(html);
                }
            );
        }

    });

    /* Ensure the delete record icon deletes the record */
    $('.delete_record').click(function(e) {
        e.preventDefault();
        //delete the record
        //If the result is true then remove the row
        //else display error div explainign that we canot delete at this time
    });

    /* Ensure the toggle record icon toggles the record */
    $('.toggle_record').click(function(e) {
        e.preventDefault();
        //delete the record
        //If the result is true then remove the row
        //else display error div explainign that we canot delete at this time
    });

/* Submit a form Non-modal */
    $('form.ajax_form').on('submit', function(e) {
        e.preventDefault();
        console.log('ajax_form triggered');
        var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        columnNo = that.data('column');
        //Serialise the data to allow for radio/checkboxes
        data = that.serialize();

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                console.log(response);
                if ( response.length < 3 ){//I know - this is horrible. Just want to see if the response is null
                    $('.form-fail.column'+columnNo).removeClass('hide');
                }
                else {
                    $('.form-success.column'+columnNo).removeClass('hide');
                    window.setTimeout(function() {
                        $('.form-success.column'+columnNo).addClass('hide');
                    }, 1500);
                }
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


})(jQuery);