<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Use this file to set out client specific configs for the app
|--------------------------------------------------------------------------
|
*/

// What layout folder are we using? (Either bootstrap or Sangam)
$config['owner_id']	= '22220';

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
		'data_link' => 'contacts/show/',
		'scrolly' => 100,
		'columns' => array(
			'id' => '#',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			//'owner_id' => 'Owner Id',
			),
		),
	'leads_table' => array(
		'table_id' => 'leads_dashboard',
		'data_source' => 'ajax/contacts/get_table/id/first_name/last_name', 
		'data_link' => 'contacts/show/',
		'scrolly' => 100,
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
		'data_link' => 'contacts/show/',
		'scrolly' => 100,
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
		),
	'leads' => array(
		//Overwrite the default tables above for each page by re-declaring it here...
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
				'contacts/create' => 'Create a new Contact',
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

// Extra config itesm
$config['extras']	= array(
	'include_in_header' => array(
		//E.g. 'script' => 'Path_to_script' (from site_url())
		'stylesheet' => 'assets/clients/' . $config['owner_id'] . '/extra_css.css',
		),
	'include_in_footer' => array(
		//E.g. 'script' => 'Path_to_script' (from site_url())
		),
	);


// What layout folder are we using? (Either bootstrap or Sangam)
//$config['layout_folder']	= 'bootstrap';

// What layout folder are we using? (Either bootstrap or Sangam)
//$config['layout_folder']	= 'bootstrap';