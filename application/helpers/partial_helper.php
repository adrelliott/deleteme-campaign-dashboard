<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 	Use this helper to manage partials


if (!function_exists('partial')) {
    
    function partial($name, $data = array(), $loop = FALSE)
    {
    	//set up the paths
    	$path = get_path($name, 'partial');
    	$template = hunt_file($path);
    	
    	//load the view and return it as a string
    	return get_instance()->load->view($template, $data, TRUE);
    }
}

if (!function_exists('view')) {
    
    function view($name, $data = array(), $loop = FALSE)
    {
    	//set up the paths
    	$path = get_path($name);

    	//Return the path to the view file
    	return hunt_file($path);
    }
}

if (!function_exists('controller')) {
    
    function controller($singular = FALSE)
    {
    	$r = get_instance()->router->class;
    	if ($singular)
    		$r = ucfirst(singular($r));

    	//Return the controller name
    	return $r;
    }
}










if (!function_exists('get_path')) {

	function get_path($name, $type = 'view')
	{
		$r = array(
			'to' => APPPATH . 'views/',
			'partial' => 'partials/',
			'view' => '',
			'folder' => get_instance()->config->item('layout_folder'),
			'client' => '22222',
			'class' => array(
						'partial' => '_' . get_instance()->router->class,
						'view' => get_instance()->router->class),
			'default' => array('partial' => '_defaults', 'view' => 'defaults'),
			); 

		$r['client'] = $r[$type] . $r['folder'] . '/' . $r['client'] . '/' . $r['class'][$type] . '/' . $name;
		$r['class'] = $r[$type] . $r['folder'] . '/' . $r['class'][$type] . '/' . $name;
		$r['default'] = $r[$type] . $r['folder'] . '/' . $r['default'][$type] . '/' . $name;

	   	return $r;
	}
}

if (!function_exists('hunt_file')) {

	function hunt_file($path)
	{
		$template = '';

		// 1. Try the client's path first...
    	if (file_exists ($path['to'] . $path['client'] . '.php'))
    		$template = $path['client'];

    	// 2. Now try the class
		elseif (file_exists ($path['to'] . $path['class'] . '.php'))
    		$template = $path['class'];

    	// 3. Give up and use the default
    	else $template = $path['default'];

    	return $template;
	}
}


