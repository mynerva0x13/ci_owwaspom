<?php

class AnnouncementSub
{
    public function announcementController($self)
    {
        $content = null;
        $title = null;

        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            case "add":
                $title = 'Add';
                $res = $self->Announcement->single_announcement($_GET['id']);
                $content = $self->load->view(
                    'Scholar/theme/modules/announcement/add',
                    array(
                        "res" => $res,
                    ),
                    true
                );
                break;
            default:
                $title = 'List';
                $mydb = $self->db->query("SELECT * FROM  `announcement` ORDER BY id_announcement DESC");
                $cur = $mydb->result();
                $message = null;

                $cookie = $self->input->cookie('message', true);

                if (!empty($cookie)) {
                    $ck = json_decode($cookie);
                    $message = $self->Session->MessageResponse($ck->message, $ck->type);
                }

                $content = $self->load->view(
                    'Scholar/theme/modules/announcement/list',
                    array(
                        "output" => $cur,
                        "response" => $message
                    ),
                    true
                );
                break;
        }

        $self->load->view(
            'resource',
            array(
                'body' =>  $self->load->view(
                    "Scholar/theme/template",
                    array(
                        
                        "name"=>$_SESSION['NAME'],
                        "content" =>  $content,
                        "cur" => $self->countNotif($_SESSION['USERID']),
                        "title" => "Announcement"
                    ),
                    true
                ),
                "title" => $title
            )
        );
    }
}
