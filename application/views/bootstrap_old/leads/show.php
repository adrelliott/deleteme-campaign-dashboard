
<style type="text/css">

tr.completed td {
    background-color: red !important;
    color: white;
}
</style>
<script type="text/javascript" charset="utf-8">

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



</script>

<div id="container">
  <div class="full_width big">
    DataTables created from objects
</div>

<h1>Live example</h1>
<div>
    <table class="table data-table-init " id="simple" data-source="<?= site_url('ajax/contacts/get_table/id/first_name/last_name'); ?>" data-link="tasks/show/"  data-iDisplayLength=10 data-bLengthChange="no" data-linkurl="<?= site_url('contacts/show'); ?>">
        <thead>
            <tr>
                <th>#</th>
                <th>Typerr</th>
                <th>Task title</th>
            </tr>
        </thead>
    </table>
</div>

<div class="spacer"></div>
<div>
    <table class="table data-table-init" cellspacing="0" id="ajax" data-link="tasks/show/" data-target="#contacts/show/" data-render1="complete" dropdown="0"  data-linkurl="<?= site_url('contacts/show'); ?>" data-toggleurl="url/to"  data-completedclass="true" >
        <thead>
            <tr>
                <th>#</th>
                <th>Typerr</th>
                <th>Task title</th>
                <th>completed?</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>6045</td>
                <td>task</td>
                <td></td>
                <td>1</td>
            </tr>
            <tr>
                <td>6042</td>
                <td>task</td>
                <td>task title 2</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6041</td>
                <td>task</td>
                <td>new task17.06</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6039</td>
                <td>task</td>
                <td>New title3</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6028</td>
                <td>task</td>
                <td>New task</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6027</td>
                <td>task</td>
                <td>New task</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6026</td>
                <td>task</td>
                <td></td>
                <td>0</td>
            </tr>
            <tr>
                <td>6025</td>
                <td>task</td>
                <td></td>
                <td>0</td>
            </tr>
            <tr>
                <td>6024</td>
                <td>task</td>
                <td></td>
                <td>0</td>
            </tr>
            <tr>
                <td>6023</td>
                <td>task</td>
                <td>jjj</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6022</td>
                <td>task</td>
                <td>hhh</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6021</td>
                <td>task</td>
                <td></td>
                <td>0</td>
            </tr>
            <tr>
                <td>6020</td>
                <td>task</td>
                <td>new task 14.32</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6019</td>
                <td>task</td>
                <td>New task</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6018</td>
                <td>task</td>
                <td>new tastk 2028</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6017</td>
                <td>task</td>
                <td>Delet me</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6010</td>
                <td>task</td>
                <td>new task 20.28</td>
                <td>1</td>
            </tr>
            <tr>
                <td>6009</td>
                <td>task</td>
                <td>New task</td>
                <td>0</td>
            </tr>
            <tr>
                <td>6008</td>
                <td>task</td>
                <td>New task 21.31hh</td>
                <td>0</td>
            </tr>
            <tr>
                <td>2651</td>
                <td>task</td>
                <td>egestas blandit. Namyy</td>
                <td>1</td>
            </tr>
            <tr>
                <td>1250</td>
                <td>task</td>
                <td>New title444444</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="spacer"></div>


<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <? 
    /* Get local copies of libraries if its a local version... */ 
    if (ENVIRONMENT === 'development') :
  ?>
    <script src="<?= site_url('assets/bootstrap-3/js/jquery/1.9.1/jquery.min.js'); ?>"></script>
    <script src="<?= site_url('assets/bootstrap-3/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<? //echo site_url('assets/bootstrap-3/js/jasny-bootstrap.js'); ?>"></script>
    <script src="<? //echo site_url('assets/bootstrap-3/js/bootstrap-modal.js'); ?>"></script>

  <? 
  /* ...else get them from CDNs... */
  else: ?>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type='text/javascript' src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <? endif; ?>

  <script src="<?= site_url('assets/bootstrap-3/js/bootstrap/bootstrap-datepicker.js'); ?>"></script>
  
  <!-- Datatbles Jquery -->
  <script src="<?= base_url('assets/bootstrap-3/js/libs/jquery.dataTables.js'); ?>"></script>
  <script src="<?= base_url('assets/bootstrap-3/js/libs/dataTables.bootstrapPagination.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap-3/js/libs/dataTables.editor.min.js'); ?>"></script>

  <script src="<?= site_url('assets/bootstrap-3/js/libs/app.js'); ?>"></script>

  <!-- Include any custom style sheets/scripts/meta etc for this client -->
  <? 
    if ($element = config('include_in_footer', 'extras'))
    {
      foreach ($element as $type => $path)
      {
        if($type == 'script')
        {
          echo '<script src="' . site_url($path) . '"></script>';
        }
        elseif($type == 'stylesheet')
        {
          echo '<link href="' . site_url($path) . '" rel="stylesheet">';    
        }
      }
    };
  ?>


<script>$(document).ready( function () {
  createDataTable( '#simple' );
  createDataTable( '#ajax' );
} );</script>
