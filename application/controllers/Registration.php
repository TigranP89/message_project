<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Registration extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index(){		
	    
	$this->load->view('templetes/header');		
	$this->load->view('registration/index');
	$this->load->view('templetes/footer');		
    }
    
    public function submit_form(){		
	$this->form_validation->set_rules('fname', 'First Name', 'required');
	$this->form_validation->set_rules('lname', 'Last Name', 'required');
	$this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	$this->form_validation->set_rules('repass', 'Repeat password', 'required|min_length[5]|matches[password]');
				
	if ($this->form_validation->run()) {			
            $this->user_model->insert_user($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['password']);			
	}
		
	redirect('/login/index');	
    }

}
     