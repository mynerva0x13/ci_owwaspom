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
                
                $result = $self->db->query("SELECT * FROM scholar_info WHERE scholar_id=".$_GET['id'])->result();
                // print_r($result);

                if(!empty($result)) {
                    $content = $self->load->view("Admin/modules/scholar/view", ["response"=> $message,"link2"=>$link,"result"=>$result[0]], true);
                }
                else {
                    Redirect("$link/notification");
                }
                break;

            case "update":
                $content = $self->load->view("Admin/modules/scholar/edit", [
                    "con" => $_GET['id'],
                    "singlestudent" => $self->Student->single_students($_GET['id']),
                    "link2"=>$link
                ], true);
                break;

                case "viewdoc":
                    $content = $self->load->view("Admin/modules/scholar/viewdoc", ["response"=> $message,"link2"=>$link], true);
          
                    break;
            case "add1":
                $content = $self->load->view("Admin/modules/scholar/add1", ["link2"=>$link], true);
                break;

            case "edit":
                $content = $this->loadScholarEditView($self, 'edit', $link);
                break;
            case "editfam":
                $content = $this->loadScholarEditView($self, 'editfam', $link);
                break;
            case "edited":
              
                $content = $this->loadScholarEditView($self, 'edited', $link);
                break;
            case "editapp":
                $content = $this->loadScholarEditView($self, 'editapp', $link);
                break;
            default:
                $query = "SELECT * FROM `scholar_info` info INNER JOIN user_acc acc ON info.user_id = acc.USERID WHERE info.deleted_at IS NULL AND acc.account_approval IN ('','accept','pending') and ( graduated_at is null AND terminated_at is null)";
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
    function loadScholarEditView($self, $viewName, $link) {
        $scholar_id = $_GET['id'];
    
        $student = new Student();
        $singlestudent = $student->single_students($scholar_id);
    
        $content = $self->load->view("Admin/modules/scholar/edit/{$viewName}", [
            "singlestudent" => $singlestudent,
            "id" => $_GET['id'],
            "link2"=>$link
        ], true);
    
        return $content;
    }
}
