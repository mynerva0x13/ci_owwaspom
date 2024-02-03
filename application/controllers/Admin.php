<?php

require_once APPPATH.'controllers/SubAdmin/annoucement/annoucement.php';

require_once APPPATH.'controllers/SubAdmin/annoucement/annoucement.php';

require_once APPPATH.'controllers/SubAdmin/scholar/scholar.php';


require_once APPPATH.'controllers/SubStaff/reports/listofScholar.php';

require_once APPPATH.'controllers/SubStaff/User/userSub.php';
require_once APPPATH.'controllers/SubStaff/reports/SubSubmitted_Documents.php';
require_once APPPATH.'controllers/SubStaff/reports/SubAttended_activities.php';

require_once APPPATH.'controllers/SubAdmin/calendar/SubCalendar.php';
class Admin extends CI_Controller {
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
        
        $this->announcement = new announcementSub();
    }

    function countNotif() {

        $ct = $this->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = 'Administrator'")
        ->result();

        return $ct;
        
    }
    function view_render($arr) {
        $role = ($arr['link']=="Staff") ? "Staff" : "Administration";
        $cr = $this->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = '$role'")
        ->result();

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

    public function announcement() {
        $this->announcement->announcementController($this,"Admin");
    }

    public function Dashboard() {
        
        $title = "";
        $content = "";

       
 $cur = $this->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = 'Administrator'")
 ->result();

        $this->load->view(
            'resource',
            array(
                'body' =>  $this->load->view(
                    "Admin/template",
                    array(
                        "content" =>  $this->load->view("Admin/modules/dashboard",$this->dash(),true),
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
    public function Logout() {
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