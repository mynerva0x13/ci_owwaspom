<?php

class DocumentsSub {
    public function documentsController($self) {
        $content = "";
        $title = "";
        $message = null;

        $cookie = $self->input->cookie('message', true);

        if (!empty($cookie)) {
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }
        $user = $_SESSION['USERID'];

        echo $user;

        $student = new Student();
        $singleStudent = $student->single_students($user);

        switch (!empty($_GET['view']) ? $_GET['view'] : null) {
            case "add":
                
             
                $mydb = $self->db->query("SELECT * 
                FROM  `scholar_info` where user_id = $user");
                $cur = $mydb->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/document/add',
                    array(
                        "cur" => $cur,   
                        "acc" => $singleStudent,
                        "user" => $user
                  
                    ),
                    true
                );
            break;
            default:
                $mydb = $self->db->query("SELECT * FROM `upload_documents`");
                $cur = $mydb->result();


                $content = $self->load->view(
                    'Scholar/theme/modules/document/list',
                    array(
                        "cur" => $cur,
                        "user" => $user,
                        "response" => $message,
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
