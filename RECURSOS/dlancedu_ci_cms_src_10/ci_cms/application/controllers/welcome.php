<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CMS_Controller
{
    public function index()
    {
        $this->load->library('user', ['id' => 1]);
        
        $this->template->render('welcome/index');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */