<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
            parent::__construct();
            
            $this->load->library('form_validation');
            
        }
        public function index(){
            $this->form_validation->set_rules('user', 'Usuario', 'required|xss_clean|min_length[6]');   
            $this->form_validation->set_rules('pass', 'Contraseña', 'required|md5');   
            $this->form_validation->set_message('required', 'El campo $s esta viacio');              
                                   
            if (!isset($_POST['user'])){
                if ($this->session->userdata('user_name')){
                  $this->load->view('login/cerrar');
                }else{
                    $this->load->view('login/form_view');
                }                
            }else{
                if ($this->form_validation->run() == FALSE){
                    $this->load->view('login/form_view');
                }else{   
                    $user1 = $this->input->post('user');
                    $clave1 = $this->input->post('pass');
                    $this->load->model('/login/form_model','candidato');
                    $acceso = $this->candidato->login($user1,$clave1);   
                    if ($acceso != FALSE){                        
                        $this->load->library('user',['id' => $acceso[0]->id]);
                        $this->session->set_userdata('user_id', $this->user->id);
                        $this->session->set_userdata('user_user', $this->user->user);
                        $this->session->set_userdata('user_name', $this->user->name);
                        $this->session->set_userdata('user_email', $this->user->email);
                        $this->session->set_userdata('user_rol', $this->user->rol);
                        $this->load->view('login/form_exito');                                     
                    }else{
                            $this->session->set_userdata('error_message', 'Sus credenciales fueron rechazadas.');

                            $this->load->view('login/form_view');
                    }
                    
                    
                    
                }
            }
        }
        public function logout(){
            if ($this->session->userdata('user_id') == TRUE){
                $this->session->sess_destroy();
                $this->load->view('login/form_view');
            }else{
                $this->load->view('login/form_view');
            }
        }

//        public function index()
//	{
//            $this->load->library('user');
//            $this->load->library('acl');         
//            $this->template->render('login/index');
//            
//        }
}

/* End of file login.php */
/* Location: ./application/controllers/login/login.php */