<?php
class profileStaff
{
    public function profileController($self,$link)
    {
        $content = null;
        $title = null;
        $message = null;

        $cookie = $self->input->cookie('message', true);

        if (!empty($cookie)) {
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }

        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            case "editme":  
                $id = $_GET['id'];
                $mydb = $self->db->query("SELECT * FROM  `request_info` where request_info_id = $id ");
                $cur = $mydb->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit',
                    array(
                        "singlestudent" => $cur[0],
                        "link"=>$link,
                        "response" => $message,
                    ),
                    true
                );
                break;
            case "editfam":
                $id = $_GET['id'];
                $mydb = $self->db->query("SELECT * FROM  `request_info` where request_info_id = $id ");
                $cur = $mydb->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit2',
                    array(
                        
                        "link"=>$link,
                        "singlestudent" => $cur[0],
                        "response" => $message,
                    ),
                    true
                );
                break;
            case 'edited':
                $id = $_GET['id'];
                $mydb = $self->db->query("SELECT * FROM  `request_info` where request_info_id = $id ");
                $cur = $mydb->result();

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit3',
                    array(
                        "link"=>$link,
                        "singlestudent" => $cur[0],
                        "response" => $message,
                    ),
                    true
                );
                break;
            case 'editapp':
                $student = new Student();
                $singleStudent = $student->single_students($_GET['id']);

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit4',
                    array(
                        "singlestudent" => $singleStudent,
                        "response" => $message,
                    ),
                    true
                );
                break;
            default:
                $id = $_GET['id'];
                $mydb = $self->db->query("SELECT * FROM  `request_info` where scholar_id = $id ");
                $cur = $mydb->result();
                $content = $self->load->view(
                    'Scholar/theme/modules/profile/list',
                    array(
                        "output" => $cur,
                        "response" => $message,
                        "link"=>$link,
                        "cur" => $cur,
                    ),
                    true
                );
                break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Scholar Edit",
            "link"=>$link
        ));
    }
}
