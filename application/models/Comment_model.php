<?php

class Comment_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_message_comment($message_id){

        $query = $this->db->query("SELECT * FROM comment WHERE message_id = " . 	$message_id);
        for ($i=0; $i<count($query->result());$i++){
                $query2 = $this->db->query("SELECT * FROM user WHERE id = " . $query->result()[$i]->user_id);            
                $query->result()[$i]->user_full_name = $query2->result()[0]->fname.' '.$query2->result()[0]->lname;            
            }
        return $query->result();
    }
    public function change_coment_likes($id){
        $query = $this->db->query("SELECT * FROM comment WHERE id=" . $id);       
        $row = $query->row_array();         
        $k = $row['like'];        
        $k = $k + 1;
       
        $data = array(
            'like' => $k ,
        );
       
        $this->db->where('id', $id);
        $this->db->update('comment',$data);
    }
    public function change_coment_dislikes($id){
        $query = $this->db->query("SELECT * FROM comment WHERE id=" . $id);       
        $row = $query->row_array();         
        $k = $row['dislike'];        
        $k = $k + 1;
       
        $data = array(
            'dislike' => $k ,
        );
       
        $this->db->where('id', $id);
        $this->db->update('comment',$data);
    }
    public function delet_user_comment($id) {
	$this->db->query("DELETE FROM comment WHERE id = " . 	$id);
	return true;
    }
    public function delet_user_comments($id) {
	$this->db->query("DELETE FROM comment WHERE message_id = " . 	$id);
	return true;
    }
    /*public function get_message_comment_count($message_id){
        $query = $this->db->query("SELECT * FROM comment WHERE message_id = " . $message_id);
        return $query->result();
    }*/
}