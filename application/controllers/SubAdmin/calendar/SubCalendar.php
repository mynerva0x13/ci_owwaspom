
<?php
class SubCalendar {
    function userCalendar($self,$link) {


        $content = null;
        $title = null;
        $message = null;
        $cookie = $self->input->cookie('message', true);
        $getJSON = null;
        $script = null;

        switch ((!empty($_GET['view'])) ? $_GET['view'] : null) {

            case "add":
                $content = $self->load->view("Admin/modules/calendar/add",
                array(
                    "cure" => $self->db->query("SELECT * FROM  `announcement` ORDER BY id_announcement DESC")->result(),
                    "response" => $message,
                    "link"=>$link
                ),true
            );
            break;
            default:
            $content = $self->load->view("Admin/modules/calendar/list",
            array(
                "cure" => $self->db->query("SELECT * FROM  `announcement` ORDER BY id_announcement DESC")->result(),
                "response" => $message,
                "link"=>$link
            ),true
        );
            break;
        }

        $self->view_render(array(
            "content"=>$content,
            "title"=>"Announcement",
            "link"=>$link,
            "script"=>$script
        ));

    }

}