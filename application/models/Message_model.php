<?php

class Message_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_user_message($userId){

        $query = $this->db->query("SELECT * FROM message WHERE user_id = " . 	$userId);
        for ($i=0; $i<count($query->result());$i++){
                $query2 = $this->db->query("SELECT * FROM user WHERE id = " . $query->result()[$i]->user_id);            
                $query->result()[$i]->user_full_name = $query2->result()[0]->fname.' '.$query2->result()[0]->lname;            
            }
        return $query->result();
    }
   
     /*Record*/
    public function insert_user_message($data){	
	$this->db->insert('message',$data);
	return TRUE;
    }
    /*Comment*/
    public function insert_user_comment($data){	
	$this->db->insert('comment',$data);
	return TRUE;
    }
    /*Home*/
    public function get_all_messages(){
	$query = $this->db->query("SELECT * FROM message");
        for ($i=0; $i<count($query->result());$i++){
            $query2 = $this->db->query("SELECT * FROM user WHERE id = " . $query->result()[$i]->user_id);            
            $query->result()[$i]->user_full_name = $query2->result()[0]->fname.' '.$query2->result()[0]->lname;            
        }        
        return $query->result();
	
    }
    public function get_other_message($id){

        $query = $this->db->query("SELECT * FROM message WHERE user_id = " . 	$id);		
        return $query->result();
    }
    public function get_chosen_message($id){
        $query = $this->db->query("SELECT * FROM message WHERE id = " . 	$id);
        for ($i=0; $i<count($query->result());$i++){
            $query2 = $this->db->query("SELECT * FROM user WHERE id = " . $query->result()[$i]->user_id);            
            $query->result()[$i]->user_full_name = $query2->result()[0]->fname.' '.$query2->result()[0]->lname;            
        }
        return $query->result();
    }
    public function message_search($search){
        $query = $this->db->query("SELECT * FROM message WHERE record LIKE '%" . $_GET['search'] . "%'");
        for ($i=0; $i<count($query->result());$i++){
            $query2 = $this->db->query("SELECT * FROM user WHERE id = " . $query->result()[$i]->user_id);            
            $query->result()[$i]->user_full_name = $query2->result()[0]->fname.' '.$query2->result()[0]->lname;            
        }
        return $query->result();
    }

    public function change_likes($id){
        $query = $this->db->query("SELECT * FROM message WHERE id=" . $id);       
        $row = $query->row_array();         
        $k = $row['like'];        
        $k = $k + 1;
       
        $data = array(
            'like' => $k ,
        );
       
        $this->db->where('id', $id);
        $this->db->update('message',$data);
    }
    public function change_dislikes($id){
        $query = $this->db->query("SELECT * FROM message WHERE id=" . $id);       
        $row = $query->row_array();         
        $k = $row['dislike'];        
        $k = $k + 1;
       
        $data = array(
            'dislike' => $k ,
        );
       
        $this->db->where('id', $id);
        $this->db->update('message',$data);
    }
    public function delet_user_message($id) {
	$this->db->query("DELETE FROM message WHERE id = " . 	$id);
	return true;
    }
}