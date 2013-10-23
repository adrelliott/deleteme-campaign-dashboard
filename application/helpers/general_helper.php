<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}



/**
 * Generates the navbar html
 * $nav - string    The URI segment that the link should point to , e.g. contacts
 * $icon - string   The name of the font-awesome icon used for this link , e.g. 'user'
 * $display - strong    defaults to the name of the nav if not passed
 */

    function nav_bar_item($nav, $icon = FALSE, $display = FALSE) {
        //get the XXth uri
        $html = array();
        $html['current_url'] = explode('/', uri_string());
        $html['output'] = '';

        //set up the list class
        if ($nav == $html['current_url'][1])
            $html['output'] .= '<li class="active">';
        else  $html['output'] .= '<li class="">';

        //Set up the link
        $html['output'] .= '<a href="' . site_url($nav) . '">';

        //Set up the iconif ($nav == $html['current_url'][1])
        if ($icon)
            $html['output'] .= '<i class="icon-' . $icon . ' "></i> ';

        //Set the wording
        if ($display)
            $html['output'] .= $display;
        else $html['output'] .= ucwords($nav);

        //Close the tags
        $html['output'] .= '</a></li>';

        return $html['output'];

    }


