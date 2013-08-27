<?php $table = generate_ajax_datatable(array('id' => 'Id', 'first_name' => 'First Nme'), 'contacts'); ?>

		<?php /*<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bProcessing": true,
					"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
					"bServerSide": true,
					"sAjaxSource": "<?php echo site_url('contacts/get_by_ajax/id/first_name/last_name/owner_id'); ?>",
					"sServerMethod": "POST"
				} );
				$.extend( $.fn.dataTableExt.oStdClasses, {
    "sWrapper": "dataTables_wrapper form-inline"
} );
			} );
</script>*/
		//echo $table['js']; 
		//echo $table['html']; 
	/*
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">

	<thead>
		<tr>
			<th width="20%">Id</th>
			<th width="25%">First Name</th>
			<th width="25%">Last Name</th>
			<th width="25%">Owner Id</th>
		</tr>
	</thead>
	
	
</table>
*/
?>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            table sample:
            <table class="table data_table_ajax" data-source="<?php echo site_url('contacts/get_by_ajax/id/first_name/last_name/owner_id'); ?>">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Owner Id</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<hr>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			table sample:
			<table class="table data_table" >
				<thead>
					<tr>
						<th>Id</th>
						<th>First Name</th>
					</tr>
				</thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Al</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lweanne</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Charliedog</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Chris</td>
                    </tr>

			</table>
		</div>
	</div>
</div>
<hr>







<div style="margin: 50px 50px">
    <label for="product_search">Product Search: </label>
    <input id="product_search" type="text" data-provide="typeahead">
</div>



<script>
    $(document).ready(function($) {
        // Workaround for bug in mouse item selection
        $.fn.typeahead.Constructor.prototype.blur = function() {
            var that = this;
            setTimeout(function () { that.hide() }, 250);
        };
 
        $('#product_search').typeahead({
            source: function(query, process) {
                return ['Apple', 'Banana', 'Clementine'];
            }
        });
    })
</script>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Your Contacts</h2>
			<form role="form">
				<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="exampleInputFile">File input</label>
          <select class="span3" data-provide="typeahead" data-items="4" style="display: none;">
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">HawaiÊ»i</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
          </select><input type="text" class="span3" data-items="4" autofocus="autofocus" autocomplete="off" data-value="AL">
      
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox"> Check me out
					</label>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>

<a data-toggle="modal" href="http://google.co.uk" data-target="#myModal" class="btn btn-primary btn-lg">Launch demo modal 1</a>
<a data-toggle="modal" href="http://google.co.uk" data-target="#myModal2" class="btn btn-primary btn-lg">Launch demo modal 2</a>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal 1</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal 2</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->