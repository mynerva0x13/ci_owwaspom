<?php

class scholar1 extends CI_Controller
{
    public function __construct()
    {

    }

    public function deny() {
        if(!empty($_GET['id'])) {
            $query = "SELECT * FROM `request_info` info INNER JOIN user_acc acc ON info.user_id = acc.USERID WHERE info.deleted_at IS NULL AND acc.account_approval IN ('pending')";
            $cur = $self->db->query($query)->result();

        }
        else {
            redirect("Staff/RequestUpdate");
        }
    }
}