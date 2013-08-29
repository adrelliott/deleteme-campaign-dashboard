/* This file contains the javascript for the app */
    $(document).ready(function() {

      
      /* Dstatable */
      $('.DataTable').each(function() {
        var dataSource = $(this).attr("data-source");
        var tableId = $(this).attr("table-id");
        var datatableoptions = {
            "bProcessing": true,
            "bServerSide": true,
            "sPaginationType": "bootstrap",
            "sAjaxSource": dataSource,
            "sServerMethod": "POST",
            "bScrollInfinite": true,
            "bScrollCollapse": true,
            "sScrollY": "400px",
            "bDestroy": true,
        };
        $("#" + tableId ).dataTable(datatableoptions);
        $.extend( $.fn.dataTableExt.oStdClasses, {
              "sWrapper": "dataTables_wrapper form-inline"
        } );

      });

      /* Typeahead */
       // Shows a list of curent contacts and inserts an id in a hidden field with id of 'contact-id'
        $('#contact_list').typeahead({
            source: function (query, process) {
                contacts = [];
                map = {};
                url = 'http://campaigndashboard.dev/ajax/contacts/typeahead/id/first_name/last_name/postal_code';
              var data1 = $.get('http://campaigndashboard.dev/ajax/contacts/typeahead/id/first_name/last_name/postal_code');

                var data = [
                   /* {"id": "33", "first_name": "Al"},
                    {"id": "34", "firstName": "Lea"},
                    {"id": "35", "firstName": "Charlie"},
                    {"id": "36", "firstName": "Chris"},
                    {"id": "37", "firstName": "Lionel"}*/
                    {"id": "33", "first_name": "Al", "last_name": "Elliott", "postal_code": "M1 2JW"},
                    {"id": "34", "first_name": "Lea", "last_name": "Elliott", "postal_code": "M2 2JW"},
                    {"id": "35", "first_name": "Charlie", "last_name": "Elliott", "postal_code": "M3 2JW"},
                    {"id": "36", "first_name": "Chris", "last_name": "Jenkins", "postal_code": "M4 2JW"},
                    {"id": "37", "first_name": "Lionel", "last_name": "Blair", "postal_code": "M5 2JW"}
                ];
             
                $.each(data, function (i, contactName) {
                   var concat = contactName.first_name + ' ' + contactName.last_name + ' (' + contactName.postal_code + ')';
                    map[concat] = contactName;
                    contacts.push(concat);
                });

                process(contacts);
            },
            updater: function (item) {
                selectedName = map[item].id;
                $('input#contact_id').val(selectedName);
                return item;
            },
            matcher: function (item) {
                if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1)
                {
                    return true;
                }
            },
            sorter: function (items) {
                return items.sort();
            },
            highlighter: function (item) {
                var regex = new RegExp( '(' + this.query + ')', 'gi' );
                return item.replace( regex, "<strong>$1</strong>" );
            },
        });



} );
	