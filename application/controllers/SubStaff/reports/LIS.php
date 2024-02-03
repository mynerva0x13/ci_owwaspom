<?php

class LIS extends CI_Controller {
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

    function doInsert(){
        if(isset($_POST['save'])){


        if ($_POST['DEPARTMENT_NAME'] == "" OR $_POST['DEPARTMENT_DESC'] == "") {
            $messageStats = false;
            // message("All field is required!","error");
            // redirect('index.php?view=add');
            
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "All field is required!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            redirect("Staff/Scholar_list");

        }else{	
            $dept = New Department(); 
            $dept->DEPARTMENT 		= $_POST['DEPARTMENT_NAME'];
            $dept->DESCRIPTION		= $_POST['DEPARTMENT_DESC']; 
            $dept->create();
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "New department created successfully!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            redirect("Staff/Scholar_list");
            
        }
        }

    }
}