<?php

class announcementSub {
    function announcementController($self,$link) {
          
 $cur = $self->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = 'Administrator'")
 ->result();

        $content = null;
        $title = null;
        $message = null;
        $cookie = $self->input->cookie('message', true);
        $getJSON = null;
        $script = null;
        if (!empty($cookie)) {  
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }
        if(!empty($_GET['val'])) {
            $getJSON = json_decode(urldecode($_GET['val']));
            
            echo "<script>console.log('".json_encode($getJSON)."')</script>";
        }
        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            case "view":
                $title = 'Add';   
                $mydb = $self->db->query("SELECT * FROM  `announcement` WHERE id_announcement = ".$_GET['id']." ORDER BY id_announcement DESC");
                $cur = $mydb->result();
                $content = $self->load->view(
                    'Scholar/theme/modules/announcement/view',
                    array(
                        "output" => $cur,
                        "response" => $message,
                        "link"=>$link
                    ),
                    true
                );
                break;
            case "update":
            case "add":
                // if()
                

                $content = $self->load->view("admin/modules/announcement/add",
                array(
                    "con"=>$getJSON,
                    
                    "link"=>$link
                ),true);

                $script = $self->load->view("Admin/modules/announcement/script",
                array(
                    "link"=>$link
                ),true
            );
                break;
            default:
                $content = $self->load->view("Admin/modules/announcement/list",
                array(
                    "output" => $self->db->query("SELECT * FROM  `announcement` ORDER BY id_announcement DESC")->result(),
                    "response" => $message,
                    "link"=>$link
                ),true
            );
            break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Announcement",
            "link"=>$link,
            "script"=>$script
        ));

        // $self->load->view(
        //     'resource',
        //     array(
        //         'body' =>  $self->load->view(
        //             "$link/template",
        //             array(
        //                 "content" =>  $content,
        //                 "cur" => $cur[0],
        //                 "title" => "Announcement",
        //                 "name" => $_SESSION['NAME'],
        //                 "script" => $script
        //             ),
        //             true
        //         ),
        //         "title" => $title
        //     )
        // );

    }
}