<?php

class scholar1 extends CI_Controller
{
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

        $this->link = $_GET['link'];
    }

    public function doDelete(){

	

        if (isset($_POST['selector'])==''){
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Select the records first before you delete!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            
            redirect("$this->link/scholar");
            }else{
                
                
            
               
            $id = $_POST['selector'];
            $key = count($id);

            print_r($id);

            // $student = New Student();
            // $student->delete($id[$i]);

            // $msg = ""; 
        if (isset($_POST['terminate'])) {
            $msg = "Terminated";
            $t = "terminated_at";
        }
        
        if (isset($_POST['activate'])) {

            $msg = "Graduated";
            $t = "graduated_at";
        }

        echo $t;
        for($i=0;$i<$key;$i++){ 
            $this->db->query("UPDATE scholar_info SET $t = NOW() WHERE scholar_id =".$id[$i]);
        }
            // $sy = new Schoolyear();
            // $sy->delete($id[$i]);


            // $parent = New Parents();
            // $parent->delete($id[$i]);

        
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "student has been $msg!!",
                    "type" => "info"
                )),
                'expire' => 1
            ));
            
            redirect("$this->link/scholar");

        }

    }

    function doInsert()
    {
        global $mydb;
    
        if (isset($_POST['save'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phone_num = $_POST['phone_num'];
    
            if (empty($firstname) || empty($lastname)) {

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "All fields are required!!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
                
                redirect("$this->link/scholar");
            } else {
                $program = $_POST['program'];
                $firstname = str_replace("'", "\'", $_POST['firstname']);
                $middlename = str_replace("'", "\'", $_POST['middlename']);
                $lastname = str_replace("'", "\'", $_POST['lastname']);
                $suffix = str_replace("'", "\'", $_POST['suffix']);
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $address = str_replace("'", "\'", $_POST['address']);
                $birthdate = $_POST['birthdate'];
                $email = str_replace("'", "\'", $_POST['email']);
                $phone_num = str_replace("'", "\'", $_POST['phone_num']);
                $region = $_POST['region'];
                $region = str_replace("'", "\'", $region);
                // $citizenship = str_replace("'", "\'", $_POST['citizenship']);
                $OFW_firstname = str_replace("'", "\'", $_POST['OFW_firstname']);
                $OFW_middlename = str_replace("'", "\'", $_POST['OFW_middlename']);
                $OFW_lastname = str_replace("'", "\'", $_POST['OFW_lastname']);
                $OFW_suffix = str_replace("'", "\'", $_POST['OFW_suffix']);
                $OFW_relationship = str_replace("'", "\'", $_POST['OFW_relationship']);
                $category = $_POST['category'];
                $category = str_replace("'", "\'", $category);
                
                $OFW_email = str_replace("'", "\'", $_POST['OFW_email']);
    
                $mid = substr($OFW_middlename, 0, 1);
                $parent_password = 'OWWA@parent123';
                $name = $firstname . ' ' . $lastname;
                $OFWname = $OFW_firstname ." ". $mid.". ".$OFW_lastname;
    
                $mid = substr($middlename, 0, 1);
                $password = $firstname . $program . $age;
                $name = $lastname . ' ' . $firstname . ' ' . $mid;
                $TYPE = 'Scholar';
                $account_status = 'active';			
    
                      // Query the database to check if the email already exists
                      $query = $this->db->get_where('scholar_info', array('email' => $email));
                      $row_count = $query->num_rows();
                      
                       // Check if the email already exists
                       if ($row_count > 0) {
                        echo '<script>
                            var errorMessage = "Email already exists!";
                            alert(errorMessage);
                            window.location.href = "'.base_url($this->link."/scholar").'";
                        </script>';
                        exit;
                    }
    
                $user1 = new User();
                $user1->NAME = $name;
                $user1->username = $email;
                $user1->account_password = $password;
                $user1->TYPE = "Scholar";
                $user1->account_status = $account_status;
                $user1->staff_address = $region;
                $user1->create();
    
                $userAccId = $user1->getLastInsertId();
                $user2 = new User();
                $user2->NAME = $OFWname;
                $user2->username = $OFW_email;
                $user2->account_password = $parent_password;
                $user2->TYPE = "Parent";
                $user2->account_status = $account_status;
                $user2->staff_address = $region;
                $user2->create();


                
                if ($userAccId) {
                    $student = new NewScholar();
                    $student->user_id = $userAccId;
                    $student->program = $program;
                    $student->firstname = $firstname;
                    $student->middlename = $middlename;
                    $student->lastname = $lastname;
                    $student->suffix = $suffix;
                    $student->age = $age;
                    $student->gender = $gender;
                    $student->address = $address;
                    $student->birthdate = $birthdate;
                    $student->email = $email;
                    $student->phone_num = $phone_num;
                    $student->region = $region;
                    // $student->citizenship = $citizenship;
                    $student->OFW_firstname = $OFW_firstname;
                    $student->OFW_middlename = $OFW_middlename;
                    $student->OFW_lastname = $OFW_lastname;
                    $student->OFW_suffix = $OFW_suffix;
                    $student->OFW_relationship = $OFW_relationship;
                    $student->category = $category;
                    $student->OFW_email = $OFW_email;
    
                    $student->create();

                    $foldername = $lastname . $firstname . $middlename;
                    $target_directory = "scholars_document/". $program ."/". $foldername ."/";
					
                    if (!is_dir($target_directory)) {
                        mkdir($target_directory, 0777, true);
                    }

                    $this->input->set_cookie(array(
                                                    "name" => "message",
                                                    "value" => json_encode(array(
                                                        "message" => "Email has been posted successfully!",
                                                        "type" => "success"
                                                    )),
                                                    'expire' => 1
                                                ));
                                                redirect("$this->link/scholar");
                }

                }
            }
        }
            public function doEdit()
    {
        global $mydb;
        if (isset($_POST['save'])) {
    
            $lastname =  $_POST['lastname'];
            $firstname =  $_POST['firstname'];
            echo 1;
            if (empty($firstname) || empty($lastname)) {

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "All fields are required!!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
            } else {
                
                $middlename =  $_POST['middlename'];
                $suffix =  $_POST['suffix'];
                $age = $_POST['age'];
                // $gender = $_POST['gender'];
                $address =  $_POST['address'];
                $birthdate = $_POST['birthdate'];
                $email =  $_POST['email'];
                $phone_num =  $_POST['phone_num'];
                // $region = $_POST['region'];
                // $region = str_replace("'", "\'", $region);
                $citizenship =  $_POST['citizenship'];
                $OFW_firstname =  $_POST['OFW_firstname'];
                $OFW_middlename =  $_POST['OFW_middlename'];
                $OFW_lastname =  $_POST['OFW_lastname'];
                $OFW_suffix =  $_POST['OFW_suffix'];
                $OFW_relationship =  $_POST['OFW_relationship'];
                $category = $_POST['category'];
                $category =  $category;
        ;
                $OFW_email =  $_POST['OFW_email'];
    
                $mid = substr($OFW_middlename, 0, 1);
                $parent_password = 'OWWA@parent123';
                $name = $firstname . ' ' . $lastname;
                $OFWname = $OFW_firstname ." ". $mid.". ".$OFW_lastname;
    
                $mid = substr($middlename, 0, 1);
                $name = $lastname . ' ' . $firstname . ' ' . $mid;
                $scholar_id = $_POST['scholar_id'];
                $TYPE = 'Scholar';

                    $student = new NewScholar();
                    $student->firstname = $firstname;
                    $student->middlename = $middlename;
                    $student->lastname = $lastname;
                    $student->suffix = $suffix;
                    $student->age = $age;
                    // $student->gender = $gender;
                    $student->address = $address;
                    $student->birthdate = $birthdate;
                    $student->email = $email;
                    $student->phone_num = $phone_num;
                    // $student->region = $region;
                    $student->citizenship = $citizenship;
                    $student->OFW_firstname = $OFW_firstname;
                    $student->OFW_middlename = $OFW_middlename;
                    $student->OFW_lastname = $OFW_lastname;
                    $student->OFW_suffix = $OFW_suffix;
                    $student->OFW_relationship = $OFW_relationship;
                    $student->category = $category;
                    $student->OFW_email = $OFW_email;
                    $student->update($scholar_id);

                	
                  print_r($_POST);
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Email has been posted successfully!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));
                redirect("$this->link/scholar");
                }
            }
    }
    public function doEditme() {
        if (isset($_POST['save'])) {
            $lastname =  $_POST['lastname'];
            $firstname =  $_POST['firstname'];
            if (empty($firstname) || empty($lastname)) {

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                    "message" => "All fields are required!!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            } else {
                $middlename =  $_POST['middlename'];
                $suffix =  $_POST['suffix'];
                $age = $_POST['age'];
                $address =  $_POST['address'];
                $birthdate = $_POST['birthdate'];
                $email =  $_POST['email'];
                $phone_num =  $_POST['phone_num'];
                $region = $_POST['religion'];
                $scholar_id = $_POST['scholar_id'];
                $citizenship = $_POST['citizenship'];
                $religion = $_POST['religion'];
                $TYPE = 'Scholar';
                $student = new NewScholar();
                $student->firstname = $firstname;
                $student->middlename = $middlename;
                $student->lastname = $lastname;
                $student->suffix = $suffix;
                $student->age = $age;
                // $student->gender = $gender;
                $student->address = $address;
                $student->birthdate = $birthdate;
                $student->email = $email;
                $student->phone_num = $phone_num;
                $student->religion = $religion;
                $student->citizenship = $citizenship;
                
                $student->update($scholar_id);
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Update has been successfully!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));
                redirect("$this->link/scholar?view=view&id=$scholar_id");
            }
        }
    }
    public function doEditfam() {
        
        if (isset($_POST['save'])) {
            
            $student = new NewScholar();
            
            $scholar_id = $_POST['scholar_id'];
        $father_fname = $_POST['father_fname'];
        $father_mname = $_POST['father_mname'];
        $father_lname = $_POST['father_lname'];
        $father_suffix = $_POST['father_suffix'];
        $father_occupation = $_POST['father_occupation'];
        $father_status = $_POST['father_status'];
        $Father_Educ = $_POST['Father_Educ'];
        $father_contactnum = $_POST['father_contactnum'];

        $mother_fname = $_POST['mother_fname'];
        $mother_mname = $_POST['mother_mname'];
        $mother_lname = $_POST['mother_lname'];
        $mother_suffix = $_POST['mother_suffix'];
        $mother_occupation = $_POST['mother_occupation'];
        $mother_status = $_POST['mother_status'];
        $mother_Educ = $_POST['mother_Educ'];
        $mother_contactnum = $_POST['mother_contactnum'];

        $student->father_fname= $father_fname; 	
        $student->father_mname= $father_mname;	
        $student->father_lname= $father_lname; 	
        $student->father_suffix= $father_suffix; 
        $student->father_occupation= $father_occupation; 	
        $student->father_status= $father_status;	
        $student->Father_Educ= $Father_Educ; 	
        $student->Father_contactnum= $father_contactnum; 

        $student->mother_fname= $mother_fname; 	
        $student->mother_mname= $mother_mname;	
        $student->mother_lname= $mother_lname; 	
        $student->mother_suffix= $mother_suffix; 
        $student->mother_occupation= $mother_occupation; 	
        $student->mother_status= $mother_status;	
        $student->mother_Educ= $mother_Educ; 	
        $student->mother_contactnum= $mother_contactnum;  	
        
        $student->update($scholar_id);
        $this->input->set_cookie(array(
            "name" => "message",
            "value" => json_encode(array(
                "message" => "Update has been successfully!",
                "type" => "success"
            )),
            'expire' => 1
        ));
        redirect("$this->link/scholar?view=view&id=$scholar_id");
        }
    }
    public function editCourse() {
        
        if (isset($_POST['save'])) {
            
            $student = new NewScholar();
            
            $scholar_id = $_POST['scholar_id'];

            $primary_school = $_POST['primary_school'];
            $primary_year_from = $_POST['primary_year_from'];
            $primary_year_to = $_POST['primary_year_to'];
            $secondary_school = $_POST['secondary_school'];
            $secondary_year_from = $_POST['secondary_year_from'];
            $secondary_year_to = $_POST['secondary_year_to'];
            $tertiary_school = $_POST['tertiary_school'];
            $tertiary_year_to = $_POST['tertiary_year_to'];
            $tertiary_year_from = $_POST['tertiary_year_from'];

            $student->primary_school = $primary_school;    	
            $student->primary_year_from = $primary_year_from; 	
            $student->primary_year_to = $primary_year_to;	
            $student->secondary_school = $secondary_school; 	
            $student->secondary_year_from = $secondary_year_from; 
            $student->secondary_year_to= $secondary_year_to; 
            $student->school = $tertiary_school; 
            $student->tertiary_year_to= $tertiary_year_to; 
            $student->tertiary_year_from = $tertiary_year_from; 
            

            $student->update($scholar_id);
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Update has been successfully!",
                    "type" => "success"
                )),
                'expire' => 1
            ));
            redirect("$this->link/scholar?view=view&id=$scholar_id");
        }
    }
    public function doEditApp() {
        if (isset($_POST['save'])) {
            
            $student = new NewScholar();
            
            $scholar_id = $_POST['scholar_id'];

            
				$Course = $_POST['Course'];
				$year_level = $_POST['year_level'];

 
				$student->Course= $Course;	
				$student->year_level= $year_level; 
                $student->update($scholar_id);
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Update has been successfully!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));
                redirect("$this->link/scholar?view=view&id=$scholar_id");
        }
    }
    public function doActivate() {
        $link = $_GET["link"];
        if(!empty($_GET["status"]) && $_GET['status']=="on") {
            $sql = "UPDATE user_acc SET account_status = 'activate' WHERE USERID = (SELECT user_id FROM scholar_info WHERE scholar_id =".$_GET['id'].")";
            $this->db->query($sql);
            redirect("$link/scholar");
        }
        else if(!empty($_GET["status"]) && $_GET['status']=="off") {

            $sql = "UPDATE user_acc SET account_status = 'deactivate' WHERE USERID = (SELECT user_id FROM scholar_info WHERE scholar_id =".$_GET['id'].")";
            $this->db->query($sql);
            redirect("$link/scholar");
        }
        else {
            redirect("$link/scholar");
        }
    }
    public function doVerify() {
        
        $link = $_GET["link"];
        if(!empty($_GET["status"])) {
            $sql = "UPDATE user_acc SET account_approval = '".$_GET['status']."' WHERE USERID = (SELECT user_id FROM scholar_info WHERE scholar_id =".$_GET['id'].")";
            $this->db->query($sql);
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Schollar status is update successfully!",
                    "type" => "success"
                )),
                'expire' => 1
            ));
            
            redirect("$link/scholar");
        }
        else {
            redirect("$link/scholar");
        }
    }
}