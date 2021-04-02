<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Personal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        
    }
    public function index(){       
        $userId = $this->session->userdata('userId');
        
        $data =  array();
        
       
        $data['user_info']= $this->user_model->personal_info($userId);
       
        $data['instant_req']= $this->user_model->input_user_name($userId);// add $instant_req to the new array
        
        $this->load->view('templetes/header', $data);		
	$this->load->view('personal/index', $data);
	$this->load->view('templetes/footer');
    }   
    public function logoutSession(){		
	$this->session->sess_destroy();
    	redirect('home/index');
    }
    public function saveEdit(){		
	$userId = $this->session->userdata('userId');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
	$this->form_validation->set_rules('lname', 'Last Name', 'required');
        if ($this->form_validation->run()) {
            $this->user_model->update_user($userId);
            redirect('message/index'); 
        } else {
            redirect('http://localhost/index.php/personal/index');
        }
	
	  
    }
}