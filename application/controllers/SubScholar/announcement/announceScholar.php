<?php

class AnnounceScholar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        $this->load->model("Initialize/Student");
        $this->load->model("Initialize/Func_Misc");
        $this->load->model("Initialize/Account");
        $this->load->model("Initialize/Announcement");
        $this->load->model("Initialize/Comments");
        $this->load->model("Initialize/Replies");
    }

    public function doReply()
    {
        
        $link = (!empty($_GET['link'])) ? $_GET['link'] : 'Scholar';

        global $mydb;
        $comment_id = $_POST['comment_id'];
        $reply_text = $_POST['reply_text'];
        $reply_text = str_replace("'", "\'", $reply_text);
        $notification_content = " " . $_SESSION['NAME'] . " replied to your announcement. You can check and comment now.";
        $time = date('Y-m-d H:i:s');
        $recipient = "Administrator";

        if ($_POST['reply_text'] == "") {
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Are you sure you want to leave without a comment!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            redirect($_SESSION['link']."/announcement");
        } else {
            $reply = new Replies();
            $reply->commentid = $comment_id;
            $reply->reply_text = $reply_text;
            $reply->reply_create_at = date("Y-m-d H:i:s");
            $reply->reply_status = 'read';
            $reply->who_reply = $_SESSION['USERID'];
            $reply->create();

            $replytId = $reply->getLastInsertId();

            if ($replytId) {
                $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
                        VALUES('{$replytId}','reply','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
                $this->db->query($sql2);

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Successfully replied!!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));

                redirect($_SESSION['link']."/announcement");
            } else {
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "There is an error with your action in replying!",
                        "type" => "Warning"
                    )),
                    'expire' => 1
                ));
                redirect($_SESSION['link']."/announcement");
            }
        }
    }

    public function doComment()
    {

        $link = (!empty($_GET['link'])) ? $_GET['link'] : 'Scholar';

        global $mydb;
        $id_announcement = $_POST['id_announcement'];
        $comment_text = $_POST['comment_text'];
        $comment_text = str_replace("'", "\'", $comment_text);
        $notification_content = "" . $_SESSION['NAME'] . " commented on your announcement. You can check and comment now.";
        $time = date('Y-m-d H:i:s');
        $recipient = "Administrator";

        if ($_POST['comment_text'] == "") {
            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Your comment box is empty!",
                    "type" => "error"
                )),
                'expire' => 1
            ));
            redirect($_SESSION['link']."/announcement");
        } else {
            $comment = new Comments();
            $comment->announcement_id = $id_announcement;
            $comment->comment_text = $comment_text;
            $comment->comment_created_at = date('Y-m-d H:i:s');
            $comment->comment_status = 'unread';
            $comment->who_commented = $_SESSION['USERID'];
            $comment->create();

            $commentId = $comment->getLastInsertId();

            if ($commentId) {
                $sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
                        VALUES('{$commentId}','comment','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
                $this->db->query($sql2);

                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Your comment has been posted successfully!",
                        "type" => "success"
                    )),
                    'expire' => 1
                ));
                redirect($_SESSION['link']."/announcement");
            } else {
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "There was an error posting your comment!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
                redirect($_SESSION['link']."/announcement");
            }
        }
    }
}
