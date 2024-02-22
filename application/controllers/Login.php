<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        
        $this->load->helper('cookie');
        $this->load->model("Initialize/Account");
    }
    
    public function index() {
       $message = "";
       $cookie = $this->input->cookie('message', true);
       
       if (!empty($cookie)) {  
           $ck = json_decode($cookie);
           
           $message = $this->Session->MessageResponse($ck->message, $ck->type);
          
       }
        if(isset($_POST['btnLogin'])){
            $email = trim($_POST['user_email']);
            $upass  = trim($_POST['user_pass']);
            if ($email == '' OR $upass == '') {
                $this->Session->messMessageResponseage("Invalid Username and Password!", "error");
                redirect("login");
        
                } else {
                    $user = $this->Account->userAuthentication($email,$upass);
                    if($user['status']) {
                        $this->input->set_cookie(array(
                            "name" => "message",
                            "value" => json_encode(array(
                                "message" => $user['message'],
                                "type" => $user['style']
                            )),
                            'expire' => 1
                        )); 
                        $_SESSION['loginStatus'] = true;
                        // $_SESSION['USERID'] = $user['ID'];
                        if ($user['type']=='Administrator'){
                            $_SESSION['loginTo'] = "admin";
                            $_SESSION['link'] = "admin";
                            
                            redirect("Admin/Dashboard");
    
                        } else if ($user['type'] == 'Staff') {
                            $_SESSION['loginTo'] = "staff";
                            $_SESSION['link'] = "Staff";
                            
                            redirect("Staff");
    
                        } else if ($user['type'] == 'Scholar') {

                            $_SESSION['link'] = "scholar";         
                            
                            redirect("Scholar");                   
    
                        } else if ($user['type'] == 'Parent') {
                            $_SESSION['loginTo'] = "parent";
                            
                            redirect("Parent");
    
                        }else{
                            redirect("login");
                        }
                    }
                    else {

                        $this->input->set_cookie(array(
                            "name" => "message",
                            "value" => json_encode(array(
                                "message" => $user['message'],
                                "type" => $user['style']
                            )),
                            'expire' => 3
                        )); 
                  
                        redirect("login");
                    }
                }
        }
        $this->load->view('resource', array(
            'body' => $this->load->view("login/login", array("response" => $message), true),
            'style' => $this->load->view('login/style', 0, true),
            'title' => 'login'
        ));

    }
    
public function logout() {
        unset( $_SESSION['USERID'] );
unset( $_SESSION['NAME'] );
unset( $_SESSION['UEMAIL'] );
unset( $_SESSION['PASS'] );
unset( $_SESSION['TYPE'] );

unset( $_SESSION['link'] );
unset( $_SESSION['loginTo'] );

unset( $_SESSION['account_status'] );
session_destroy();
        redirect('login');
    }


}
