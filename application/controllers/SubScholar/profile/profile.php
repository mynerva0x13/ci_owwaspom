<?php
class ProfileSub
{
    public function profileController($self)
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
                $student = new Student();
                $singleStudent = $student->single_students($_GET['id']);

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit',
                    array(
                        "singlestudent" => $singleStudent,
                        "response" => $message,
                    ),
                    true
                );
                break;
            case "editfam":
                $student = new Student();
                $singleStudent = $student->single_students($_GET['id']);

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit2',
                    array(
                        "singlestudent" => $singleStudent,
                        "response" => $message,
                    ),
                    true
                );
                break;
            case 'edited':
                $student = new Student();
                $singleStudent = $student->single_students($_GET['id']);

                $content = $self->load->view(
                    'Scholar/theme/modules/profile/edit3',
                    array(
                        "singlestudent" => $singleStudent,
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
                $id = $_SESSION['USERID'];
                $mydb = $self->db->query("SELECT * FROM  `scholar_info` where user_id = $id ");
                $cur = $mydb->result();

                $disableButton = $self->db->query("SELECT * FROM request_info WHERE scholar_id = (SELECT scholar_id from scholar_info WHERE user_id = $id) AND request_status = 'pending'")->result();
                $content = $self->load->view(
                    'Scholar/theme/modules/profile/list',
                    array(
                        "output" => $cur,
                        "disable" => $disableButton,
                        "response" => $message,
                        "cur" => $cur,
                    ),
                    true
                );
                break;
        }

        $self->load->view('resource', array(
            'body' =>  $self->load->view("Scholar/theme/template", array(
                
                "name"=>$_SESSION['NAME'],
                "content" =>  $content,
                "cur" => $self->countNotif($_SESSION['USERID']),
                "title" => "Announcement"
            ), true),
            "title" => $title
        ));
    }
}
