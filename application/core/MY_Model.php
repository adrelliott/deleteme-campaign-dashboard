<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This extends Jamie Rumbelow's base model
 *
 * This can be found in application/libraries/jamie_rumbelow/Base_Model.php
 *
 * EDIT THIS FILE ONLY!!!!
 */

require_once APPPATH . 'libraries/jamie_rumbelow/Base_Model.php';

class MY_Model extends Base_Model
{

    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */

    /**
     * This model's default database table. Automatically
     * guessed by pluralising the model name.
     */
    protected $_table;
    
    /**
     * The database connection object. Will be set to the default
     * connection. This allows individual models to use different DBs 
     * without overwriting CI's global $this->db connection.
     */
    public $_database;

    /**
     * This model's default primary key or unique identifier.
     * Used by the get(), update() and delete() functions.
     */
    protected $primary_key = 'id';

    /**
     * Support for soft deletes and this model's 'deleted' key
     */
    protected $soft_delete = TRUE;
    protected $soft_delete_key = 'deleted';
    protected $_temporary_with_deleted = FALSE;
    protected $_temporary_only_deleted = FALSE;

    /**
     * The various callbacks available to the model. Each are
     * simple lists of method names (methods will be run on $this).
     */
    protected $before_create = array('created_at', 'updated_at');
    protected $after_create = array();
    protected $before_update = array('updated_at');
    protected $after_update = array();
    protected $before_get = array();
    protected $after_get = array();
    protected $before_delete = array();
    protected $after_delete = array();

    protected $callback_parameters = array();

    /**
     * Protected, non-modifiable attributes
     */
    protected $protected_attributes = array('id', 'owner_id');  //also add client_id, 

    /**
     * Relationship arrays. Use flat strings for defaults or string
     * => array to customise the class name and primary key
     */
    protected $belongs_to = array();
    protected $has_many = array();

    protected $_with = array();

    /**
     * An array of validation rules. This needs to be the same format
     * as validation rules passed to the Form_validation library.
     */
    protected $validate = array();

    /**
     * Optionally skip the validation. Used in conjunction with
     * skip_validation() to skip data validation for any future calls.
     */
    protected $skip_validation = FALSE;

    /**
     * By default we return our results as objects. If we need to override
     * this, we can, or, we could use the `as_array()` and `as_object()` scopes.
     */
    protected $return_type = 'object';
    protected $_temporary_return_type = NULL;

}