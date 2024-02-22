<?php

class DocumentsSub {
    public function documentsController($self,$link) {
        $content = "";
        $title = "";
        $message = null;

        $cookie = $self->input->cookie('message', true);

        if (!empty($cookie)) {
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }

        $user = $_SESSION['USERID'];


        $student = new Student();
        $singleStudent = $student->single_students($user);
        if(!empty($_GET['id'])) {
            $id = $_GET['id'];
        }
        switch (!empty($_GET['view']) ? $_GET['view'] : null ) {
            case "add":
                
             
                $mydb = $self->db->query("SELECT * 
                FROM  `scholar_info` where user_id = $user");
                $cur = $mydb->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/document/add',
                    array(
                        "cur2" => $cur, 
                        "acc" => $singleStudent,
                        "user" => $user
                  
                    ),
                    true
                );
            break;
            case "edit":
                $mydb = $self->db->query("SELECT * 
                FROM  `upload_documents` where document_id = $id")->result();
                
                $mydb2 = $self->db->query("SELECT * 
                FROM  `scholar_info` where user_id = $user");
                $cur2 = $mydb2->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/document/add',
                    array(
                        "cur" => $mydb,   
                        "cur2"=>$cur2,
                        "acc" => $singleStudent,
                        "user" => $user
                  
                    ),
                    true
                );
                break;
                case "delete":

                    break;
            default:
                $mydb = $self->db->query("SELECT * FROM `upload_documents` WHERE report_sender = (SELECT scholar_id FROM scholar_info WHERE user_id = $user) AND deleted_at is null");
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

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Scholars",
            "link"=>$link
        ));

    }
}
