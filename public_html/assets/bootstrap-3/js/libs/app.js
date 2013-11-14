var editor;  
(function($) {

    /* Datepicker - http://www.eyecon.ro/bootstrap-datepicker/ */
    // $('.datepicker').datepicker({
    //     format: "dd/mm/yyyy"
    // });

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
            tableid : "",
            linkurl: false,
            linkclass: "",
            deleteurl: false,
            toggleurl: false,
            htmlsource: "",
            completedclass: false
        };

        //Iterate over the attributes object and test to see if we've passed a new attributes
        $.each(a, function(k, v) {
            if (t.data(k)){
                a[k] = t.data(k); //Overwrite with the new value
            }
        });

//console.log('a=', a);

        //Is it an ajax table?
        if ( t.attr('data-source') ) {
            o.sAjaxSource = t.attr('data-source');
        }

        //Set up the links
        if ( a.linkurl ) {
            o.aoColumnDefs.push( {
                aTargets: ['_all'],
                mRender: function ( data, type, row ) {
                    return '<a href="'+a.linkurl+'/'+row[0]+'" class="'+a.linkclass+'" data-id="'+row[0]+'" html-source="'+a.htmlsource+'">'+data+'</a>';
                }
            } );
        }

        //Set up a delete link
        //
        //

        //set up a toggle link 
        if ( a.toggleurl ) {
           o.aoColumnDefs.push( {
            aTargets: [-1],
            mRender: function ( data, type, row ) {
                return '<a href="'+a.toggleurl+'/'+row[0]+'" data-id="'+ row[0] + '"><i class="fa fa-check"></i></a>';
            }
        } );
       }

        //Apply a 'completed' class if last is 1 & data-completedclass is passed
        if ( a.completedclass ) {
            o.fnCreatedRow = function ( row, data, idx ) {
                if ( data[ data.length - 1 ] == '1' ) { //col count starts at 0
                    $(row).addClass( 'completed' );
                }
            }
        }

        // if ( t.attr('data-render') && t.attr('data-render') === 'complete3' ) {
        //     // Could inject a cloned node here if needed?

        //     o.aoColumnDefs.push( {
        //         aTargets: [-1],
        //         mRender: function ( data, type, row ) {
        //             return '<a href="#" data-id="'+ row[0] + '" class="edit-record-modal">icons...</a>';
        //         }
        //     } );

        //     // Add class to the row's if completed
        //     o.fnCreatedRow = function ( row, data, idx ) {
        //         if ( data[ data.length - 1 ] == '1' ) {
        //             $(row).addClass( 'completed' );
        //         }
        //     }
        // }

        console.log('o after links=', o);

        return t.dataTable( $.extend( true, o, {
            "bProcessing": true,
            "sServerMethod": "POST"
        } ) );
    }


////////////////////////////////////////////////////////

/* Open modal */
    $('.open-modal').click(function(e) {
        e.preventDefault();
        var modalType = $(this).attr('modal-type');
        var dataSource = $(this).attr('data-source');
        var dataId = $(this).attr('data-id');

        //Make it bigger...?
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
                function(html) {
                    console.log('html', html);
                    $('.modal-body').html(html);
                }
            );
        }

    });

/* Submit a form MODAL */
    // $('form.ajax_form').on('submit', function(e) {
    //     e.preventDefault();
    //     var that = $(this),
    //     url = that.attr('action'),
    //     type = that.attr('method'),
    //     //modalType = that.parent().attr('modal-type'),
    //     sectionId = that.data('section');
    //     //Serialise the data to allow for radio/checkboxes
    //     data = that.serialize();

    //     $.ajax({
    //         url: url,
    //         type: type,
    //         data: data,
    //         success: function(response) {
    //             console.log(response);
    //             if ( response.length < 3 ){//I know - this is horrible. Just want to see if the response is null
    //                 $('.modal-alert').removeClass('hide');
    //             }
    //             else {
    //                 $('#modal').modal('hide');
    //                 $('#alert-'+sectionId).removeClass('hide');
    //                 window.setTimeout(function() {
    //                     $('#alert-'+sectionId).addClass('hide');
    //                 }, 1500);
    //             }
    //         }
    //     });

    //     return false;
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