<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Auth extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('Form_model');
        $this->load->helper('url_helper');
       // $this->load->helper('form');
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('session');
		 $this->user_id = $this->session->userdata('user_id');
        }

    public function index()
    {
     $this->load->view('login');
    }
    public function post_login()
        {  
            $data = array(
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
             );
			if(!empty($this->input->post('email')) && !empty($this->input->post('password'))){
            $check = $this->Form_model->auth_check($data);            
            if($check != false){ 
                 $user = array(
                 'user_id' => $check->id,
                 'email' => $check->email,
                 'name' => $check->name
                ); 
            $this->session->set_userdata($user);
				echo 1;
            }else {
			echo '<div class="alert alert-danger"> Wrong Email or Password.</div>';
				}
		} else {
			echo '<div class="alert alert-danger"> Email & Password Is Empty.</div>';
		}			
    }
    public function post_register()
    {
 
        $this->form_validation->set_rules('name', 'Your Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('register');
        }
        else
        {   
            $data = array(
               'name' => $this->input->post('name'),
               'mobile' => $this->input->post('mobile'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->Form_model->insert_user($data);
 
            if($check != false){
 
                $user = array(
                 'user_id' => $check,
                 'email' => $this->input->post('email'),
                 'name' => $this->input->post('name'),
                 'mobile' => $this->input->post('mobile'),
                );
             }
  
             $this->session->set_userdata($user);
 
             redirect( base_url('auth/dashboard') ); 
            }
         
    }
    public function logout(){
    $this->session->sess_destroy();
    redirect(base_url('auth'));
   }    
   public function dashboard(){
       if(empty($this->user_id)){
        redirect(base_url('auth'));
      }
       $this->load->view('dashboard');
    }
}