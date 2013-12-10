  // var editor;  
  (function($) {
    /* DataTables */
    $('.typeahead').each( function() {
      createTypeahead( this );
    } );

    function createTypeahead( selector ){

      var t = $( selector );
      var idField = $(t).attr('idfield');
      var onSelected = false;
      //Use d to store data to be passed to typeahead
      var d = {};

      var datasetTemplate = {
        name: false,
        limit: false,
        template: false,
        engine: false,
        header: false,
        footer: false,
        prefetch: false,
        remote: false
      };
 
      //Iterate over the attributes object and test to see if we've passed a new attributes
        $.each(datasetTemplate, function(k, v) {
            if (t.data(k)){
                d[k] = t.data(k); //Overwrite with the new value
            }
        });

        //Set up the remote, if passed
        if (d.remote) {
          d.remote = d.remote + '?q=%QUERY';
        }

        //Set up the 'set field on typeahead:selected' if passed
        if (idField) {
          console.log('idField=', idField);
        }

        console.log('d', d);

        var retval = t.typeahead({
          name: d.name,
          limit: d.limit,
          template: d.template,
          engine: d.engine,
          header: d.header,
          footer: d.footer,
          prefetch: d.prefetch,
          remote: d.remote,
        }).on('typeahead:initialized', function() {
          console.log('typeahead:initialized');
        }).on('typeahead:selected', function (datum, dataset) {
          console.log('datum', datum);
          console.log('dataset', dataset);
          console.log('on:selected - putting id in ', idField);
          if (idField) {
             $('#'+idField).val(dataset.id);
             console.log('putthis val in idFields', dataset.id);
          }
        });

      // var retval = t.typeahead( dataset );
      // return retval;

    }











    // var dataSource = 
    $('.typeaheadx').typeahead({
      prefetch: 'http://campaigndashboard.dev/ajax/tags/typeahead_tags/id/tag_name',
      //url1: $(this).data('url'),
      // limit: ,
      // 
      // remote: {
      //   url: 'url';
      //   replace: function(url )
      // },
      // local: ['timtrueman', 'JakeHarding', 'vskarich']
      // remote: {
        // url: 'http://campaigndashboard.dev/ajax/contacts/typeahead_contacts/first_name/id/last_name/postal_code/?q=%QUERY',
        // },
        // remote: {
        // url: $(this).data('source') + '?q=%QUERY',
        // //url: url + "/?q=%QUERY",
        // },


      }).on('typeahead:opened',function(remote){
       console.log('opened');
       console.log('rem=', remote);
         // console.log('remote=', remote);
        // $('.tt-dropdown-menu').css('width',$(this).width() + 'px');
      }).on('typeahead:selected', function(datum, dataset){
        //console.log('id', dataset.id);
        $('input[name="other_contact_id"]').val(dataset.id);
        //console.log('dataset', dataset);
      });




    // Typeahead
    $('input.contact-search').typeahead({
      name: 'contact',
      limit: 100,
      // local: ['timtrueman', 'JakeHarding', 'vskarich']
      remote: {
        url: 'http://campaigndashboard.dev/ajax/contacts/typeahead_contacts/first_name/id/last_name/postal_code/?q=%QUERY',
      },


      /********************* dontl forget to change the url so that it'll work on production server!!!! it campagindashboard.dev */



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


    })(jQuery);