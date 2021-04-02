<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
       
    }
    public function index(){
        $userId = $this->session->userdata('userId');
        
        if ($userId) {
		redirect('/message/index');
            }	
         
        $this->load->view('templetes/header');		
	$this->load->view('login/index');
	$this->load->view('templetes/footer');
     }
    public function iogin_form(){
         $this->form_validation->set_rules('email', 'Email', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
         
         if ($this->form_validation->run()) {
             $row = $this->user_model->login_users($_POST['email'],$_POST['password']);
             
             if (isset($row)) {
                 $this->session->set_userdata('userId', $row['id']);
                 redirect('/login/index');
             } else {
                 echo 'No user';
             }
         }
         
     }
}