<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/SubScholar/announcement/announcement.php';
require_once APPPATH.'controllers/SubScholar/profile/profile.php';
require_once APPPATH.'controllers/SubScholar/documents/documents.php';
require_once APPPATH.'controllers/SubScholar/notification/notification.php';

class Scholar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->database();
        
        $this->load->library('session');
        
        $this->load->model("Initialize/Session");
        $this->load->model("Initialize/Announcement");
        $this->load->model("Initialize/Student");
        $this->load->model("Initialize/Func_Misc");
        $this->load->model("Initialize/Account");
        $this->load->model("Initialize/Comments");
        $this->load->model("Initialize/Replies");

        $this->load->model("Initialize/Dates");
        $this->message = null;


        $this->announcement_Main = new announcementSub();
        
        $this->profile = new profileSub();
        
        $this->documents = new documentsSub();
        
        $this->notifications = new notifSub();
    }
    
    function accountSession() {
        if(!$_SESSION['loginStatus'] || empty($_SESSION)) {
            redirect('login');
        }
    }

    function countNotif($id) {

        $cur = null;
        $id = $id;
        $student = $this->Account->single_user($id);
        
        $mydb = $this->db->query("SELECT * FROM `scholar_info` WHERE user_id = $id  ");
        $student = $mydb->result();
        
        foreach ($student as $students) {
            $ids = $students->scholar_id;
         
            $mydbs = $this->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND ( notification_for = 'Scholar'   OR notification_for = $ids) ");
            return $cur = $mydbs->result();
        }
        
    }
    public function getPercentageFilled($accountID) {
        $query = $this->db->query("
            SELECT scholar_id, ABS((COUNT(*) - COUNT(NULLIF(firstname, '')) - COUNT(NULLIF(middlename, '')) - COUNT(NULLIF(lastname, '')) - COUNT(NULLIF(suffix, '')) 
            - COUNT(NULLIF(age, '')) - COUNT(NULLIF(gender, '')) - COUNT(NULLIF(address, '')) - COUNT(NULLIF(presentaddress, '')) - COUNT(NULLIF(birthdate, '')) - COUNT(NULLIF(email, ''))
            - COUNT(NULLIF(phone_num, '')) - COUNT(NULLIF(telephone_number, '')) - COUNT(NULLIF(religion, '')) - COUNT(NULLIF(citizenship, '')) - COUNT(NULLIF(OFW_firstname, '')) 
            - COUNT(NULLIF(OFW_middlename, '')) - COUNT(NULLIF(OFW_lastname, '')) - COUNT(NULLIF(OFW_suffix, '')) 
            - COUNT(NULLIF(OFW_relationship, '')) - COUNT(NULLIF(category, '')) - COUNT(NULLIF(school, '')) - COUNT(NULLIF(school_address, '')) - COUNT(NULLIF(program, '')) 
            - COUNT(NULLIF(number_siblings, '')) - COUNT(NULLIF(fatherstatus, '')) - COUNT(NULLIF(father_fname, '')) - COUNT(NULLIF(father_mname, '')) - COUNT(NULLIF(father_lname, '')) 
            - COUNT(NULLIF(father_suffix, '')) - COUNT(NULLIF(father_occupation, '')) - COUNT(NULLIF(father_contactnum, '')) - COUNT(NULLIF(Father_Educ, '')) - COUNT(NULLIF(father_email, '')) 
            - COUNT(NULLIF(motherstatus, '')) - COUNT(NULLIF(mother_fname, '')) - COUNT(NULLIF(mother_mname, '')) - COUNT(NULLIF(mother_lname, '')) - COUNT(NULLIF(mother_suffix, '')) 
            - COUNT(NULLIF(mother_occupation, '')) - COUNT(NULLIF(mother_contactnum, '')) - COUNT(NULLIF(mother_email, '')) - COUNT(NULLIF(mother_Educ, '')) - COUNT(NULLIF(Course, '')) 
            - COUNT(NULLIF(year_level, '')) - COUNT(NULLIF(primary_school, '')) - COUNT(NULLIF(primary_year_from, '')) - COUNT(NULLIF(primary_year_to, '')) - COUNT(NULLIF(primary_award, '')) 
            - COUNT(NULLIF(secondary_school, '')) - COUNT(NULLIF(secondary_year_from, '')) - COUNT(NULLIF(secondary_year_to, '')) - COUNT(NULLIF(secondary_award, '')) - COUNT(NULLIF(tertiary_school, '')) 
            - COUNT(NULLIF(tertiary_year_from, '')) - COUNT(NULLIF(tertiary_year_to, '')) - COUNT(NULLIF(tertiary_award, '')) - COUNT(NULLIF(remarks, '')) - COUNT(NULLIF(graduate, '')) 
            - COUNT(NULLIF(graduated_at, ''))) / 59 * 100) AS PercentageFilled
            FROM scholar_info
            WHERE scholar_id = $accountID;
        ");

        $result = $query->row();

        if ($result) {
            return $result->PercentageFilled;
        } else {
            return null;
        }
    }

    public function index() {
        $this->accountSession();
        $student = $this->Student->single_student_userid($_SESSION['USERID'] );
        $accountID = $student->scholar_id;

        echo $accountID;

        $percentageFilled = $this->getPercentageFilled($accountID);

        $message = "";
        if ($percentageFilled !== null) {
            $message =  "Scholar Personal Information<br>$percentageFilled % Complete";
        } else {
            $message =  "No record found.";
        }
        
        $this->load->view('resource', array(
            'body' =>  $this->load->view("Scholar/theme/template",array(
                "cur"=>$this->countNotif($_SESSION['USERID']),
                "title"=>"Dashboard",
                "name"=>$_SESSION['NAME'],
                "content"=>  $this->load->view('Scholar/home',array(
                    "title"=>'Home',
                    "accountID" => $accountID,
                    "result" => $percentageFilled,
                    "message" =>$message
                ),true)
            ),true)
        ));
    }
    
    public function announcement() { 
        
        $this->announcement_Main->announcementController($this);
   
    }
    public function studentProfile() {
      $this->profile->profileController($this);
    }

    public function documents() {
        $this->documents->documentsController($this);
    }

    public function notifications() {
        $this->notifications->notificationsController($this);
    }

    public function logout() {
        unset( $_SESSION['USERID'] );
unset( $_SESSION['NAME'] );
unset( $_SESSION['UEMAIL'] );
unset( $_SESSION['PASS'] );
unset( $_SESSION['TYPE'] );

unset( $_SESSION['loginTo'] );

unset( $_SESSION['account_status'] );
session_destroy();
        redirect('login');
    }


}
?>