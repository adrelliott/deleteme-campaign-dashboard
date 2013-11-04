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


// Set up the tables
$config['tables']	= array(
	'contacts_table' => array(
		'table_id' => 'contacts_dashboard',
		'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
		'html_source' => 'contacts/show/',
		'data_link' => 'contacts/show/',
		'data_target' => '#contacts/show/',
		'dropdown' => 0,
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			//'owner_id' => 'Owner Id',
			),
		),
	'tasks_table' => array(
		'attributes' => array(
			'class' => 'table data-table',
			'id' => 'contacts_dashboard',
			'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
			'html_source' => 'contacts/show/',
			'data_link' => 'contacts/show/',
			'data_target' => '#contacts/show/',
			'dropdown' => 0,
			),
		'columns' => array(
			'id' => '#',
			'action_title' => 'Title',
			'action_description' => 'Desc',
			//'owner_id' => 'Owner Id',
			),
		),
	'leads_table' => array(
		'table_id' => 'leads_dashboard',
		'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
		'html_source' => 'contacts/show/',
		'data_link' => 'contacts/show/',
		'data_target' => '#contacts/show/',
		'link_class' => 'class',
		'dropdown' => 0,
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Namelead',
			'last_name' => 'Last Name',
			//'owner_id' => 'Owner Id',
			),
		),
	'orders_table' => array(
		'table_id' => 'orders_dashboard',
		'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
		'html_source' => 'contacts/show/',
		'data_link' => 'contacts/show/',
		'data_target' => '#contacts/show/',
		'link_class' => 'class',
		'dropdown' => 0,
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Nameorder',
			'last_name' => 'Last Name',
			//'owner_id' => 'Owner Id',
			),
		),
	'sample_table' => array(
		'table_id' => 'sample_dashboard',
		'data_source' => '', 
		'html_source' => 'contact_actions/show/tag/',
		'data_link' => 'contacts/show/',
		'data_target' => '#contactaction-modal',
		'link_class' => 'class',
		'dropdown' => 0,
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Nameorder',
			'last_name' => 'Last Name',
			//'owner_id' => 'Owner Id',
			),
		),
	'dashboard' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		
		),
	'contacts' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
		'contacts_table' => array(
			'table_id' => 'contacts_dashboard',
			'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
			'html_source' => 'contacts/show/',
			'data_link' => 'contacts/show/',
			'data_target' => '#contacts/show/',
			'link_class' => 'class',
			'dropdown' => 1,
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
		'leads_table' => array(
			'table_id' => 'leads_dashboard',
			'data_source' => 'ajax/contacts/get_table/id/first_name/last_name',
			'html_source' => 'contacts/show/', 
			'data_link' => 'contacts/show/',
			'data_target' => '#contacts/show/',
			'link_class' => 'class',
			'dropdown' => 1,
			'columns' => array(
				'id' => '#',
				'first_name' => 'First Namelead',
				'last_name' => 'Last Name',
				//'owner_id' => 'Owner Id',
				),
			),
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
			//<list>'tasks' => 'Tasks',
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