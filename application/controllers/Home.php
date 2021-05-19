<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('message_model');
        $this->load->model('user_model');
        $this->load->model('comment_model');
        $this->load->model('date_utills');
    }
    
    public function index(){
        
        $userId = $this->session->userdata('userId');
        
         
        $data =  array();// create a new array
        $data['title'] = "Home";
        
        if($userId != NULL){
            $data['instant_req']= $this->user_model->input_user_name($userId);
        }
                
       
       
        if(isset($_GET['search']) && $_GET['search'] != ""){            
            $data['contents'] = $this->message_model->message_search($_GET['search']);
        } else {
            $data['contents']= $this->message_model->get_all_messages();
        }
        
        for ($i = 0; $i < count($data['contents']); $i++) {
            $id = $data['contents'][$i]->id;
            
            $comments= $this->comment_model->get_message_comment($id);
            
            $data['contents'][$i]->comments_count=count($comments); 
        }
         
        
        $this->load->view('templetes/header', $data);
	$this->load->view('home/index', $data);		
	$this->load->view('templetes/footer');
    }    
    public function showUserMessages(){
        
	redirect('message/index');
    }
    public function doSomething(){       
        $userId = $this->session->userdata('userId');
        if($userId != NULL){
            $this->message_model->change_likes($_POST['id']);
        }        
        redirect('http://localhost/');
        
    }
    public function doSomethingelse(){       
        $userId = $this->session->userdata('userId');
        if($userId != NULL){
            $this->message_model->change_dislikes($_POST['id']);
        }        
        redirect('http://localhost/');
        
    }
    public function deletMessage($id){
        $this->comment_model->delet_user_comments($id);
        $this->message_model->delet_user_message($id);
        
        redirect('http://localhost/');
    }
    

}