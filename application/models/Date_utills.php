<?php

class Date_utills extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    
        public function convertDate($subject) {
            if (strpos ($subject,"st of")){
                $sear = "st of";
            } else if(strpos ($subject,"nd of")){
                $sear = "nd of";
            } else if(strpos ($subject,"rd of")) {
                $sear = "rd of";
            } else {
                $sear = "th of";
            }
            return $sear;
        }
}