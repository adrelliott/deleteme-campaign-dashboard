<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables example</title>
		<link href="<?php echo site_url('assets/css/demo_table.css'); ?>" rel="stylesheet">
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "<?php echo site_url('contacts/get_by_ajax'); ?>",
					"sServerMethod": "POST"
				} );
			} );
		</script>
	</head>
	<body id="dt_example">
		<div id="container">
			<div class="full_width big">
				DataTables server-side processing with POST example
			</div>
			
			<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th width="20%">Id</th>
			<th width="25%">First Name</th>
			<th width="25%">Last Name</th>
			<th width="25%">Owner Id</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
	</tbody>
	
</table>
			</div>
			
	</body>
</html>