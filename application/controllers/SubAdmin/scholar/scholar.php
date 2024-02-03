<?php

class ScholarSub {
    
    public function scholarController($self, $link) {
        // Create a MySQLi connection
        $notificationQuery = "SELECT count(*) as count FROM `notification` WHERE notification_status NOT IN ('read') AND notification_for = 'Administrator'";
        $notificationCount = $self->db->query($notificationQuery)->result();

        $content = null;
        $title = null;
        $message = null;

        // Retrieve message from cookie
        $cookie = $self->input->cookie('message', true);
        $getJSON = null;

        if (!empty($cookie)) {  
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }

        switch (!empty($_GET['view']) ? $_GET['view'] : null) {
            case 'view':
                $content = $self->load->view("Admin/modules/scholar/view", ["response"=> $message], true);
                break;

            case "update":
                $content = $self->load->view("Admin/modules/scholar/edit", [
                    "con" => $_GET['id'],
                    "singlestudent" => $self->Student->single_students($_GET['id']),
                ], true);
                break;

            case "add1":
                $content = $self->load->view("Admin/modules/scholar/add1", [], true);
                break;

            case "edit":
                $content = $this->loadScholarEditView($self, 'edit');
                break;
            case "editfam":
                $content = $this->loadScholarEditView($self, 'editfam');
                break;
            case "edited":
              
                $content = $this->loadScholarEditView($self, 'edited');
                break;
            case "editapp":
                $content = $this->loadScholarEditView($self, 'editapp');
                break;
            default:
                $query = "SELECT * FROM `scholar_info` WHERE deleted_at IS NULL";
                $cur = $self->db->query($query)->result();
                $content = $self->load->view("Admin/modules/scholar/list", [
                    "cur" => $cur,
                    "response" => $message,
                    
            "link"=>$link
                ], true);
                break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Scholars",
            "link"=>$link
        ));
    }
    function loadScholarEditView($self, $viewName) {
        $scholar_id = $_GET['id'];
    
        $student = new Student();
        $singlestudent = $student->single_students($scholar_id);
    
        $content = $self->load->view("Admin/modules/scholar/edit/{$viewName}", [
            "singlestudent" => $singlestudent,
            "id" => $_GET['id']
        ], true);
    
        return $content;
    }
}
