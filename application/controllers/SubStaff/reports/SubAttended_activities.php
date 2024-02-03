<?php

class SubAttended_activities {
    function index($self,$link) {
        
        $content = null;
        $title = null;
        $message = null;
        $getJSON = null;

        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            default:
            $content = $self->load->view("staff/modules/reports/attandance_act",
                array(
                    "cur"=>array(),
                ),true
                );
            break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Attended Activitites",
            "link"=>$link
        ));
    }
}