<?php

class Account extends CI_Model {
    protected static  $tblname = "user_acc";
	
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load the database library
    }
    function single_user($id=""){
        global $mydb;
        $mydb = $this->db->query("SELECT * FROM ".self::$tblname." 
            Where USERID= '{$id}' LIMIT 1");
        $cur = $mydb->result();
        return $cur;
}
    public function userAuthentication($email, $h_pass) {
        $query = $this->db->query("SELECT * FROM `user_acc` WHERE `username` = ? AND `account_password` = ?", array($email, $h_pass));
        if ($query->num_rows() > 0) {
            $user_found = $query->row();
            
            if ($user_found->account_status == 'activate') {
                $_SESSION['USERID'] = $user_found->USERID;
                $_SESSION['NAME'] = $user_found->NAME;
                $_SESSION['username'] = $user_found->username;
                $_SESSION['account_password'] = $user_found->account_password;
                $_SESSION['TYPE'] = $user_found->TYPE;
                return array(
                    "message"=> "This account is found",
                    "status" => true,
                    "type"=> $user_found->TYPE
                );
            } else {
                return array(
                 "message"=> "This account is deactivated",
                "status" => false
                );
            }
        } else {
            return array(
                "message"=> "Username and Password are incorrect! Please contact Administrator.",
               "status" => false
               );
        }
    }
    
}