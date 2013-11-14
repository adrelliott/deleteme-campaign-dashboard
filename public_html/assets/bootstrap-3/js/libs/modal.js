/* This is the JS required for the modal windows (its called in views/layouts/modal.php)*/


/* Turns all forms in a modal with class 'ajax' into ajax powered forms */
$('form.ajax_form').on('submit', function(e) {
        e.preventDefault();
        var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        //modalType = that.parent().attr('modal-type'),
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
                    $('#modal').modal('hide');
                    $('#alert-'+sectionId).removeClass('hide');
                    window.setTimeout(function() {
                        $('#alert-'+sectionId).addClass('hide');
                    }, 1500);
                }
            }
        });

        return false;
    });
