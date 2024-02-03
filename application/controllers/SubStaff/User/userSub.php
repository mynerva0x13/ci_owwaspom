<?php

class userSub {
    public function userController($self, $link) {
        $cr = $self->db->query("
            SELECT COUNT(*) AS count
            FROM `notification`
            WHERE notification_status NOT IN ('read') AND notification_for = 'Administrator'
        ")->result();

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
                $content = $self->load->view("staff/modules/user/add",
                array(),true
                );
            break;
            default:
                $USERID = $self->session->userdata('USERID');

                // First query
                $self->db->select('staff_address');
                $self->db->from('user_acc');
                $self->db->where('USERID', $USERID);
                $query1 = $self->db->get();

                if ($query1->num_rows() > 0) {
                    $row = $query1->row();
                    $staffLocation = $row->staff_address;

                    // Second query using Query Builder
                    $self->db->select('*');
                    $self->db->from('user_acc');
                    $self->db->join('scholar_info', 'user_acc.USERID = scholar_info.user_id');
                    $self->db->like('address', $staffLocation);
                    $query2 = $self->db->get();

                    // Fetch results
                    $cur = $query2->result();
                    $content = $self->load->view("staff/modules/user/list",
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
            "title"=>"Announcement",
            "link"=>$link
        ));

    }
}
