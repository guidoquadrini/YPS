<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends YPS_Controller {

    public function login() {

        if ($this->input->post('login') == 1) {
            $this->load->library('form_validation');
            $rules = [
                [
                    'field' => 'user',
                    'label' => 'lang:yps_general_label_user',
                    'rules' => 'trim|required|alpha_dash|max_length[30]'
                ],
                [
                    'field' => 'password',
                    'label' => 'lang:yps_general_label_password',
                    'rules' => 'required|min_length[4]|max_lenght[8]'
                ]
            ];

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() === TRUE) {
                if ($this->usuario->login(
                        $this->input->post('user'), 
                        $this->input->post('password')) === TRUE) {
                    $this->session->set_userdata('user_id', $this->usuario->id);
                    redirect();
                }
                $this->template->add_message(['error' => $this->usuario->errors()]);
            }
        }
        $this->load->helper('form');
        $this->load->view('login/form_view');
    }

    function logout() {
        if ($this->usuario->is_logged_in()) {
            $this->session->sess_destroy();
        }
        redirect('usuarios/login');
    }

}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */