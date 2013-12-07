<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * Default settings. (Override using a private variable in a controller class)
     */


    public $id = FALSE; //The id of the current record
    public $data = array(); //Data array to pass through to the view 
    public $view = FALSE;   //The current view file
    public $layout = 'application'; //the layout file
    public $presenter = '';     //The presenter file
    public $main_model = '';    //Holds the main model name. Can be set to FALSE to not load a model
    public $owner_id = '';  //The id fo the owner of the data
    public $q;  //Object to hold the results of all queries
    public $current_user;  //Object to hold the details of the current user


    public $view_settings = array(  //Note: if not set here, it defaults to the method name, Overwite in controllers
        'create' => 'show', 'edit' => 'no-view', 'delete' => 'no-view', 'toggle' => 'no-view'
        );

    public $models = array( //Get all records from these tables every tmie the page loads
        'user' => array(
            'id_as_key' => TRUE),
        'product' => array(
            'id_as_key' => TRUE)
        );

    public $retval; //Holds the message and the returned data that's passed to redirect() or back via ajax 


    public $test = 'from MY_COntrollr';

    /* --------------------------------------------------------------
     * ALL METHODS
     * ------------------------------------------------------------ */

    /**
     * Default methods. (Override or extend methods in a controller class)
     * (to extend, just use ' return parent::{method_name}({var}) ')
     */


    public function __construct()
    {
        parent::__construct();
        //Test to see if we are logged in
        //$this->current_user->id = 0;    // ******** this needs fixing!!!!!!!!!!!!!!!!!!!**************
        
        $this->q->user_id = 1;
        $this->q->user_first_name = 'Admin';


        // die();

        //Set up the views, models, & layouts
        $this->set_view();
        $this->set_models();
        $this->set_main_model();
        $this->set_layout();
        $this->set_presenter();

        //Set up id if passed & numeric., otherwise set to $_POST (defaults as FALSE)
        $this->set_owner_id();

        //Set up other vars & load other classes
        $this->load_presenter();
        $this->load_main_model();
        $this->retval->message = '[uhoh]';

        //Show profiler if requested (in dev env only)
        $this->output->enable_profiler(ENVIRONMENT === 'development' && isset($_GET['debug']));

        ###### debug #######
        // $_POST = array('viewr' => 'fkjdvbajb');
        // echo "<br/>The view is :";dump($this->view); 
        // echo ", the layout is:"; dump($this->layout);
        // echo ", the presnter is:"; dump($this->presenter);
        // echo '<p>Herecomes PRVATE modesl, layout, viewsettings, presneter and main model</p>';
        // dump($this->_models);
        // dump($this->_layout);
        // dump($this->_view_settings);
        // dump($this->_presenter);
        // dump($this->_main_model);

        // dump($this->models);
        // dump($this->layout);
        // dump($this->view_settings);
        // dump($this->presenter);
        // dump($this->main_model);
        
        // $_POST['test'] = 'from_post';
        // dump($this->test);

        ###### debug #######

    }




    /* --------------------------------------------------------------
     * CORE METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are the base methods for all controllers.
     *
     * Index, show, create, edit, delete, toggle 
     */

    public function index()
    {
        $this->create_presenter();
    }

    public function show($id = FALSE)
    {
        $this->set_id($id);

        //exit out of the method if no main model is set
        if($this->main_model === FALSE) return;

        //Get the main record
        $this->q = $this->m->get($this->id);

        //If we've not got a record of that id, go to index...
        if (! isset($this->q->id))
        {
            $this->retval->message = '[not_found]';
            $this->redirect('index');
        }
        else 
        {
            //Set id & get associated records
            $this->id = $this->q->id;

            foreach ($this->models as $model => $attr)
            {   
                $this->load->model($this->_model_name($model), $model);
                $this->q->{plural($model)} = $this->$model->list_records($this->models[$model]);
            }

            //create presenter object & hand over to the layout
            $this->create_presenter();  
        }   
    }


    public function create()
    {
        foreach ($this->models as $model => $attr)
        {   
            $this->load->model($this->_model_name($model), $model);
            $this->q->{plural($model)} = $this->$model->list_records($this->models[$model]);
        }
        
        $this->create_presenter();
    }

    public function edit($id = FALSE)
    {
        $this->set_id($id);

        //Is it an UPDATE...
        if ($id && $this->input->post())
        {
            //If we have passed an id and we have POST data, then its an update
            if ($this->m->update($id, $this->input->post()))
            {
                $this->retval->message = '[updated]';
                //Query again for the data - don't trust input!
                $this->retval->q = $this->m->get($id);
            }
        }
            //...Must be an INSERT...
        elseif (!$id && $this->input->post())
        {
            //Otherwise, if we only have POST data its an insert
            if ($id = $this->m->insert($this->input->post()))
            {
                $this->retval->message = '[created]';
                //Query again for the data - don't trust input!
                $this->retval->q = $this->m->get($id);
                $this->id = $this->retval->q->id;
            }   
        }
        //...no idea what it is - show error
        else return show_error('Uh oh. Something bad has happened (no POST or id');

        //...sooooo... what now?
        $this->redirect('show');
    }


    public function delete($id = FALSE)
    {
        $this->set_id($id);

        if ($this->m->delete_record($this->id))
        {
            $this->retval->message = '[deleted]';
            $this->redirect();
        }
        else show_error('delete failed');
    }

    public function toggle($col = 'completed', $id = FALSE)
    {
        $this->set_id($id);

        //toggle the field
        if ($val = $this->m->toggle_value($col))
            $this->redirect('view');
        
        //error management!!!!
    }


    /* --------------------------------------------------------------
     * BASE METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are used in the base methods
     */
    
    //Update base settings with newer settings
    // public function update_variable($var_name, $new_val = FALSE)
    // {
    //     if ( ! $new_val)    //Test for a passed value
    //     {
    //         if ( ! $new_val = $this->input->post($var_name))    //Test for var in $_POST
    //         {
    //             if( ! $new_val = $this->config->item($var_name))    //Test for var in user_config
    //             {
    //                 if (isset($this->{'_' . $var_name}))    //Test for var set up in controller
    //                 {
    //                     $new_val = $this->{'_' . $var_name};
    //                 }
    //                 else $new_val = $this->{$var_name}; //If none of the above set it the val in this class
    //             }
    //         }
    //     }

    //     //test for 'none' and set to FALSE
    //     if ($new_val == 'none') $new_val = FALSE;
    //     $this->{$var_name} = $new_val;
    // }

    
     public function set_layout()
    {
        $layout = 'default';

        if ($this->input->post('modal'))    //...Is it a modal?
            $layout = 'modal';
        elseif (isset($this->_layout))
            $layout = $this->_layout;

        if ($layout !== 'default') $this->layout = $layout;    
    } 

    public function set_presenter()
    {
        $this->presenter = singular($this->router->class);

        if (isset($this->_presenter))
        {
            $this->presenter = $this->_presenter;
        }
        elseif (isset($this->_presenter) &&  $this->_presenter === FALSE)
        {
            $this->presenter = FALSE;   
        }
    }

    public function set_main_model()
    {
        $this->main_model = singular($this->router->class);

        if (isset($this->_main_model))
        {
            $this->main_model = $this->_main_model;
        }
        elseif (isset($this->_main_model) &&  $this->_main_model === FALSE)
        {
            $this->main_model = FALSE;   
        }    }


    public function set_models()
    {
        $models = $this->models;
        if (isset($this->_models))
        {
            foreach ($this->_models as $m => $attr)
            {
                $models[$m] = $attr;    
            }
            $this->models = $models;
        }
    }
    

    // public function set_presenter_old()
    // {
    //     //Set up the $presenter var
    //     $presenter = $this->presenter;
    //     dump($presenter);
    //     dump($this->_presenter);

    //     //Override with the presenter passed in this class, if set
    //     if (isset($this->_presenter) && $this->presenter === 'FALSE' )
    //     {
    //         $presenter = $this->_presenter;
    //         echo ',,this presenter is set';
    //     }
            


    //     dump($presenter);
    //     //If we've set $this->_presenter as false, then exit
    //     if ($presenter === FALSE) return;

    //     //If no presenter has been set, then set the presenter as the singular router class name
    //     if ($presenter === '')
    //     {
    //         $presenter = singular($this->router->class);
    //     }

    //     dump($presenter);
    //     $this->presenter = $presenter;
    // }



    public function set_view()
    {
        //Merge in this class's private view array with the defaultone set in MY_Controller
        $view_settings = $this->view_settings;
        if (isset($this->_view_settings) && is_array($this->_view_settings))
        {
            foreach ($this->_view_settings as $v => $attr)
            {
                $view_settings[$v] = $attr;
            }   
        }

        //Now test for $_POST['view'] & set it if passed...
        if ( ! $view = $this->input->post('view'))
        {
            $view  = $this->router->method;

            //... else look up the view in $view_settings and set it
            if ( $v = element($view, $view_settings, FALSE) )
            {
                if ($v == 'no-view')
                    $view = FALSE;

                else $view = $v;
            }
        }
        
        $this->view = $view;
    }


    public function set_owner_id()
    {
        $owner_id = 22220;
        //define ('OWNER_ID', $owner_id); ///////////////////////////////////Set this on login!
        
        $this->owner_id = $owner_id;
        $this->config->load('client_configs/' . $owner_id);
    }


    public function set_id($id)
    {
        //Checks for an id passed, and sets to post if none passed
        if ( ! $this->id = $id) $this->id = $this->input->post('id');
    }

   

     /**
     * Load presenter based on the $this->presenter var
     */
    public function load_presenter()
    {
        if ($this->presenter !== FALSE)
        {
            //load the presenter
            require_once (APPPATH . 'presenters/' . strtolower($this->presenter  . '_presenter') . '.php');
        }
    }

    public function load_main_model()
    {
        if ($this->main_model !== FALSE)
        {
            $this->load->model($this->main_model . '_model', 'm');
        }
    }

    // public function load_main_model()
    // {
    //     $main_model = $this->main_model;
    //     if (isset($this->_main_model))
    //         $main_model = $this->_main_model;

    //     if ($main_model === FALSE) return;
    //     elseif ($main_model === '') $main_model = singular($this->router->class);

    //     $this->load->model($this->_model_name($main_model), 'm');
    // }


    /**
     * Automatically load the view. Looks for it in 
     * 1. 
     */
    protected function _load_view()
    {
        // If $this->view == FALSE, we don't want to load anything
        if ($this->view !== FALSE)
        {
            //pass through the contents of $this->data for debug
            if (ENVIRONMENT !== 'production') $this->data['debug'] = $this->data;

            // If $this->view isn't empty, load it. If it is, try and guess based on the controller and action name 
            // (****NOTE*** view() is in helpers/partial_helper.php)
            $view = (! empty($this->view)) ? view($this->view) : view($this->router->method);

            // Load the view into $yield
            $data['yield'] = $this->load->view($view, $this->data, TRUE);

            

            // Load in our existing data with the asides and view
            $data = array_merge($this->data, $data);
            $layout = FALSE;

            // If we didn't specify the layout, try to guess it
            if (!isset($this->layout))
            {
                if (file_exists(APPPATH . 'views/layouts/' . $this->config->item('layout_folder') . '/' . $this->router->class . '.php'))
                {
                    $layout = 'layouts/' . $this->config->item('layout_folder')  . '/' . $this->router->class;
                }
                else
                {
                    $layout = 'layouts/' . $this->config->item('layout_folder') .'/application';
                }
            }

            // If we did, use it
            else if ($this->layout !== FALSE)
            {
                $layout = 'layouts/' . $this->config->item('layout_folder') .'/' . $this->layout;
            }

            // If $layout is FALSE, we're not interested in loading a layout, so output the view directly
            if ($layout == FALSE)
            {
                $this->output->set_output($data['yield']);
            }

            // Otherwise? Load away :)
            else
            {
                $this->load->view($layout, $data);
            }
        }
    }

   
    public function array_to_object($array)
    {
        $object = '';
        if (is_array($array))
        {
            foreach ($array as $k => $v)
            {
                $object->$k = $v;
            }
        }
        return $object;
    }

    
    public function create_presenter()
    {
        if ($post = $this->input->post())
                $this->q = (object)array_merge((array)$this->input->post(), (array) $this->q);
        
        //Create the presenter name ready to load it
        $p = $this->presenter . '_presenter';
        $this->data['p'] = new $p($this->q);    
    }

    
    /**
     * Returns the loadable model name appended with '_model'
     */
    protected function _model_name($model)
    {
        return $model . '_model';
    }


    public function redirect($view = 'index')
    {
        //if its ajax, just echo the retval...
        if ($this->input->is_ajax_request())
        {
            echo json_encode($this->retval);
            return;
        }

        //...else redirect the page
        $url = $this->router->class;
        //Set up the URL
        if ($view == 'show')
        {
            $url = $url . '/show/' . $this->id;
        }

        //redirect
        $this->session->set_flashdata($this->retval);
        redirect(site_url($url));
    }


     /**
     * Override CodeIgniter's despatch mechanism and route the request
     * through to the appropriate action. Support custom 404 methods and
     * autoload the view into the layout.
     */
    public function _remap($method)
    {
        if (method_exists($this, $method))
        {
            call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
        }
        else
        {
            if (method_exists($this, '_404'))
            {
                call_user_func_array(array($this, '_404'), array($method));
            }
            else
            {
                show_404(strtolower(get_class($this)).'/'.$method);
            }
        }

        $this->_load_view();
    }






/* --------------------------------------------------------------
     * Tables & pagination
     * ------------------------------------------------------------ */

    /**
     * Sets up pagination (uses application/config/pagination.php to customise for Bootstrap)
     */
    public function pagination($config)
    {
        $retval = array();

        $this->pagination->initialize($config);
        $retval['pagination_links'] = $this->pagination->create_links();
        $retval['pagination_text'] = 'Viewing records ' . $config['offset'] . ' to ';
        $retval['pagination_text'] .= $config['offset'] + $config['per_page'];
        $retval['pagination_text'] .= ' of ' . $config['total_rows'] . ' records';

        return $retval;
    }


}