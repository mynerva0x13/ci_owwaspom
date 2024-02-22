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
            
            if ($user_found->account_status == 'activate' || $user_found->account_status == 'active' ) {
                $scholarAccess = $this->db->query("SELECT * FROM scholar_info WHERE user_id = $user_found->USERID ");
        
                if($user_found->account_approval=='accept') {
                    $_SESSION['USERID'] = $user_found->USERID;
                    $_SESSION['NAME'] = $user_found->NAME;
                    $_SESSION['username'] = $user_found->username;
                    $_SESSION['account_password'] = $user_found->account_password;
                    $_SESSION['TYPE'] = $user_found->TYPE;

                    if($scholarAccess->num_rows() > 0 ) {
                        return array(
                            "message"=> "This account is found",
                            "style" => "accept",
                            "status" => true,
                            "type"=> $user_found->TYPE
                        );
                    } else {
                        if($_SESSION['TYPE']!=="Scholar") {
                            return array(
                                "message"=> "This account is found",
                                "style" => "accept",
                                "status" => true,
                                "type"=> $user_found->TYPE
                            );
                            exit;
                        }
                        return array(
                            "message"=> "Your account is exist but the scholar database doesnt exist. Please contant to adminsitrator for more info.",
                            "style" => "accept",
                            "status" => false,
                            "type"=> $user_found->TYPE
                        );
                    }
                    
                }
                else if($user_found->account_approval=='deny') {
                    return array(
                        "message"=> "This user doesnt found in the database. Contact to adminstartor for more info.",
                        "style" => "danger",
                        "status" => false,
                        "type"=> $user_found->TYPE
                    );
                }
                else if(empty($user_found->account_approval) || $user_found->account_approval == "pending") {
                   
                    return array(
                        "message"=> "This account is pending. Contact to adminstartor for more info.",
                        "style" => "warning",
                        "status" => false,
                        "type"=> $user_found->TYPE
                    );
                }
                
            } else {
                return array(
                 "message"=> "This account is deactivated",
                 "style" => "danger",
                "status" => false
                );
            }
        } else {
            return array(
                "message"=> "Username and Password are incorrect! Please contact Administrator.",
                "style" => "danger",
               "status" => false
               );
        }
    }
    
}