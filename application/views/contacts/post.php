
		<link href="<?php echo site_url('assets/css/demo_table.css'); ?>" rel="stylesheet">
		<script type="text/javascript" charset="utf-8">
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
		</script>
	
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