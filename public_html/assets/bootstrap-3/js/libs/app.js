// var editor;  
(function($) {

    console.log('here we go');
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
            column:"1",
            // unavailablecols: [] //Used to determine which colmsn have not got links
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
                    '<a href="#" data-url="'+a.deleteurl+'" data-id="'+data+'" class="text-danger delete-record"><i class="fa fa-trash-o" /></a>' : data;
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
                return type === 'display' ? '<a href="#" data-url="'+a.toggleurl+'" data-id="'+ row[0] + '" class="toggle-record"><i class="fa fa-check">'+data+'</i></a>' : data ;
                // return type === 'display' ? '<a href="'+a.toggleurl+'/'+row[0]+'" data-id="'+ row[0] + '" class="toggle-record"><i class="fa fa-check"></i></a>' : data ;
            }
        } );
       }

       //Set up the links
        if ( a.linkurl ) {
            o.aoColumnDefs.push( {
                aTargets: ['_all'],
                // aTargets: [1],
                mRender: function ( data, type, row ) {
                    var url = '#';
                    if ( a.linkurl !== '#') {
                        url = a.linkurl+'/'+row[0];
                    }
                    return '<a href="'+url+'" data-id="'+row[0]+'" data-source="'+a.modalsource+'" class="'+a.linkclass+'" data-column="'+a.column+'" >'+data+'</a>';
                }
            } );
        }

        // Apply a 'completed' class if last is 1 & data-toggleclass is passed
        if ( a.toggleclass) {
            o.fnCreatedRow = function ( row, data, idx ) {
                var column = data.length - 1;
                if ( data[ column ] == '1' ) { //col count starts at 0
                    $(row).addClass( a.toggleclass );
                    //$(row 'td').eq(column).removeClass( 'fa' );
                }
            };
        }

        return t.dataTable( $.extend( true, o, {
            "bProcessing": true,
            "sServerMethod": "POST"
        } ) );
    }


/* Open modal */
    $('a.open-modal').click(function(e) {
        e.preventDefault();
        console.log('modal triggered');
        var modalType = $(this).attr('modal-type');
        var dataSource = $(this).attr('data-source');
        var dataId = $(this).attr('data-id');
        var columnNo = $(this).attr('data-column');
        // console.log('col no passed is: ', columnNo);

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
            $('.modal-loader').addClass('loader');


            //if we have passed a data id, append it to the end of the url
            if ( dataId ) {
                dataSource = dataSource+'/'+dataId;
            }

            $.post( dataSource,
                {'column': columnNo},
                function(html) {
                    console.log('html', html);
                    $('.modal-body').html(html);
                    $('.modal-loader').removeClass('loader');
                }
            );

            // $('.modal-loader').removeClass('loader');
        }

    });

    $(".del").click(function(){
        if (!confirm("Do you want REALLY want to delete this?")){
          return false;
        }
      });

    /* Ensure the delete record icon deletes the record */
    $('.delete-record').click(function(e) {
        e.preventDefault();
        console.log('about to delete a record');
        //set up the vars
        var jqTable = $(this).parents('table');
        var table = jqTable.dataTable();
        var row = this;
        
        //delete the record
        $.ajax( {
            url: jqTable.attr('data-url'),
            data: {
                id: table.fnGetData( this )[0]
            },
            type: 'POST',
            dataType: 'json',
            success: function ( json ) {
                console.log('json = ', json);
                if ( json.length ) {
                    table.fnUpdate( json, row );
                }
                else {
                    //window.location.reload();
                    console.log('uh oh - fail');
                }
            }
        } );

        //If the result is true then remove the row
        //else display error div explainign that we canot delete at this time
    });

    /* Ensure the delete record icon deletes the record */
    $('.test-record').click(function(e) {
        e.preventDefault();
        console.log('about to TEST a record');
        //set up the vars
        
        //delete the record
        

        //If the result is true then remove the row
        //else display error div explainign that we canot delete at this time
    });

    /* Ensure the toggle record icon toggles the record */
    $(document).on( 'click', '.toggle-record', function(e) {
        e.preventDefault();

        console.log('about to toggle a record');

        //set up the vars
        var jqTable = $(this).parents('table');
        var table = jqTable.dataTable();
        var row = this;
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');
        
        //toggle the record
        $.ajax( {
            url: url+'/'+id,
            //no data required
            type: 'POST',
            dataType: 'json',
            success: function ( json ) {
console.log('json = ', json);
console.log('the new competdc val=', json.q.completed);
                if ( json.message == '[updated]' ) {
                    table.fnUpdate( json.q, row );
                    row.addClass('completed');
                }
                else {
                    $('.form-fail.column'+columnNo).removeClass('hide');
                    console.log('uh oh - fail');
                }
            }
        } );
        
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
                response_parsed = $.parseJSON(response);
                // console.log('thisnis the message:', response_parsed.message);
                // console.log('this is the data:', response_parsed.q);

                //console.log(response);
                if ( response_parsed.message == '[uhoh]' ){
                    $('.form-fail.column'+columnNo).removeClass('hide');
                }
                else {
                    $('.form-success.column'+columnNo).removeClass('hide');
                    window.setTimeout(function() {
                        $('.form-success.column'+columnNo).addClass('hide');
                        $('.form-fail.column'+columnNo).addClass('hide');
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


    /* Typeaheads */
    // multiple datasets
    // $('input.twitter-search').addClass('testing');

    

console.log('all done');

})(jQuery);