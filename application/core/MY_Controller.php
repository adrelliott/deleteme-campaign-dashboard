<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A base controller for CodeIgniter with view autoloading, layout support,
 * model loading, helper loading, asides/partials and per-controller 404
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-controller
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class My_Controller extends CI_Controller
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * The main model for this contorller class. E.g. if its 'contacts', then the 
     * model we use is 'contact'
     */
    protected $main_model = '';


    /**
     * The current request's view. Automatically guessed
     * from the name of the controller and action
     */
    protected $view = '';

    /**
     * An array of variables to be passed through to the
     * view, layout and any asides
     */
    protected $data = array();

    /**
     * The name of the layout to wrap around the view.
     */
    protected $layout;

    /**
     * An arbitrary list of asides/partials to be loaded into
     * the layout. The key is the declared name, the value the file
     */
    protected $asides = array();

    /**
     * A list of models to be autoloaded
     */
    protected $models = array();

    /**
     * A formatting string for the model autoloading feature.
     * The percent symbol (%) will be replaced with the model name.
     */
    protected $model_string = '%_model';

    /**
     * A list of helpers to be autoloaded
     */
    protected $helpers = array();

    /* --------------------------------------------------------------
     * GENERIC METHODS
     * ------------------------------------------------------------ */

    /**
     * Initialise the controller, tie into the CodeIgniter superobject
     * and try to autoload the models and helpers
     */
    public function __construct()
    {
        parent::__construct();

        //Set owner_id and load vars
        define ('OWNER_ID', 22220); ///////////////////////////////////Set this on login!
        $this->config->load('client_configs/' . OWNER_ID);
        $this->load->helper('inflector');
        //$this->load->helper('partial');

        //Show profiler
        $this->output->enable_profiler(ENVIRONMENT === 'development' && isset($_GET['debug']));

        //Set the layout file. (overide with $layout = FALSE in a controller/method)
        //$this->layout = 'layouts/' . $this->config->item('layout_folder') . '/' . $this->router->class;

        $this->_load_models();
        $this->_load_helpers();
    }

    /* --------------------------------------------------------------
     * VIEW RENDERING
     * ------------------------------------------------------------ */

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

    /**
     * Automatically load the view, allowing the developer to override if
     * he or she wishes, otherwise being conventional.
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
            $view = (!empty($this->view)) ? view($this->view) : view($this->router->method);

            //$view = (!empty($this->view)) ? $this->config->item('layout_folder') . '/' . $this->view : $this->config->item('layout_folder') . '/' . $this->router->directory . $this->router->class . '/' . $this->router->method;

            // Load the view into $yield
            $data['yield'] = $this->load->view($view, $this->data, TRUE);

            // Do we have any asides? Load them.
            if (!empty($this->asides))
            {
                foreach ($this->asides as $name => $file)
                {
                    $data['yield_'.$name] = $this->load->view($file, $this->data, TRUE);
                }
            }

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

    /* --------------------------------------------------------------
     * MODEL LOADING
     * ------------------------------------------------------------ */

    /**
     * Load models based on the $this->models array
     */
    private function _load_models()
    {
        foreach ($this->models as $model)
        {
            $this->load->model($this->_model_name($model), $model);
        }
    }

    /**
     * Returns the loadable model name based on
     * the model formatting string
     */
    protected function _model_name($model)
    {
        return str_replace('%', $model, $this->model_string);
    }
    
    /**
     * Returns the main model name based on
     * the model formatting string
     */
    protected function _main_model_name()
    {
        $this->main_model = singular($this->router->class);
    }

  
    /* --------------------------------------------------------------
     * HELPER LOADING
     * ------------------------------------------------------------ */

    /**
     * Load helpers based on the $this->helpers array
     */
    private function _load_helpers()
    {
        foreach ($this->helpers as $helper)
        {
            $this->load->helper($helper);
        }
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


    public function generate_datatable()
    {
        //$this->load->library('datatables');
        //return $this->datatables->generate_table(array('id', 'first_name'));
    }

    /**
     * Sets up an ajax call for datatables
     * @return [json] [a JSON array for the datatables plugin to display]
     */
    /*public function get_by_ajax()
    {
        $this->layout = FALSE;
        $this->view = FALSE;
        $class_name = singular($this->router->class);
        
        //Get the segments as an array and unset the first 3 (the class & method)
        $cols = $this->uri->segment_array();
        unset($cols[0]);    
        unset($cols[1]);    //I know - there must be a better way to do this?
        unset($cols[2]);

        $cols = implode(',', $cols);

        //Echo out the JSON array
        echo $this->$class_name->get_datatables_ajax($cols);
    }
    */

}