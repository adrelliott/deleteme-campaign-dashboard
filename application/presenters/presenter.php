<?php
/**
 * Clean up your view code and remove nasty, brittle logic using
 * the presenters - from The CodeIgniter Handbook - Volume One - Who Needs Ruby?
 *
 * @link http://github.com/jamierumbelow/codeigniter-presenters
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class Presenter
{
	/**
	 * Stores the object's name
	 */
	protected $_objectName = '';

	/**
	 * Takes an object and prepares to present . Default to 'NULL' to allow 'create' view to work
	 */
	public function __construct($object = NULL, $name = '')
	{
		$this->_objectName = $name ?: strtolower(str_ireplace('_presenter', '', get_class($this)));
		$this->{$this->_objectName} = $object;
	}

	/**
	 * Dynamically fetch properties from the object
	 */
	public function __call($name, $args = array())
	{
		if (isset($this->{$this->_objectName}->$name))
		{
			return $this->{$this->_objectName}->$name;
		}
		else
		{
			//Remove the erro message and allow us to use the object in new records too
			//throw new BadMethodCallException("Call to undefined method " . get_class($this) . "::" . $name . '()');
			return '';
		}
	}

	public function __get($attr)
	{
		if (isset(get_instance()->$attr))
		{
			return get_instance()->$attr;
		}
	}


	/*   User name functions */
	
	/**
	 * Echos logged in user's name
	 * @return [string] e.g. Al
	 */
	public function user_first_name()
	{

	}

}