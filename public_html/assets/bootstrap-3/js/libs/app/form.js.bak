$('form.ajax_form').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        alertClass = that.attr('alert-class');
        tableId = that.attr('table-id'); // the id of the current table
        tableCols = that.attr('table-cols'); // the id of the current table
        table = '';
        
        table = $('table#'+tableId);
        cols = table.attr('data-cols');

        $("#"+tableId).css('color', 'red');
        console.log('the table = ', table);
        console.log('the table cols = ', cols);
        

        //Is it a modal?
        modal = '';
        if( that.hasClass('modal_form') ) {
            modal = 'modal';
        }
        
        //Serialise the data to allow for radio/checkboxes
        data = that.serialize();
        console.log('data:', data);

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                response_parsed = $.parseJSON(response);
                console.log(response);
                if ( response_parsed.message == '[uhoh]' ){
                    //console.log('theres an error');
                    if ( modal == 'modal' ) {
                        $('.modal-fail').removeClass('hide');
                    }
                    else {
                       $('.form-fail').removeClass('hide');
                    }
                }
                else {
                    if ( modal == 'modal' ) {
                        $('#modal').modal('hide');

                        //Do we have a table to redraw?
                        if ( tableId ) {
                            //get the cols
                            
                            var cols = $('#'+tableId).attr('cols');
                            console.log('cols=', cols);

                            //Remove all the unwanted indices
                    //          $.each(cols, function( c, v ) {
                    //     rowArray.push(json.q[v]);
                    // });
// console.log('rowarray is', rowArray);
                    // table.fnUpdate( rowArray, row[0] );
                    // row.toggleClass('completed');

                            //var table = $('#'+tableId).dataTable();
                            console.log('table with id pf #'+tableId+' = ', table);
                            // table.fnStandingRedraw();
                            // $('table#'+tableId).fnDraw();
                            // table.fnDraw();
                        }
                    }
                    $('.form-fail').addClass('hide');
                    $('.form-success.alert-'+alertClass).removeClass('hide');
                    window.setTimeout(function() {
                        $('.form-success.alert-'+alertClass).addClass('hide');
                    }, 1500);
                }
            }
        });

        return false;
    });
