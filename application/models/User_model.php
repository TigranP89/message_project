<?php

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    /*Registration*/
    public function insert_user($fname, $lname, $email, $password){
	$data= array(
            'fname'=>$_POST['fname'],
            'lname'=>$_POST['lname'],
            'email'=>$_POST['email'],
            'password'=>$_POST['password'],
            'date'=> date('l jS \of F Y H:i:s')
            );		
	$this->db->insert('user', $data);
	return TRUE;
    }
    /*Login*/
    public function login_users($email, $password){        
        $string = "SELECT * FROM user WHERE email  = '" . $email ."' " . "AND password  = '" . $password ."'";	
	$query = $this->db->query($string);
        return $query->row_array($string);
    }
    /*Users*/
    public function all_users(){
        $query = $this->db->query("SELECT * FROM user");
	return $query->result();
    }
    public function input_user_name($userId){
	$query = $this->db->query("SELECT * FROM user WHERE id = " .  $userId);		
	return $query->result();
    }
    /*Personal*/
    public function personal_info($userId){
	$query=$this->db->query("SELECT * FROM user WHERE id = " .  $userId);
	return $query->result()[0];
    }
    /*Personal*/
    public function update_user($userId){
	$query=$this->db->query("UPDATE user SET fname='" . $_POST['fname'] . "' ".",lname='" . $_POST['lname'] . "'"."WHERE id = " .  $userId);
	return TRUE;
    }
    /*Users*/
    public function other_personal_info($id){
        //var_dump($id);exit;
	$query=$this->db->query("SELECT * FROM user WHERE id =" . $id);
        //var_dump($query->result()[0]);exit;
	return $query->result()[0];
    }
    
    public function user_search($search){
        $query = $this->db->query("SELECT * FROM user WHERE fname LIKE '%" . $search . "%' OR lname LIKE '%" . $search . "%'");
        return $query->result();
    }
    /**/
    public function get_created_user($id){
        $query = $this->db->query("SELECT * FROM user WHERE id = " . $id);		
        return $query->result()[0];
    }
}