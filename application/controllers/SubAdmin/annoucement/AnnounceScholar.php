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
		
        // $this->load->model("Initialize/User");
    }


    function doInsert(){
		global $mydb;
			$stat = "Approved";
				$notification_content = "The Admin posted a new announcement. You can check and comment now.";
				// $recipient = $_POST['Recipient'];
				$time = date('Y-m-d H:i:s');
			

			if ($_POST['content'] == "") {
				message("Please insert announcement!", "error");
				redirect('index.php?view=add');
			} else {
	
				// Create a new instance of the Announcement class
				$annoucement = new Announcement();
	
				// Set the properties of the announcement object
				$annoucement->announcement_desc = $_POST['content'];
				$annoucement->date_posted  = date("Y-m-d H:i:s");
				$annoucement->author = $_SESSION['NAME'];
				$annoucement->announcement_stat = $stat;
	
				// Call the create() method to insert the announcement into the database
				$annoucement->create();
	
				// Get the ID of the just inserted announcement
				$announcementId = $annoucement->getLastInsertId();
	
				// Check if the announcement ID is retrieved successfully
				if ($announcementId) {
					// Construct the SQL query to insert the notification
					$sql2 = "INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
							VALUES('{$announcementId}','announcement','{$notification_content}','unread','{$time}','{$recipient}', '{$_SESSION['NAME']}')";
					
					// Set the SQL query for execution
					$this->db->query($sql2);
	
					// Execute the query to insert the notification
					// $mydb->executeQuery();

					
					$subject = "OWWA Announcement Update";
					$headers  = "From: " . strip_tags('owwaspom@gmail.com
					') . "\r\n";
					$headers .= "Reply-To: " . strip_tags('mamanaoelcid@gmail.com') . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
					$msg = '
				
					<div style="background-color: #f0f0f0; border: 1px solid #cccccc; padding: 20px; width: 800px; margin: 0 auto; text-align:center;">
						<h2>Overseas Workers Welfare Administration Online Monitoring System </h2>
						</div>
					
					<div style="background-color: #f0f0f0; border: 1px solid #cccccc; padding: 20px; width: 800px; margin: 0 auto;">
						<h2>New Announcement!</h2>
						<p>Dear User,</p>
						<p>We are pleased to inform you that a new announcement has been posted on the OWWA Online Monitoring System.</p>
						<p>Stay updated with the latest information and important updates by logging into your account.</p>
						<p>Click the button below to access the system:</p>
						<p><a class="btn" href="http://localhost/OWWASPOM/login.php">Login to OWWA Monitoring System</a></p>
						<p>If you have any questions or need further assistance, please dont hesitate to contact our support team.</p>
						<p>Best regards,</p>
						<p>The OWWA Online Monitoring System Team</p>
					</div>
					
					</div>
					</body>
					</html>
					';
						// mail('mamanaoelcid@gmail.com',$subject,$msg,$headers);
						// message("Announcement has been posted successfully!", "success");
                        $this->input->set_cookie(array(
                            "name" => "message",
                            "value" => json_encode(array(
                                "message" => "Your comment has been posted successfully!Announcement has been posted successfully!",
                                "type" => "success"
                            )),
                            'expire' => 1
                        ));

				
					}
				
            }
	}

    public function doDelete() {
         
				$BLOGID = 	$_GET['id'];
				$stat = "hidden";

				$annoucement = New Announcement();
				$annoucement->announcement_stat = $stat; 
	 		 	$annoucement->update($BLOGID);

		 		// $sql ="DELETE FROM `announcement`  WHERE`id_announcement`='{$BLOGID}'";
				$sql ="UPDATE `announcement` SET `announcement_stat`='{$stat}'  WHERE`id_announcement`='{$BLOGID}'";
				$this->db->query($sql);
			 
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Announcement has been removed!",
                        "type" => "info"
                    )),
                    'expire' => 1
                ));

				$this->input->set_cookie(array(
					"name" => "message",
					"value" => json_encode(array(
						"message" => "Your comment has been deleted successfully!Announcement has been posted successfully!",
						"type" => "success"
					)),
					'expire' => 1
				));

				
                redirect($_GET["link"]."/announcement");
		 
    }

    function doEdit(){

		global $mydb; 

        $BLOGID = 	$_GET['id'];
		$stat = "Approved";

		if ($_POST['content'] == ""){
		$messageStats = false;
        $this->db->query($sql);
			 
                $this->input->set_cookie(array(
                    "name" => "message",
                    "value" => json_encode(array(
                        "message" => "Required to edit!",
                        "type" => "error"
                    )),
                    'expire' => 1
                ));
                redirect("Staff/Announcement");

		}else{	
		
			// $annoucement = New Announcement();	 
			$announcement_desc = $_POST['content'];
			// $annoucement->announcement_stat = $stat; 
			// $annoucement->update($BLOGID);  

			$sql ="UPDATE `announcement` SET `announcement_desc`='{$announcement_desc}'  WHERE`id_announcement`='{$BLOGID}'";
			$this->db->query($sql);

            $this->input->set_cookie(array(
                "name" => "message",
                "value" => json_encode(array(
                    "message" => "Announcement has been updated!",
                    "type" => "success"
                )),
                'expire' => 1
            ));
			}
	}
}