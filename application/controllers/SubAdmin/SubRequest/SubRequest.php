<?php

class SubRequest {
    public function editRequest($self,$link) {
        $content = null;
        
        switch (!empty($_GET['view']) ? $_GET['view'] : null) {

            default:
            
            $query = "SELECT * FROM `request_info` r_info INNER JOIN scholar_info s_info ON s_info.scholar_id = r_info.scholar_id WHERE r_info.request_status='pending'";
            $cur = $self->db->query($query)->result();

            $content = $self->load->view("Admin/modules/request/list.php",array(
                "response"=>null,
                "cur"=>$cur,
                "link"=>$link
            ),true);
            break;
        }
        $self->view_render(array(
            "content"=>$content,
            "title"=>"Scholars",
            "link"=>$link
        ));
    }
}