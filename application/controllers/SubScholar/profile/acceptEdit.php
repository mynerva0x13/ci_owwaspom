<?php
class acceptEdit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        $this->load->model("Initialize/Student");
        $this->load->model("Initialize/Func_Misc");
        $this->load->model("Initialize/Account");
        $this->load->model("Initialize/Request");
    }

    public function doEditme()
    {
        $scholar_id = $_POST['scholar_id'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $suffix = $_POST['suffix'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $phone_num = $_POST['phone_num'];
        $religion = $_POST['religion'];
        $citizenship = $_POST['citizenship'];
        $name = $_SESSION['NAME'];
        $notification_content = "Adminstrator has an edit your request. Check it.";
        $recipient = "Admin";
        $time = date('Y-m-d H:i:s');

        $request = new Student();
        $request->firstname = $firstname;
        $request->middlename = $middlename;
        $request->lastname = $lastname;
        $request->suffix = $suffix;
        $request->age = $age;
        $request->address = $address;
        $request->birthdate = $birthdate;
        $request->email = $email;
        $request->phone_num = $phone_num;
        $request->religion = $religion;
        $request->citizenship = $citizenship;
        $request->update($scholar_id);

        if ($scholar_id) {
            $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
                    VALUES('{$_GET['id']}','request','{$notification_content}','unread','{$time}','{$scholar_id}', 'Administrator')";
            $this->db->query($sql2);
            $sql3 = "UPDATE `request_info` SET request_status='accept' where request_info_id = ".$_GET['id'];
    $this->db->query($sql3);
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Wait until the admin has approved your request.",
                    "type" => "info"
                )),
                'expire' => 3
            ));
            redirect("{$_GET['link']}/RequestUpdate");
            } else {
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Failed to edit information",
                    "type" => "error"
                )),
                'expire' => 3
            ));   redirect("{$_GET['link']}/RequestUpdate");

            }
    }

    public function editfame()
    {
        $scholar_id = $_POST['scholar_id'];
        $father_fname = $_POST['father_fname'];
        $father_mname = $_POST['father_fname'];
        $father_lname = $_POST['father_lname'];
        $father_suffix = $_POST['father_suffix'];
        $father_occupation = $_POST['father_occupation'];
        $father_status = $_POST['fatherstatus'];
        $Father_Educ = $_POST['Father_Educ'];
        $Father_contactnum = $_POST['father_contactnum'];
        $mother_fname = $_POST['mother_fname'];
        $mother_mname = $_POST['mother_mname'];
        $mother_lname = $_POST['mother_lname'];
        $mother_suffix = $_POST['mother_suffix'];
        $mother_occupation = $_POST['mother_occupation'];
        $mother_status = $_POST['motherstatus'];
        $mother_Educ = $_POST['mother_Educ'];
        $mother_contactnum = $_POST['mother_contactnum'];
        $name = $_SESSION['NAME'];
        $notification_content = "$name has an edit request. Check and validate it now.";
        $recipient = "Admin";
        $time = date('Y-m-d H:i:s');
        $number_sibling = $_POST['number_sibling'];

        $request = new Request();
        $request->father_fname = $father_fname;
        $request->father_mname = $father_mname;
        $request->father_lname = $father_lname;
        $request->father_suffix = $father_suffix;
        $request->father_occupation = $father_occupation;
        $request->father_status = $father_status;
        $request->Father_Educ = $Father_Educ;
        $request->Father_contactnum = $Father_contactnum;

        $request->number_siblings = $number_sibling;
        $request->mother_fname = $mother_fname;
        $request->mother_mname = $mother_mname;
        $request->mother_lname = $mother_lname;
        $request->mother_suffix = $mother_suffix;
        $request->mother_occupation = $mother_occupation;
        $request->mother_status = $mother_status;
        $request->mother_Educ = $mother_Educ;
        $request->mother_contactnum = $mother_contactnum;
        $request->request_status = "pending";
        $request->request_description = "2";
        $request->update($scholar_id);

        if ($scholar_id) {
            $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
            VALUES('{$_GET['id']}','request','{$notification_content}','unread','{$time}','{$scholar_id}', 'Administrator')";
    $this->db->query($sql2);
    $sql3 = "UPDATE `request_info` SET request_status='accept' where request_info_id = ".$_GET['id'];
$this->db->query($sql3);
    $this->input->set_cookie(array(
        "name" => "message",
        "value" => json_encode(array(
            "message" => "The request has been verified.",
            "type" => "info"
        )),
        'expire' => 3
    ));
    redirect("{$_GET['link']}/RequestUpdate");
}
    else {
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "The request update is been denied.",
                    "type" => "info"
                )),
                'expire' => 3
            ));
            redirect("{$_GET['link']}/RequestUpdate");
        }
    }

    public function doEditeduc()
    {
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
        $name = $_SESSION['NAME'];
        $notification_content = "$name has an edit request. Check and validate it now.";
        $recipient = "Administrator";
        $time = date('Y-m-d H:i:s');

        $request = new Request();
        $request->primary_school = $primary_school;
        $request->primary_year_from = $primary_year_from;
        $request->primary_year_to = $primary_year_to;
        $request->secondary_school = $secondary_school;
        $request->secondary_year_from = $secondary_year_from;
        $request->secondary_year_to = $secondary_year_to;
        $request->tertiary_school = $tertiary_school;
        $request->tertiary_year_to = $tertiary_year_to;
        $request->tertiary_year_from = $tertiary_year_from;
        $request->request_status = "pending";
        $request->request_description = "3";
        $request->update($scholar_id);


        if ($scholar_id) {
            $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
            VALUES('{$_GET['id']}','request','{$notification_content}','unread','{$time}','{$scholar_id}', 'Administrator')";
    $this->db->query($sql2);
    $sql3 = "UPDATE `request_info` SET request_status='accept' where request_info_id = ".$_GET['id'];
$this->db->query($sql3);
    $this->input->set_cookie(array(
        "name" => "message",
        "value" => json_encode(array(
            "message" => "The request has been verified.",
            "type" => "info"
        )),
        'expire' => 3
    ));
    redirect("{$_GET['link']}/RequestUpdate");
        }
    }

    public function doEditscholarapp()
    {
        $scholar_id = $_POST['scholar_id'];
        $school = $_POST['school'];
        $school = str_replace("'", "\'", $school);
        $course = $_POST['Course'];
        $course = str_replace("'", "\'", $course);
        $year_level = $_POST['year_level'];
        $year_level = str_replace("'", "\'", $year_level);
        $name = $_SESSION['NAME'];
        $notification_content = "$name has an edit request. Check and validate it now.";
        $recipient = "Administrator";
        $time = date('Y-m-d H:i:s');

        $request = new Request();
        $request->scholar_id = $scholar_id;
        $request->school = $school;
        $request->course = $course;
        $request->year_level = $year_level;
        $request->request_status = "pending";
        $request->request_description = "4";
        $request->create();

        $requestId = $request->getLastInsertId();

        if ($requestId) {
            $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
                    VALUES('{$requestId}','request','{$notification_content}','unread','{$time}','Administrator', '{$scholar_id}')";
            $this->db->query($sql2);
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Wait until the admin has approved your request.",
                    "type" => "info"
                )),
                'expire' => 3
            ));
            redirect("Scholar/studentProfile");
        }
    }
    public function dodeny() {
        $sql3 = "UPDATE `request_info` SET request_status='deny' where request_info_id = ".$_GET['id'];
$this->db->query($sql3);
    $this->input->set_cookie(array(
        "name" => "message",
        "value" => json_encode(array(
            "message" => "The request has been verified.",
            "type" => "info"
        )),
        'expire' => 3
    ));
    redirect("{$_GET['link']}/RequestUpdate");
    }
}
