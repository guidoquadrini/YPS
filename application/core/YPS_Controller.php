<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class YPS_Controller extends CI_Controller {
   
    public function __construct() 
    {
        parent::__construct();
        $this->load->config('yps');
        if (! $this->config->item('yps_admin_panel_uri'))
        {
            show_error('Configuration error');
        }
        $this->_set_language();
        $this->lang->load('yps_general');
        $this->load->library(['template', 'user']);
        
    }
    public function adminPanel()
    {
        return strtolower($this->uri->segment(1)) == $this->config->item('yps_admin_panel_uri');
    }
    
    private function _set_language(){
        $lang = $this->session->userdata('global_lang');
        if($lang && in_array($lang, $this->config->item('yps_languages'))){
            $this->config->set_item('language', $lang);
        }
    }
   
    
    
}

/* End of file YPS_Controller.php */
/* Location: ./core/YPS_controller.php */