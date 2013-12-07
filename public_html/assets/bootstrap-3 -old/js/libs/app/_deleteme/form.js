$('form.ajax_form').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        alertClass = that.attr('alert-class');
        tableId = that.attr('table-id'); // the id of the current table
        table = '';
        
        //Is it a modal?
        modal = '';
        if( that.hasClass('modal_form') ) {
            modal = 'modal';
        }
        
        //Serialise the data to allow for radio/checkboxes
        data = that.serialize();
        // console.log('data:', data);

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
                            console.log('yes! table id exists: ', tableId);
                            var table = $('table#'+tableId).dataTable();
                            console.log('table = ', table);
                            table.fnDraw();
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
