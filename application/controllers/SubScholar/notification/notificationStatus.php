<?php

class notificationStatus extends CI_Controller
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
        
        $this->load->model("Initialize/Documents");
    }

    public function doUpdate()
		{

            $notificationId = $_GET['id'];

            $res = $this->db->query("SELECT * FROM `notification` WHERE `notification_id` = $notificationId")
            ->result();

            foreach ($res as $result) {
                $notif_type = $result->notification_type;
                $notif = $result->catch_id;
            
                $sql = "UPDATE `notification` SET `notification_status`='read' WHERE `notification_id` = $notificationId";
                $this->db->query($sql);

                redirect("Scholar/announcement");
            }

        }

    }
    ?>