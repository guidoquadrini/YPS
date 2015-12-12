<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Language extends YPS_Controller {

    public function change($lang) {
        if (in_array($lang, $this->config->item('yps_languages'))) {
            $this->session->set_userdata('global_lang', $lang);
        }
        redirect();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/language.php */