<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Message extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('message_model');
        $this->load->model('comment_model');
       
    }
    public function index(){
        $userId = $this->session->userdata('userId');
        
        $data =  array();
        $data['contents']= $this->message_model->get_user_message($userId);// add $contents to the new array
        $data['instant_req']= $this->user_model->input_user_name($userId);// add $instant_req to the new array
        
        /*Comment Count*/
        for ($i = 0; $i < count($data['contents']); $i++) {
            $id = $data['contents'][$i]->id;
            
            $comments= $this->comment_model->get_message_comment($id);
            
            $data['contents'][$i]->comments_count=count($comments); 
        }
        
        $this->load->view('templetes/header', $data);		
	$this->load->view('message/index', $data);
	$this->load->view('templetes/footer');
     }
    public function input_button(){
        $userId = $this->session->userdata('userId');
        
        $data =  array();
        $data['instant_req']= $this->user_model->input_user_name($userId);// add $instant_req to the new array
        
        $this->load->view('templetes/header', $data);
        $this->load->view('message/addRecord');
        $this->load->view('templetes/footer');
     }
     
    public function user_note(){
        $this->form_validation->set_rules('text', 'Enter your note', 'required');
        if ($this->form_validation->run()) {
            $userId = $this->session->userdata('userId');
            $data= array(
                'record' => $_POST['text'],
                'date' => date('l jS \of F Y H:i:s'),
		'user_id' => $userId
            );
            $this->message_model->insert_user_message($data);
        }
        redirect('/message/index');
    } 
    public function view($id){
        $userId = $this->session->userdata('userId');
        
        $data =  array();
        $data['contents']= $this->message_model->get_chosen_message($id);
        
        /*Comment Count*/
        for ($i = 0; $i < count($data['contents']); $i++) {
            $id = $data['contents'][$i]->id;
            
            $comments= $this->comment_model->get_message_comment($id);
            
            $data['contents'][$i]->comments_count=count($comments); 
        }
        
        if($userId != NULL){
            $data['instant_req']= $this->user_model->input_user_name($userId);
        }
        
        
        
        $data['mess_comm']= $this->comment_model->get_message_comment($id);
        
        $this->load->view('templetes/header', $data);
        $this->load->view('message/viewMessage', $data);
        $this->load->view('templetes/footer');
    }
   
    public function user_comment(){
        $userId = $this->session->userdata('userId');
        
        $this->form_validation->set_rules('comment_text', 'Enter your comment', 'required');
        if ($this->form_validation->run()) {
            $userId = $this->session->userdata('userId');
            
            $data= array(
                'content' => $_POST['comment_text'],
                'date' => date('l jS \of F Y H:i:s'),
                'message_id' => $_POST['id'],
                'user_id' => $userId,            
            );
           //var_dump($userId);exit;
            $this->message_model->insert_user_comment($data);
            redirect('http://localhost/index.php/message/view/'.$_POST['id']);
        } 
       
             
    }
    public function commentLike(){       
        $userId = $this->session->userdata('userId');
        if($userId != NULL){
            $this->comment_model->change_coment_likes($_POST['id']);
        }        
        redirect('http://localhost/index.php/message/view/'.$_POST['message_id']);
        
    }
    public function commentDislike(){       
        $userId = $this->session->userdata('userId');
        if($userId != NULL){
            $this->comment_model->change_coment_dislikes($_POST['id']);
        }        
        redirect('http://localhost/index.php/message/view/'.$_POST['message_id']);
        
    }
    public function deletComment($id){
        $query = $this->db->query("SELECT * FROM comment WHERE id=" . $id);
        $row = $query->row_array();
        $messegId = $row['message_id'];
      
        $this->comment_model->delet_user_comment($id);
      
        redirect('http://localhost/index.php/message/view/'.$messegId);
	
     
    }
}