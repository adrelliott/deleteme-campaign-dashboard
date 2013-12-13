<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller for contacts table
*/

class Broadcasts extends MY_Controller
{

	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * These vars can overwrite the default ones set in MY_Controller
     *
     * NOTE: Set the scope as 'protected' here
     */
    
	protected $_models = array(
		'saved_search' => array(
            'id_as_key' => true,
			),
		'template' => array(
			),
		);

    protected $_merge_fields = array(
        'id' => 'contacts.id',
        'first_name' => 'contacts.first_name',
        'last_name' => 'contacts.last_name',
        'email' => 'contacts.email_1',
        'email_2' => 'contacts.email_2',
        );

    //protected $view_settings('analytics' => '');
	

	/* --------------------------------------------------------------
     * METHODS
     * ------------------------------------------------------------ */

    /**
     * These methods are defined in MY_Controller. You can extend them (return parent::{method_name}() ) or over-ride them by defning a new method here.
     *
     */
    
	public function __construct()
	{
		parent::__construct();
	}


    public function analytics($time_period = 'hour')
    {
        $this->load->library('postageapp');
        // $this->q->metrics = $this->postageapp->get_metrics();
        // $this->q->message = $this->postageapp->get_messages();
        // $this->q->proj_info = $this->postageapp->get_project_info();
        // $this->q->acc_info = $this->postageapp->get_account_info();
        $this->q->uid = $this->postageapp->get_message_receipt('14d8b4cd09b70903ed1ecede2072f7c155fcb063');
        //$this->q->uid2 = $this->postageapp->get_message_transmissions('14d8b4cd09b70903ed1ecede2072f7c155fcb063');
        $this->create_presenter();
    }

    public function send_broadcast($id)
    {
        $this->send($id, FALSE);
    }

    public function send($id, $test = TRUE)
    {
        //Get the most up to date record of the template
        $this->load->model('broadcast_model');
        if ( ! $b = $this->broadcast_model->get($id) )
        {
            $this->session->set_flashdata(array('message' => '[uhoh]'));
            redirect ('broadcasts');
        }

        //Who is it from?
        $from = explode('|', $b->broadcast_from);
        $this->postageapp->from($from[0] . ' <' . $from[1] . '>');
        
        //Set subject & content
        $this->postageapp->subject($b->subject_line);
        $this->postageapp->message(array(
            'text/html'   => $b->body,
            'text/plain'  => $b->body
            ));

        if ($b->email_template !== 'plain_text')
        {
            $this->postageapp->template($b->email_template);
        }


        


        $this->view = $this->presenter = FALSE;


        // $merge_fields = preg_replace_callback(
                 
        //          , //find words with double curly brackets
        //          array($this, 'replace_placeholders'), 
        //          $template_data['Content']
        //          );

    }



    //gets raw JSON of a method (for charting)
    public function get_data()
    {
        $this->load->library('postageapp');
        $this->q->metrics = $this->postageapp->get_metrics();
        $this->layout = FALSE;
        $this->view = FALSE;
        echo json_encode($this->q->metrics);
    }
}