<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Use this file to set out client specific configs for the app
|--------------------------------------------------------------------------
|
*/

// What layout folder are we using? (Either bootstrap or Sangam)
$config['owner']['owner_id']	= '22220';

// What layout folder are we using? (Either bootstrap or Sangam)
$config['layout_folder']	= 'bootstrap';

// Set up the pageheaders
$config['pageheaders']	= array(
	'dashboard' => '',
	'contacts' => array(
		'index' => array(
			'icon' => 'user',
			'header' => 'All Your People', 
			'subtext' => 'Just <em>look</em> at the - sitting there all shiny and proud... (And the best bit? They\'re all yours!)'
			),
		'show' => array(
			'icon' => 'user',
			'header' => 'In-Depth', 
			'subtext' => 'Use the blue buttons to navigate around this contact\'s data'
			),
		'create' => array(
			'icon' => 'user',
			'header' => 'Create a Contact', 
			'subtext' => 'Add the basic details (more options on the next page).'
			),
		),
	'leads' => array(
		'index' => array(
			'icon' => 'briefcase',
			'header' => 'All Your Sales Leads', 
			'subtext' => 'Just think... if all of these leads are worth just £1m each, you\'re gonna be soooo rich...'
			),
		'show' => array(
			'icon' => 'briefcase',
			'header' => 'Let\'s make some money!', 
			'subtext' => 'Use this screen to track all activity associated to this sales opportunity'
			),
		'show_board' => array(
				'icon' => 'briefcase',
				'header' => 'All your leads', 
				'subtext' => 'Click on a lead to open a brief overview'
				),
			),
	
	);

//Set up dashboard tables
$sample_table_setup = array (
	'attributes' => array (
		'class' => 'table data-table1',
		'id' => 'xxx_table',
		'data-tableid' => 'xxx_table',	//Must the the same as id above
		'data-linkurl' => site_url('contacts/show'),	//Leave blank if you don't want the rows to be clickable
		'data-linkclass' => 'modal',	//Set the class of the <a> tag
		'data-deleteurl' => site_url('contacts/delete'),	//Leave blank to have no delete button - only works on non-ajax tables!
		'data-toggleurl' => site_url('contacts/toggle'),	//Leave blank to have no toggle button - only works on non-ajax tables!
		'data-htmlsource' => site_url('modal'),	//Sets a html-source attr in the <a> tag

		//Below these can be used ot overide certain default vals of the dataTable options
		// "data-DisplayLength" => 5,
		// "data-bDestroy" => true,
		// "data-sPaginationType" => "bootstrap",
		// "data-bLengthChange" => true,
		// "data-aLengthMenu" => [[5, 10, 25, 50], [5, 10, 25, 50]],
		// "data-aaSorting" => [],
		// "data-bProcessing" => true,
		// "data-bServerSide" => true,
		// "data-sAjaxSource" => site_url('path/to/ajax/json/output'),
		// "data-sServerMethod" => "POST",
		// "data-aoColumnDefs" => [],
		// "data-fnRowCallback" => false,
		),
	'columns' => array(
		'id' => '#',
		'first_name' => 'First Name',
		'last_name' => 'Last Name5',
		//'owner_id' => 'Owner Id',
	),
);


// Set up the tables for each index page
$config['index_tables']	= array(
	'contacts_table' => array(
		'attributes' => array(
			'class' => 'table data-table1',
			'id' => 'contacts_index',
			'data-tableid' => 'contacts_index',
			'data-linkurl' => site_url('contacts/show'),
			//'data-linkclass' => 'new-class class2',
			//'data-deleteurl' => site_url('url/to/delete'), //CANNOT use in ajax tables
			'data-htmlsource' => site_url('url/'),
			
			//'data-sAjaxSource' => 
			'data-bLengthChange' => '',
			"data-bProcessing" => true,
			"data-bServerSide" => true,
			"data-sAjaxSource" => site_url('ajax/contacts/get_table/id/first_name/last_name'),
			"data-sServerMethod" => "POST",
			//'data-target' => '#contacts/show/',
			//'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name',
			'last_name' => 'Last Name5',
			//'owner_id' => 'Owner Id',
			),
		),
	'contacts_table_backup' => array(
		'attributes' => array(
			'class' => 'table data-table server-side',
			'id' => 'contacts_index',
			'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'contacts/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name',
			'last_name' => 'Last Name5',
			//'owner_id' => 'Owner Id',
			),
		),
	'leads_table' => array(
		'attributes' => array(
			'class' => 'table data-table server-side',
			'id' => 'leads_index',
			'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'leads/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name lead',
			'last_name' => 'Last Name lead',
			//'owner_id' => 'Owner Id',
			),
		),
	'orders_table' => array(
		'attributes' => array(
			'class' => 'table data-table server-side',
			'id' => 'orders_index',
			'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'orders/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name order',
			'last_name' => 'Last Name order',
			//'owner_id' => 'Owner Id',
			),
		),
	'tasks_table' => array(
		'attributes' => array(
			'class' => 'table data-table server-side',
			'id' => 'tasks_index',
			'data-source' => site_url('ajax/contact_actions/get_table/id/action_title/action_type/completed?action_type=task'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'tasks/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'action_type' => 'Type',
			'action_title' => 'Task title index',
			'completed' => 'completed?'
			),
		),
	
	
	'dashboard' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		
		),
	'contacts' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		'contacts_table1' => array(
			'attributes' => array(
				'class' => 'table data-table server-side ',
				'id' => 'contacts_index',

				'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
				//'html-source' => site_url('contacts/show'),
				'data-link' => 'contacts/show/',
				//'data-target' => '#contacts/show/',
				'dropdown' => 0,
			),
			'columns' => array(
				'id' => '#',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				//'owner_id' => 'Owner Id',
				),
			),
		),
	'leads' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		),
	);



// Set up the tables for each index page
$config['other_tables']	= array(
	'contacts_table' => array(
		'attributes' => array(
			'class' => 'table data-table', //often open-modal
			'id' => 'contacts_index',
			//'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'contacts/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name',
			'last_name' => 'Last Name1',
			//'owner_id' => 'Owner Id',
			),
		),
	'leads_table' => array(
		'attributes' => array(
			'class' => 'table data-table',
			'id' => 'leads_index',
			'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			//'html-source' => site_url('contacts/show'),
			'data-link' => 'leads/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name lead',
			'last_name' => 'Last Name lead',
			//'owner_id' => 'Owner Id',
			),
		),
	'orders_table' => array(
		'attributes' => array(
			'class' => 'table data-table ',
			'id' => 'orders_index',
			//'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
			'html-source' => site_url('contacts/show'),
			//'data-link' => 'orders/show/',
			//'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name order',
			'last_name' => 'Last Name order',
			//'owner_id' => 'Owner Id',
			),
		),
	'tasks_table' => array(
		'attributes' => array(
			'class' => 'table data-table open-modal',
			'id' => 'task-table',
			//'table-id' => 'tasks-table',
			//'data-source' => site_url('ajax/contact_actions/get_table/id/action_title/action_type/completed?action_type=task'), 
			'html-source' => site_url('contact_actions/show'),
			'data-link' => 'tasks/show/',
			'data-target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'action_type' => 'Typerr4',
			'action_title' => 'Task title',
			'completed' => 'completed?'
			),
		),
	'notes_table' => array(
		'attributes' => array(
			'class' => 'table data-table1',
			'id' => 'notes_table',
			'data-tableid' => 'notes_table',	//Must the the same as id above
			'data-linkurl' => site_url('contact_actions/show'),	//Leave blank if you don't want the rows to be clickable
			'data-linkclass' => 'modal',	//Set the class of the <a> tag
			//'data-deleteurl' => site_url('contact_actions/delete'),	//Leave blank to have no delete button - only works on non-ajax tables!
			//'data-toggleurl' => site_url('contact_actions/toggle'),	//Leave blank to have no toggle button - only works on non-ajax tables!
			//'data-htmlsource' => site_url('modal'),	//Sets a html-source attr in the <a> tag

			//Below these can be used ot overide certain default vals of the dataTable options
			// "data-DisplayLength" => 5,
			// "data-bDestroy" => true,
			// "data-sPaginationType" => "bootstrap",
			// "data-bLengthChange" => true,
			// "data-aLengthMenu" => [[5, 10, 25, 50], [5, 10, 25, 50]],
			// "data-aaSorting" => [],
			// "data-bProcessing" => true,
			// "data-bServerSide" => true,
			// "data-sAjaxSource" => site_url('path/to/ajax/json/output'),
			// "data-sServerMethod" => "POST",
			// "data-aoColumnDefs" => [],
			// "data-fnRowCallback" => false,
			),
		'columns' => array(
			'id' => '#',
			//'action_type' => 'First Name',
			'action_description' => 'Last Name5',
			//'owner_id' => 'Owner Id',
		),
	),

		
	
	'dashboard' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		
		),
	'contacts' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		'contacts_table1' => array(
			'attributes' => array(
				'class' => 'table data-table server-side ',
				'id' => 'contacts_index',
				'table-id' => 'contacts_index',
				'data-source' => site_url('ajax/contacts/get_table/id/first_name/last_name'), 
				//'html-source' => site_url('contacts/show'),
				'data-link' => 'contacts/show/',
				//'data-target' => '#contacts/show/',
				'dropdown' => 0,
			),
			'columns' => array(
				'id' => '#',
				'first_name' => 'First Name',
				'last_name' => 'Last Name',
				//'owner_id' => 'Owner Id',
				),
			),
		),
	'leads' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		),
	);






/* pills */
$config['pills'] = array(
	'dashboard' => array(
		'column_1' => array(
			//'id' => 'Name' - note, the id is also the partial name,
			//e.g 'overview' => 'Overview' pulls in _row_overview.php partial
			'contacts' => 'Contacts',
			'leads' => 'Leads',
			'orders' => 'Orders',
			),	
		'column_2' => array(
			//'id' => 'Name' - note, the id is also the partial name,
			//e.g 'overview' => 'Overview' pulls in _row_overview.php partial
			'tasks' => 'Tasks',
			'stats' => 'Statistics',
			),
		),
	'contacts' => array(
		'column_1' => array(
			'overview' => 'Overview',
			'indepth' => 'In-Depth',
			'optins' => 'Opt-Ins',
			'notes' => 'Notes',
			'links' => 'Links',
			),	
		'column_2' => array(
			//'id' => 'Name' - note, the id is also the partial name,
			//e.g 'overview' => 'Overview' pulls in _row_overview.php partial
			'tasks' => 'Tasks1',
			'orders' => 'Orders2',
			'roles' => 'Roles3',
			'tags' => 'Tags',
			'leads' => 'Leads',
			),
		),
	'leads' => array(
		'column_1' => array(
			'overview' => 'Overview',
			'indepth' => 'In-Depth',
			'optins' => 'Opt-Ins',
			'notes' => 'Notes',
			'links' => 'Links',
			),	
		'column_2' => array(
			//'id' => 'Name' - note, the id is also the partial name,
			//e.g 'overview' => 'Overview' pulls in _row_overview.php partial
			'tasks' => 'Tasks1',
			'orders' => 'Orders2',
			'roles' => 'Roles3',
			'tags' => 'Tags',
			'leads' => 'Leads',
			),
		),
		
	);


// Extra config itesm
$config['extras']	= array(
	'include_in_header' => array(
		//E.g. 'script' => 'Path_to_script' (from site_url())
		'stylesheet' => 'assets/clients/' . $config['owner']['owner_id'] . '/extra_css.css',
		),
	'include_in_footer' => array(
		//E.g. 'script' => 'Path_to_script' (from site_url())
		),
	);


// Set up the extra actions (these are the dropdowns on the top right of each page)
$config['extraactions']	= array(
	'dashboard' => array(
		'index' => array(
			'dropdown' => array(
				'contacts/create' => '..create a new contact',
				'xx'	=> '..create a new lead',
				'' => '...send some emaisl to contacts'				),
			),
		),
	'contacts' => array(
		'index' => array(
			'dropdown' => array(
				'contacts/create1' => 'Create a new Contact',
				'contacts/create2' => 'Create a new Contact22',
				'contacts/create3' => 'Create a new Contact33',
				),
			),
		'show' => array(
			'dropdown' => array(
				'contacts/create' => 'Create a new Contact',
				),
			),
		),
	'leads' => array(
		'index' => array(
			/*'dropdown' => array(
				'contacts/create' => 'Create a new Contact',
				'contacts/delete' => 'Delete a new Contact',
				),*/
			),
		'show' => array(
			'dropdown' => array(
				'contacts/create' => 'Create a new Contact lead/show',
				),
			),
		),
	);










































///maybe delete these...?
$config['nav_sets'] = array(
	'contacts' => array(
		'overview' => 'Overview',
		'indepth' => 'In-Depth',
		'optins' => 'Opt-Ins',
		'notes' => 'Notes',
		'links' => 'Links',
		),
	'contact_actions' => array(
		'tasks' => 'Tasks1',
		'orders' => 'Orders2',
		'roles' => 'Roles3',
		'tags' => 'Tags',
		'leads' => 'Leads',
		),
	'dashboard1' => array(
		'contacts' => 'Contacts',
		'leads' => 'Leads',
		'orders' => 'Orders',
		),
	'dashboard2' => array(
		'tasks' => 'Your Tasks',
		'stats' => 'Statistics',
		),
	);



// Set up the column 1 on a show page
$config['column1']	= array(
	'dashboard' => array(
		'index' => array(
			'pills' => array(
				'contacts' => 'Contacts',
				'leads' => 'Leads',
				'orders' => 'Orders',
				),
			),
		),
	'contacts' => array(
		'show' => array(
			'pills' => array(
				'overview' => 'Overview',
				'indepth' => 'In-Depth',
				'optins' => 'Opt-Ins',
				'notes' => 'Notes',
				'links' => 'Links',
				),
			),
		),
	'leads' => array(
		'index' => array(
			/*'dropdown' => array(
				'contacts/create' => 'Create a new Contact',
				'contacts/delete' => 'Delete a new Contact',
				),*/
			),
		'show' => array(
			'pills' => array(
				'overview' => 'Overview',
				'indepth' => 'In-Depth',
				'optins' => 'Opt-Ins',
				'notes' => 'Notes',
				'links' => 'Links',
				),
			),
		),
	);

// Set up the column 2 on a show page
$config['column2']	= array(
	'dashboard' => array(
		'index' => array(
			'pills' => array(
				'tasks' => 'Your Tasks',
				'stats' => 'Statistics',
				),
			),
		),

	'contacts' => array(
		'show' => array(
			'pills' => array(
				'tasks' => 'Tasks1',
				'orders' => 'Orders2',
				'roles' => 'Roles3',
				'tags' => 'Tags',
				'leads' => 'Leads',
				),
			),
		),
	'leads' => array(
		'index' => array(
			/*'dropdown' => array(
				'contacts/create' => 'Create a new Contact',
				'contacts/delete' => 'Delete a new Contact',
				),*/
			),
		'show' => array(
			'pills' => array(
				'tasks' => 'Tasks1',
				'orders' => 'Orders2',
				'roles' => 'Roles3',
				'tags' => 'Tags',
				'leads' => 'Leads',
				),
			),
		),
	);



// What layout folder are we using? (Either bootstrap or Sangam)
//$config['layout_folder']	= 'bootstrap';

// What layout folder are we using? (Either bootstrap or Sangam)
//$config['layout_folder']	= 'bootstrap';