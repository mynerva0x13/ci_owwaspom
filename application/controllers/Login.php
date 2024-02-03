<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        
        $this->load->model("Initialize/Account");
    }
    
    public function index() {
       $message = "";
        if(isset($_POST['btnLogin'])){
            $email = trim($_POST['user_email']);
            $upass  = trim($_POST['user_pass']);
            if ($email == '' OR $upass == '') {
                $this->Session->messMessageResponseage("Invalid Username and Password!", "error");
                redirect("login");
        
                } else {
                    $user = $this->Account->userAuthentication($email,$upass);
                    if($user['status']) {
                        $message = $this->Session->MessageResponse($user['message'], "success");
                        
                        $_SESSION['loginStatus'] = true;
                        // $_SESSION['USERID'] = $user['ID'];
                        if ($user['type']=='Administrator'){
                            redirect("Admin/Dashboard");
                            $_SESSION['loginTo'] = "admin";
    
                        } else if ($user['type'] == 'Staff') {
                            redirect("Staff");
                            $_SESSION['loginTo'] = "staff";
    
                        } else if ($user['type'] == 'Scholar') {
                            redirect("Scholar");
                            $_SESSION['loginTo'] = "scholar";
    
                        } else if ($user['type'] == 'Parent') {
                            redirect("Parent");
                            $_SESSION['loginTo'] = "parent";
    
                        }else{
                            redirect("login");
                        }
                    }
                    else {

                        $message = $this->Session->MessageResponse($user['message'], "error");
                        
                  
                    }
                }
        }
        $this->load->view('resource', array(
            'body' => $this->load->view("login/login", array("response" => $message), true),
            'style' => $this->load->view('login/style', 0, true),
            'title' => 'login'
        ));

    }
    
}
