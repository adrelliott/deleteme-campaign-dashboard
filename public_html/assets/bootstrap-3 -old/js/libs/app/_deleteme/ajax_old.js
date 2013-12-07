/* Turns all forms with class 'ajax' into ajax powered forms */
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
                console.log('response - 1st: '+response);
                // debugger;
                $("#container-" + sectionId).html(response);
                $("#message-" + sectionId).html('<div class="alert alert-success">Record Updated!</div>');
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 1500);

                
            }
        });

        var dTable = $('#'+sectionId+'-table').dataTable();
console.log(dTable);
        dTable.fnClearTable();
        dTable.fnDraw();
        // var popup = window.parent;  
        // popup.document.getElementById('message-task').style.visibility="visible";
        // $("#message-task").html("Record saved!");
        $("#contactaction-modal").modal('hide');
    return false;

    });
