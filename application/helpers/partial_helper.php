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


//Eg will find 'relationship' in config['dropdowns'] by passing 
//    config('dropdowns', 'relationship')
//    
//    You can define a cusom_index too and pass it, e.g. 
//    $config['dropdowns'] = array(
//      'custom_index' => array(
//          'relationship' => {values},
//      )
//    )
if (!function_exists('config')) {
    
    function config($element, $config_item, $custom_index = FALSE)
    {
        $c = get_instance()->router->class;
        $m = get_instance()->router->method;
        $config = get_instance()->config->item($config_item);

        //Find the element in the config...
        //echo 'here it is';dump(element($config_item, $config[$c]));
        
        //... is it in $config[config_item][class][method]...?
        if ( !$custom_index && element($c, $config) && element($m, $config[$c]))
            $retval = element($element, $config[$c][$m]);

        //... is it in $config[config_item][class]...?
        elseif ( !$custom_index && element($c, $config) && element($element, $config[$c]))
            $retval = element($element, $config[$c]);

        //... is it in $config[config_item][class][custom_index]...?
        elseif ($custom_index && element($c, $config) && element($custom_index, $config[$c]))
            $retval = element($element, $config[$c][$custom_index]);

        //... is it in $config[config_item][custom_index]...?
        elseif ($custom_index && element($custom_index, $config))
           $retval = element($element, $config[$custom_index]);

        //... it must be $config[config_item][element]...?
        else $retval = element($element, $config);

        //Returns either the value or FALSE
        return $retval;
    }
}


if (!function_exists('controller')) {
    
    function controller($singular = FALSE)
    {
        $c = get_instance()->router->class;
        if ($singular)
            $c = singular($c);
            // $c = ucfirst(singular($c));

        //Return the controller name
        return $c;
    }
}

// Gets the id (usually the last segment)
if (!function_exists('id')) {
    
    function id($pos = FALSE)
    {
        return get_segment($pos);
    }
}

// Gets a segment from the URI - default to the last segment (often the id)
if (!function_exists('get_segment')) {
    
    function get_segment($pos = FALSE)
    {
        $uri = get_instance()->uri->segment_array();
        if ( ! $pos ) $pos = count($uri);

        return $uri[$pos];
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
            'client' => config('owner', 'owner_id'),
			//'client' => 22222,
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


