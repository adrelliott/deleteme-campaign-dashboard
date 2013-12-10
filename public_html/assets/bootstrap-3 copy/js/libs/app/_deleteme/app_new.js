
	/* Datatables */

    $('.data-table').each(function() {
    	//Set up default options
    	var dataTableOptions = {
			"iDisplayLength":5,
			"bDestroy":true,
			"sPaginationType":"bootstrap",
			"bLengthChange":true,
			"aLengthMenu":[[5, 10, 25, 50], [5, 10, 25, 50]],
			"aaSorting":[],
			"bProcessing":true,
			"bServerSide":true,
			"sAjaxSource":false,
			"sServerMethod":"POST",
			"aoColumnDefs":[],
			"fnRowCallback":false
		};

		//Set up the vars for this table
		var attributes = {
			"tableid" : "",
			"deleteurl": false,
			"toggleurl": false,
			"htmlsource": false,
			"linkclass": false,
			"linkurl": false
		};

		//Iterate over the attributes object and test to see if we've passed a new attribute
		jQuery.each(attributes, function(i, value) {
			if ($(this).data(i)){
				attributes.i = $(this).data(i);	//Overwrite with the new value
			}
		});

		//Now set up the aoColumnDefs
		if (attributes[linkurl]) {
			dataTableOptions.aoColumnDefs = [
				{
					"aTargets": ["_all"],
					"mRender": function (data, type, full) {
						return '<a href="'+attributes.linkurl+full[0]+'" class="'+attributes.linkclass+'" data-id="'+full[0]+'" html-source="'+attributes.htmlsource+'">'+data+'</a>';
					}
				}
			];
		}
		
		//Now apply it all
		$('#' + attributes.tableid).dataTable( dataTableOptions );

	});