<?php
class userAdd extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        $this->load->model("Initialize/Student");
        $this->load->model("Initialize/Func_Misc");
        $this->load->model("Initialize/Account");
        $this->load->model("Initialize/Announcement");
        $this->load->model("Initialize/Comments");
        $this->load->model("Initialize/Replies");
        $this->load->model("Initialize/NewScholar");
        $this->load->model("Initialize/User");
        
        $this->load->model("Initialize/Parents");
        $this->load->model("Initialize/Request");
    }

    public function doUpdate() {
        if(isset($_POST['save'])){


			if ($_POST['user_name'] == "" OR $_POST['user_email'] == "" OR $_POST['user_pass'] == "") {
				$messageStats = false;
				message("","error");

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "All field is required!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
				// redirect('index.php?view=add');
			}else{	
                if($_POST['retype_user_pass']==$_POST['user_pass']) {
            
                    $ids = $this->db->query("UPDATE user_acc SET NAME = '{$_POST["user_name"]}', username='{$_POST["user_email"]}', account_password='{$_POST["user_pass"]}',TYPE='Staff',account_status='active', account_approval='accept',staff_address='Mindoro Oriental' WHERE USERID = {$_GET["id"]}");
                    $this->input->set_cookie(array(
                        "name" => "message",
                        "value" => json_encode(array(
                            "message" => "New [". $_POST['user_name'] ."] created successfully!",
                            "type" => "success"
                        )),
                        'expire' => 1
                    ));
                    redirect("{$_SESSION['link']}/User");
                    }
                    else {
    
                        $this->input->set_cookie(array(
                            "name" => "message",
                            "value" => json_encode(array(
                                "message" => "Password doesn't match!",
                                "type" => "success"
                            )),
                            'expire' => 1
                        ));
                        redirect("{$_SESSION['link']}/User");
                    }
    
            }
        }
    }
    public function doInsert() {
			global $mydb;
			if(isset($_POST['save'])){


			if ($_POST['user_name'] == "" OR $_POST['user_email'] == "" OR $_POST['user_pass'] == "") {
				$messageStats = false;
				message("","error");

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "All field is required!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
				// redirect('index.php?view=add');
			}else{	

                if($_POST['retype_user_pass']==$_POST['user_pass']) {
                    
				// $user = New User();
				// // $user->USERID 		= $_POST['user_id'];
				// $user->NAME 		= $_POST['user_name'];
				// $user->username		= $_POST['user_email'];
				// $user->account_password	= sha1($_POST['user_pass']);
				// $user->TYPE			= "Staff" ;// $_POST['user_type'];
				// $user->create();
				// $id =  $user->getLastInsertId();

				// $student = New Student();
				// $student->user_id  = $id;
				// $student->firstname = $_POST['user_name'];    
				// $student->create(); 
                $ids = $this->db->query("INSERT INTO user_acc SET NAME = '{$_POST["user_name"]}', username='{$_POST["user_email"]}', account_password='{$_POST["user_pass"]}',TYPE='Staff',account_status='active', account_approval='accept',staff_address='Mindoro Oriental'");
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "New [". $_POST['user_name'] ."] created successfully!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));
                redirect("{$_SESSION['link']}/User");
                }
                else {

                    $this->input->set_cookie(array(
                        "name" => "message",
                        "value" => json_encode(array(
                            "message" => "Password doesn't match!",
                            "type" => "success"
                        )),
                        'expire' => 1
                    ));
                    redirect("{$_SESSION['link']}/User");
                }

				
			}
			}

		}
    }