/* This is the JS required for the modal windows (its called in views/layouts/modal.php)*/


/* Turns all forms in a modal with class 'ajax' into ajax powered forms */
// $('form.ajax_form.modal_form').on('submit', function(e) {
//         e.preventDefault();
//         var that = $(this),
//         url = that.attr('action'),
//         type = that.attr('method'),
//         alertClass = that.attr('alert-class');
//         modal = false;

//         if( that.hasClass('modal_form') ) {
//             modal = true;
//         }
//         console.log('modal .=', modal);
//         console.log('alertClass .=', alertClass);
//         //Serialise the data to allow for radio/checkboxes
//         data = that.serialize();
//         // console.log('data:', data);

//         $.ajax({
//             url: url,
//             type: type,
//             data: data,
//             success: function(response) {
//                 response_parsed = $.parseJSON(response);
//                 //console.log('thisnis the message:', response_parsed.message);
//                 // console.log('this is the data:', response_parsed.q);

//                 console.log(response);
//                 if ( response_parsed.message == '[uhoh]' ){
//                     //console.log('theres an error');
//                     if ( modal == true ) {
//                         $('#modal-alert').removeClass('hide');
//                     }
//                     else {
//                        $('.form-fail').removeClass('hide');
//                     }
//                 }
//                 else {
//                     if ( modal == true ) {
//                         $('#modal').modal('hide');
//                     }
//                     $('.form-fail').addClass('hide');
//                     $('.form-success.alert-'+alertClass).removeClass('hide');
//                     window.setTimeout(function() {
//                         $('.form-success.alert-'+alertClass).addClass('hide');
//                     }, 1500);
//                     // $('#modal').modal('hide');
//                     // console.log('attempting to show ', '.form-success.column'+columnNo);
//                     // $('.form-success.column'+columnNo).removeClass('hide');
//                     // window.setTimeout(function() {
//                     //     $('.form-success.column'+columnNo).addClass('hide');
//                     // }, 1500);
//                 }
//             }
//         });

//         return false;
//     });

    // Typeahead
    $('input.contact-search').typeahead({
      name: 'contact',
      limit: 100,
      // local: ['timtrueman', 'JakeHarding', 'vskarich']
      remote: {
        url: 'http://campaigndashboard.dev/ajax/contacts/typeahead_contacts/id/first_name/last_name/postal_code/?q=%QUERY',
        },
      // template: [
      //   '<p class="typeahead-fullname">{{first_name}} {{last_name}}</p>',
      //   '<p class="typeahead-postalcode">{{postal_code}}</p>',
      // ].join(''),
      // engine: Hogan,
    
        //The .on() scales the dropdown menu to dynamically scale the dropdown
    }).on('typeahead:opened',function(){
        $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
    }).on('typeahead:selected', function(datum, dataset){
        console.log('id', dataset.id);
        $('input[name="other_contact_id"]').val(dataset.id);
        //console.log('dataset', dataset);
    });

    $('input.tag-search').typeahead({
      name: 'tag',
      limit: 25,
      // local: ['timtrueman', 'JakeHarding', 'vskarich']
      prefetch: 'http://campaigndashboard.dev/ajax/tags/typeahead_tags/id/tag_name',

      template: [
        '<p class="typeahead-tagname">{{tag_name}}</p>'
        // '<p class="typeahead-postalcode">{{postal_code}}</p>',
      ],
      engine: Hogan,
    
        //The .on() scales the dropdown menu to dynamically scale the dropdown
    }).on('typeahead:opened',function(){
        console.log('typeahead opened');
        $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
    }).on('typeahead:selected', function(datum, dataset){
        console.log('id', dataset.id);
        $('input[name="tag_id"]').val(dataset.id);
        //console.log('dataset', dataset);
    });
