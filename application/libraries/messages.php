<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
  /**
  * Mesages Library
  *s
  * This library uses the flashdata class to show messages where they exist
  *
  * @package    CodeIgniter
  * @subpackage libraries
  * @category   library
  * @version    0.1
  * @author     Al Elliott
  */

  class Messages
  {
    /**
    * Global container variables 
    *
    */
    private $ci;
    private $message;
    private $css;
    private $html;
    /**
    * Copies an instance of CI
    */
    public function __construct()
    {
      //die('gothere');
      $this->ci =& get_instance();
      $this->html = '';
    }

    public function set_css()
    {
      //Check to see if we've passed a css class
        if ($this->ci->session->flashdata('message_type')) 
            $this->css = $this->ci->session->flashdata('message_type');

        //...if not, and if there's not one set already by a shortcode then 
        //create a default
        elseif ( ! isset($this->css)) $this->css = 'info';
        
        //Build the message HTML
        $this->html = '<div class="alert alert-' . $this->css . '">';
        $this->html .= $this->message;
        $this->html .= '</div>';
    }

    public function show()
    {
        if ($this->ci->session->flashdata('message'))
        {
            $this->set_content();
            $this->set_css();
        }
      
        return $this->html;
    }

    public function set_content()
    {
        $this->message = $this->ci->session->flashdata('message');

        //See if we've passed a message shortcode
        switch ($this->message)
        {
            case '[updated]':
                $this->message = '<strong>Yay!</strong> I\'ve saved your changes!';
                $this->css = 'success';
                break;
                
            case '[created]':
                $this->message = '<strong>Woo hoo!</strong> New record created!';
                $this->css = 'success';
                break;
                
            case '[deleted]':
                $this->message = '<strong>Well that\'s done it.</strong> That record has gone forever. Happy now?';
                $this->css = 'info';
                break;
                
            case '[not_found]':
                $this->message = '<h4>Oh Bum.</h4> I\'ve looked everywhere and just can\'t find what you\'re looking for. I\'m really sorry.';
                $this->css = 'danger';
                break;
                
            case '[uhoh]':
                $this->message = '<strong>Oh bum. Something bad has happened.</strong><br/> I tried to make those changes but I couldn\'t find that record. I\'m really, really sorry. <br/><br/>(If this happens lots, maybe your should tell the Dallas Matthews crew...)';
                $this->css = 'danger';
                break;

        } 
    }

  }