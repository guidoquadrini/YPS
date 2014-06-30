<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CMS_Controller
{
    public function login()
    {
        if($this->input->post('login') == 1)
        {
            $this->load->library('form_validation');
            
            $rules = [
                [
                    'field' => 'user',
                    'label' => 'lang:cms_general_label_user',
                    'rules' => 'trim|required|alpha_dash|max_length[30]'
                ],
                [
                    'field' => 'password',
                    'label' => 'lang:cms_general_label_password',
                    'rules' => 'required|max_length[30]'
                ]
            ];
            
            
            $this->form_validation->set_rules($rules);
            
            if($this->form_validation->run() === TRUE)
            {
                if($this->user->login($this->input->post('user'), $this->input->post('password')) === TRUE)
                {
                    $this->session->set_userdata('user_id', $this->user->id);
                    
                    redirect();
                }
                
                $this->template->add_message(['error' => $this->user->errors()]);
            }
        }
        
        $this->load->helper('form');
        $this->template->render('users/login');
    }
    
    public function logout()
    {
        if($this->user->is_logged_in())
        {
            $this->session->sess_destroy();          
        }
        
        redirect();
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */