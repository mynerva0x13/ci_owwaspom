<?php

class SublistofScholar {

    public function listofScholar($self,$link) {

        
 $cr = $self->db->query("SELECT count(*) as count FROM `notification` where notification_status not in('read') AND notification_for = 'Administrator'")
 ->result();
        $content = null;
        $title = null;
        $message = null;
        $cookie = $self->input->cookie('message', true);
        $getJSON = null;
        if (!empty($cookie)) {  
            $ck = json_decode($cookie);
            $message = $self->Session->MessageResponse($ck->message, $ck->type);
        }
        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            case "add":
                $content = $self->load->view("staff/modules/reports/LIS_add",
                array(
                ),true
            );
                break;
            default:
        $USERID = $self->session->userdata('USERID');

        $query1 = $self->db->select('staff_address')
                  ->from('user_acc')
                  ->where('USERID', $USERID)
                  ->get();

        if($query1 && $query1->num_rows() > 0) {
            $row = $query1->row();
            $staffLocation = $row->staff_address;

            $query2 = $self->db->select('*')
                      ->from('scholar_info')
                      ->where('graduate !=', 'yes')
                      ->like('scholar_region', $staffLocation)
                      ->get();

            $cur = $query2->result();
            $content = $self->load->view("staff/modules/reports/list_of_scholar",
            array(
                "cur" => $cur,
                "response" => $message,
            ),true
        );
        }

        
        break;
        
    }
      
    $self->view_render(array(
        "content"=>$content,
        "title"=>"Attended Activitites",
        "link"=>$link
    ));
    }
}