<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'controllers/SubAdmin/annoucement/annoucement.php';

require_once APPPATH.'controllers/SubAdmin/scholar/scholar.php';


require_once APPPATH.'controllers/SubStaff/reports/listofScholar.php';

require_once APPPATH.'controllers/SubStaff/User/userSub.php';
require_once APPPATH.'controllers/SubStaff/reports/SubSubmitted_Documents.php';
require_once APPPATH.'controllers/SubStaff/reports/SubAttended_activities.php';

require_once APPPATH.'controllers/SubAdmin/calendar/SubCalendar.php';
require_once APPPATH.'controllers/SubScholar/profile/profileStaff.php';
require_once APPPATH.'controllers/SubAdmin/SubRequest/SubRequest.php';

class Staff extends CI_Controller {

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

        $this->load->model("Initialize/Request");

        $this->load->model("Initialize/Dates");
        
        $this->load->model("Initialize/User");
        $this->message = null;

        
        $this->announcement = new announcementSub();
        $this->scholar = new ScholarSub();
        $this->reports = new SublistofScholar();
        $this->user = new userSub();

        $this->profile = new profileStaff();
        $this->Submitted_Documents = new SubSubmitted_Documents();
        $this->Attended_activities = new SubAttended_activities();
        $this->calendars = new SubCalendar();
        $this->req = new SubRequest();
    }
    function accountSession() {
        if(!$_SESSION['loginStatus']) {
            redirect('login');
        }
    }

    function view_render($arr) {
        $cr = $this->db->query("
            SELECT COUNT(*) AS count
            FROM `notification`
            WHERE notification_status NOT IN ('read') AND notification_for = 'Staff'
        ")->result();

        $this->load->view(
            'resource',
            array(
                'body' => $this->load->view(
                    $arr['link']."/template",
                    array(
                        "content" => $arr['content'],
                        "cur" => $cr[0],
                        "title" => $arr['title'],
                        "name" => $_SESSION['NAME'],
                        "script"=>(!empty($arr['script'])) ? $arr['script']: ''
                    ),
                    true
                ),
                "title" => $arr['title']
            )
        );
    }

    function dash() {

        $total_scolar = $this->db->query("SELECT COUNT(*) as total FROM scholar_info WHERE `graduate` != 'yes'")->result();
        $odsp = $this->db->query("SELECT COUNT(*) as total FROM scholar_info where program LIKE 'ODSP' AND `graduate` != 'yes'")->result();
        $odsp_plus = $this->db->query("SELECT COUNT(*) as total FROM scholar_info where program LIKE 'ODSP+' AND `graduate` != 'yes'")->result();
        $edpse = $this->db->query("SELECT COUNT(*) as total FROM scholar_info where program LIKE 'EDSP' AND `graduate` != 'yes'")->result();
        $edpse_plus = $this->db->query("SELECT COUNT(*) as total FROM scholar_info where program LIKE 'EDSP+' AND `graduate` != 'yes'")->result();
        $ELAP = $this->db->query("SELECT COUNT(*) as total FROM scholar_info where program LIKE 'ELAP%' AND `graduate` != 'yes'")->result();

      


        return array(
            "total_scolar"=>$total_scolar[0]->total,
            "odsp"=>$odsp[0]->total,
            "odsp_plus"=>$odsp_plus[0]->total,
            "edpse"=>$edpse[0]->total,
            "edpse_plus"=>$edpse_plus[0]->total,
            "ELAP"=>$ELAP[0]->total
        );

    }

    public function index() {
        $this->Dashboard();
    }

    public function Dashboard() {
        
        $title = "Dashboard";
        $content = "";

       
 $cur = $this->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = 'Staff'")
 ->result();

        $this->load->view(
            'resource',
            array(
                'body' =>  $this->load->view(
                    "Staff/template",
                    array(
                        "content" =>  $this->load->view("Staff/modules/dashboard",$this->dash(),true),
                        "title" => "Dashboard",
                        "cur" => $cur[0],
                        "name" => $_SESSION['NAME']
                    ),
                    true
                ),
                "title" => $title
            )
        );
    }
    public function announcement() {
        $this->announcement->announcementController($this,"Staff");
    }
    public function Scholar() {
        $this->scholar->scholarController($this,"Staff");
    }
    public function Scholar_list() {
        $this->reports->listofScholar($this,"Staff");
    }

    public function Submitted_Documents() {
        $this->Submitted_Documents->index($this,"Staff");
    }
    public function Attended_activities() {
        $this->Attended_activities->index($this,"Staff");
    }
    
    public function User() {
        $this->user->userController($this,"Staff");
    }
    
    public function Calendar() {
        $this->calendars->userCalendar($this,"Staff");
    }
    public function RequestUpdate() {
        
        $this->req->editRequest($this,"Staff");
    }
    public function studentProfile() {
        $this->profile->profileController($this,"Staff");
      }
  
    public function notification() {
        
    $id = $_SESSION['USERID'];

    $user = new User();
    $res = $user->single_user($id);

        $this->view_render(array(
            "content"=>$this->load->view("Staff/modules/notification/list",["res"=>$res,
            "link_direct"=>"Staff"],true),
            "title"=>"Scholars",
            "link"=>"Staff"
        ));
    }
}