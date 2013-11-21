/* This is the JS required for the modal windows (its called in views/layouts/modal.php)*/


/* Turns all forms in a modal with class 'ajax' into ajax powered forms */
$('form.ajax_form.modal_form').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        columnNo = that.data('column');
        // console.log('columnNo .=', columnNo);
        //Serialise the data to allow for radio/checkboxes
        data = that.serialize();
        // console.log('data:', data);

        $.ajax({
            url: url,
            type: type,
            data: data,
            success: function(response) {
                console.log(response);
                // console.log('line 21');
                if ( response.length < 3 ){//I know - this is horrible. Just want to see if the response is null
                    console.log('unhide the error');
                    $('#modal-alert').removeClass('hide');
                }
                else {
                    $('#modal').modal('hide');
                    console.log('attempting to show ', '.form-success.column'+columnNo);
                    $('.form-success.column'+columnNo).removeClass('hide');
                    window.setTimeout(function() {
                        $('.form-success.column'+columnNo).addClass('hide');
                    }, 1500);
                }
            }
        });

        return false;
    });
