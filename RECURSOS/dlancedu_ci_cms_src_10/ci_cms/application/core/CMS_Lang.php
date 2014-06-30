<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CMS Lang Class
 * 
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @author      Jaisiel Delance <jd@dlancedu.com>
 * @link        http://www.dlancedu.com 
 * @copyright   (c) 2014, www.dlancedu.com
 */
class CMS_Lang extends CI_Lang
{
    /**
     * Construct
     *
     * @return	void
     */
    public function __construct() 
    {
        parent::__construct();
    }
    
    // --------------------------------------------------------------------

    /**
     * Fetch a single line of text from the language array
     *
     * @access	public
     * @param	string	$line the language line
     * @return	string
     */
    public function line($line = '')
    {
        $value = parent::line($line);
        
        if($value === FALSE)
        {
            return $line;
        }
        
        return $value;
    }
}

/* End of file CMS_Lang.php */
/* Location: ./application/core/CMS_Lang.php */