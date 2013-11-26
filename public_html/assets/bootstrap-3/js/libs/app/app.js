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
            alertclass: "",
            view: "",
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
                    '<a href="#" url="'+a.deleteurl+'" data-id="'+data+'" alert-class="'+a.alertclass+'" class="text-danger delete-record"><i class="fa fa-trash-o" /></a>' : data;
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
                return type === 'display' ? '<a href="#" url="'+a.toggleurl+'" data-id="'+ row[0] + '" alert-class="'+a.alertclass+'"  class="toggle-record"><i class="fa fa-check">'+data+'</i></a>' : data ;
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
                    return '<a href="'+url+'" data-id="'+row[0]+'" modal-source="'+a.modalsource+'" data-alert_class="'+a.alertclass+'" data-view="'+a.view+'" class="'+a.linkclass+'"  >'+data+'</a>';
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

        var oTable = t.dataTable( $.extend( true, o, {
            "bProcessing": true,
            "sServerMethod": "POST"
        } ) );
        //console.log(oTable);
        return oTable;
    }


    /* testing redraw of table */
    // $('a.redraw-table').click(function(e) {
    $(document).on( 'click', '.redraw-table', function(e) {
        e.preventDefault();
        console.log('clikced on redraw');

        // var table = $('table#task-table').dataTable();
        // var table = $('#task-table').dataTable();
        var table = createDataTable ('#task-table');
        console.log('table = ', table);
        // table.fnStandingRedraw();
        //$('table#'+tableId).fnDraw();
                    table.fnDraw();
                   //console.log('redrawn');
    });


    /* Open modal */
    // $('a.open-modal').click(function(e) {
    $(document).on( 'click', '.open-modal', function(e) {
        e.preventDefault();
        var url = $(this).attr('modal-source');
        var post = {modal: 'modal'};

        //Now turn the 'data-xxx' attributes into $_POST array
        $.each($(this).data(), function(k,v) {
            post[k] = v;
        });
        console.log('post:', post);

        $('#modal').modal('show');
        //if we have a url, the load the view from that url
        if ( url ) {
            $('.modal-body').html('');
            $('.modal-loader').addClass('loader');
            //Now post the data to the url...
            $.post(
                url,
                post,
                function(html) {
                    //...and on success, set up the modal
                    console.log('html', html);
                    $('.modal-body').html(html);
                    $('.modal-loader').removeClass('loader');
                }
            );
        }
    });


    //Delete confirmation
    // $(".del").click(function(){
    //     if (!confirm("Do you want REALLY want to delete this?")){
    //       return false;
    //     }
    //   });

    $(document).on( 'click', '.del', function(e) {
        if (!confirm("Do you want REALLY want to delete this?")){
          return false;
        }
    });


    

    /* Ensure the toggle record icon toggles the record */
    $(document).on( 'click', '.toggle-record', function(e) {
        e.preventDefault();

        console.log('about to toggle a record');

        //set up the vars
        var jqTable = $(this).parents('table');
        var table = jqTable.dataTable();
        var row = $(this).parents('tr');
        var url = $(this).attr('url');
        var id = $(this).attr('data-id');
        var cols = jqTable.attr('cols').split(',');
        // var correctJson ={};
        var rowArray =[];

        $.ajax( {
            url: url,
            data: {
                id: id,
            },
            type: 'POST',
            dataType: 'json',
            success: function ( json ) {
                if ( json.message == '[uhoh]' ) {
                    $('.form-fail').removeClass('hide');
                    console.log('uh oh - fail');
                }
                else {
                    //Create an array of values that are in the orig table
                    $.each(cols, function( c, v ) {
                        rowArray.push(json.q[v]);
                    });

                    table.fnUpdate( rowArray, row[0] );
                    row.toggleClass('completed');
                }
            }
        } );
    });

/* DELETE record */
    $(document).on( 'click', '.delete-record', function(e) {
        e.preventDefault();

        if (!confirm("Do you want REALLY want to delete this?")){
          return false;
          
        }


        console.log('about to delete a record');

        //set up the vars
        var jqTable = $(this).parents('table');
        var table = jqTable.dataTable();
        var row = $(this).parents('tr');
        var url = $(this).attr('url');
        var id = $(this).attr('data-id');
      //  var cols = jqTable.attr('cols').split(',');
        // var correctJson ={};
        //var rowArray =[];

        $.ajax( {
            url: url+'/'+id,
            data: {
                id: id,
            },
            type: 'POST',
            dataType: 'json',
            success: function ( json ) {
                if ( json.message == '[uhoh]' ) {
                    $('.form-fail').removeClass('hide');
                    console.log('uh oh - fail');
                }
                else {
                    //Create an array of values that are in the orig table
                   console.log('success!');
                   // row.remove();
                   row.fadeOut('slow',
                    function(){
                        // row.remove();
                        jqTable.fnDraw();
                    });
                }
            }
        } );
    });

    /* Submit a form Non-modal */
    //  LOOK IN form.js for this code
 

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
// $('input.tags1').typeahead({
//       prefetch: 'http://campaigndashboard.dev/ajax/contacts/typeahead_tags'
//         //The .on() scales the dropdown menu to dynamically scale the dropdown
//     }).on('typeahead:opened',function(){
//         $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
//     }).on('typeahead:selected', function(datum, dataset){
//         console.log('id', dataset.id);
//         $('input[name="other_contact_id"]').val(dataset.id);
//         //console.log('dataset', dataset);
//     });

// // $('input.tags2').tagsinput();
// $('.tags_tags').tagsinput();

// $('.tags_tags').typeahead({
//       prefetch: 'http://campaigndashboard.dev/ajax/contacts/typeahead_tags'

//         //The .on() scales the dropdown menu to dynamically scale the dropdown
//     }).on('typeahead:opened',function(){
//         $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
//         console.log('typeahed started');
//     }).bind('typeahead:selected', (function (obj, datum){
//         console.log('datum', datum);
//         this.tagsinput('add', datum.value);
//         this.tagsinput('.tags_tags').typeahead('setQuery', '');
//         // this.tagsinput('add', datum.value);
//         // this.tagsinput('input').typeahead('setQuery', '');
//         // $('input[name="other_contact_id"]').val(dataset.id);
//         //console.log('dataset', dataset);
//     }, $('.tags_tags')));


    //Tags
    // $('input.tags').typeahead({
    //   name: 'contact',
    //   // limit: 100,({
    //     prefetch: 'http://campaigndashboard.dev/ajax/contacts/typeahead_tags',
    //     // remote: {url:'http://campaigndashboard.dev/ajax/contacts/typeahead_tags'}
    // }).on('typeahead:opened',function(){
    //     console.log('typeahed:opened');
    //     // console.log('json = ', );
    //     // $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
    // }).on('typeahead:selected', function(datum, dataset){
    //     // console.log('selected', dataset);
    //     console.log('somethign has been selected');
    //     // $('input.tags').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
    //     //tagClass: 'label label-success ',
    //     // itemValue: 'value',
    //     // itemText: 'text'
    // });

    // $('input.tags1').tagsinput('input.tags').typeahead({
    //     prefetch: 'http://campaigndashboard.dev/ajax/contacts/typeahead_tags'
    //     }).bind('typeahead:selected', $.proxy(function (obj, datum) {
    //       this.tagsinput('add', datum.value);
    //       this.tagsinput('input.tags').typeahead('setQuery', '');
    //   }, $('input.tags')));

    

// $('input.tags').tagsinput('add', { "value": 1 , "text": "Amsterdam"   , "continent": "Europe"    });
// $('input.tags').tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
// $('input.tags').tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
// $('input.tags').tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
// $('input.tags').tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });




    
    //
    // multiple datasets
    // $('input.twitter-search').addClass('testing');

    

console.log('all done');

})(jQuery);