<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('message_model');
        $this->load->model('comment_model');
        $this->load->model('date_utills');
    }
    public function index(){
        $userId = $this->session->userdata('userId');
        
        $data =  array();
        $data['showAllUsers']= $this->user_model->all_users();
        
        if($userId !== NULL){
            $data['instant_req']= $this->user_model->input_user_name($userId);
        }
        
        if(isset($_GET['search']) && $_GET['search'] != ""){           
            $data['showAllUsers'] = $this->user_model->user_search($_GET['search']);
        } else {
            $data['showAllUsers']= $this->user_model->all_users();
        }
        
        $this->load->view('templetes/header', $data);		
	$this->load->view('users/index',  $data);
	$this->load->view('templetes/footer');
    }    
    public function callOtherUser($id){
        $userId = $this->session->userdata('userId');        
        
        $data =  array();
            
            
            $data['other_info']= $this->user_model->other_personal_info($id);            
            $data['contents']= $this->message_model->get_other_message($id);
        
        
        if($userId != NULL){
            $data['instant_req']= $this->user_model->input_user_name($userId);
        } else {
            $data['instant_req'] = '';
        }
        
       
        $this->load->view('templetes/header', $data);
        $this->load->view('users/otherUsers', $data);
        $this->load->view('templetes/footer');
    
     
    }
    
}