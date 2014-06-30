<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Language Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Language
 * @author		Guido Nicolas Quadrini
 * @link		http://www.q-informatica.com.ar
 */
class YPS_Lang extends CI_Lang {

        public function __construct(){
            parent::__construct();
        }
	// --------------------------------------------------------------------

	/**
	 * Fetch a single line of text from the language array
	 *
	 * @access	public
	 * @param	string	$line	the language line
	 * @return	string
	 */
	function line($line = '')
	{
		$value = parent::line($line);

		// Because killer robots like unicorns!
		if ($value === FALSE)
		{
			return $line;
		}

		return $value;
	}

}
// END Language Class

/* End of file YPS_Lang.php */
/* Location: ./system/core/YPS_Lang.php */
