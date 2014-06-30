<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CMS_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->config('cms');
        
        if( ! $this->config->item('cms_admin_panel_uri'))
        {
            show_error('Configuration error');
        }
        
        $this->_set_language();
        
        $this->lang->load('cms_general');
        
        $this->load->library(['template', 'user']);
    }
    
    public function admin_panel()
    {
        return strtolower($this->uri->segment(1)) == $this->config->item('cms_admin_panel_uri');
    }
    
    private function _set_language()
    {
        $lang = $this->session->userdata('global_lang');
        
        if($lang && in_array($lang, $this->config->item('cms_languages')))
        {
            $this->config->set_item('language', $lang);
        }
    }
}

/* End of file CMS_Controller.php */
/* Location: ./application/controllers/CMS_Controller.php */