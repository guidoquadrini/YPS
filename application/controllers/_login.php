<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends YPS_Controller {

	
	public function index()
	{
            //$this->load->library('user', ['id' => 1]);
            //echo "<pre>";
            //print_r($this->acl->permissions); 
            $this->template->render('login/index');
        }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */