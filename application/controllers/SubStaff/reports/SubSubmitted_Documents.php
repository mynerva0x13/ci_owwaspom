<?php
class SubSubmitted_Documents {
    
    function index($self,$link) {
        
        $content = null;
        $title = null;
        $message = null;
        $getJSON = null;

        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {
            default:
            $content = $self->load->view("staff/modules/reports/submitted_doc",
                array(
                    "cur"=>array(),
                ),true
                );
            break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Submitted Documents",
            "link"=>$link
        ));
    }
}