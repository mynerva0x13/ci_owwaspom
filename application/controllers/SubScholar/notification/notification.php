<?php

class notifSub {
    public function notificationsController($self,$link="") {
        $content = "";
        $title = "";
        $message = null;

        $id = $_SESSION['USERID'];

        
        switch (!empty($_GET['view']) ? $_GET['view'] : null) {
            default:
            $student = $self->db->query("SELECT * FROM `scholar_info` WHERE user_id = $id  ")
                ->result();
            $ids = $student[0]->scholar_id;
            $mynotif = $self->db->query("SELECT * FROM `notification` WHERE (notification_for = 'Scholar' OR notification_for = $ids) AND notification_status = 'unread'")
                ->result();

            $res = $self->db->query("SELECT * FROM `notification` WHERE notification_for = 'Scholar' AND notification_status = 'read'")
                ->result();
    

                $content = $self->load->view(
                        'Scholar/theme/modules/notification/list',
                                array(
                                    "mynotif"=>$mynotif,
                                    "student"=>$student,
                                    "res"=>$res
                                  ),
                                true
                            );
            break;
            
        }

    // $self->load->view('resource', array(
    //         'body' =>  $self->load->view("Scholar/theme/template", array(
                
    //             "name"=>$_SESSION['NAME'],
    //             "content" =>  $content,
    //             "cur" => $self->countNotif($_SESSION['USERID']),
    //             "title" => "Announcement"
    //         ), true),
    //         "title" => $title
    //     ));
    $self->view_render(array(
        "content"=>$content,
        "title"=>"Notification",
        "link"=>$link,
        "script"=>$script
    ));
    }
}