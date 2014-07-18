<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * Auditoria Helpers
 *
 * @package		Q-Informatica
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Guido Nicolas Quadrini
 * @link		http://www.q-informatica.com.ar
 */

// ------------------------------------------------------------------------

/**
 * Base de Datos Requerida
 * 
 * DROP TABLE IF EXISTS `milog`;
 * CREATE TABLE `milog` (
 *   `idmilog` int(11) NOT NULL AUTO_INCREMENT,
 *   `accion` varchar(255) NOT NULL,
 *   `fechahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 *   `url` varchar(255) NOT NULL,
 *   PRIMARY KEY (`idmilog`)
 * ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
 */

// ------------------------------------------------------------------------


if ( ! function_exists('milog'))
{
	function milog($accion = '?')
	{            
            $datos = [
                'accion'=>$accion,
                'url' =>  "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"
            ];
            $CI =& get_instance();
            $CI->db->insert('milog', $datos);
            	}
}


/* End of file auditoria_helper.php */
/* Location: ./application/helpers/auditoria_helper.php */