<?php

class documentsScholar extends CI_Controller
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
        
        $this->load->model("Initialize/Documents");
    }

	public function doDelete() 
	{
		header('Content-Type: application/json');
		$rawData = file_get_contents("php://input");

		// Decode the JSON data
		$postData = json_decode($rawData, true);
		
		echo json_encode($_POST);
	}
	public function doEdit() {
		if (isset($_POST['save'])) {
			$notification_content = "".$_SESSION['NAME'] ." uploaded documents. You can check it now.";
			$recipient = "Administrator";
			$time = date('Y-m-d H:i:s');
			$description = $_POST['description'];
			$year_level = $_POST['yearlevel'];
			$semester = $_POST['semester'];
			$scholar_id = $_POST['scholar_id'];

			$program = $_POST['program'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$lastname = $_POST['lastname'];
			
			$imageName = $_POST['imageName'];
			$document_name = "";
			$username = $lastname.'_'.$firstname .'_'. $middlename ;
			if (empty($_FILES['fileToUpload']['name']) || empty($year_level) || empty($semester)) {
				
				$file_name = $_FILES['fileToUpload']['name'];
				$file_tmp = $_FILES['fileToUpload']['tmp_name'];
				
				$target_directory = "scholars_document/". $program ."/". $username ."/";
				
				if (!is_dir($target_directory)) {
					mkdir($target_directory, 0777, true);
				}

				$target_file = $target_directory . $file_name;

				if (move_uploaded_file($file_tmp, $target_file)) {

					$imageName = str_replace("'", "\'", $file_name);
				}
			} 
	
				// Specify the directory where you want to save the uploaded file
	
					$document = new Documents();
					$document->document_name = $imageName;
					$document->document_description = $description;
					$document->year_level = $year_level;
					$document->semester = $semester;
					$document->date_submitted = date("Y-m-d H:i:s");
					$document->document_status = "unread";
					$document->report_sender = $scholar_id;
					$document->create();
	
						// Get the ID of the just inserted announcement
						$announcementId = $document->getLastInsertId();
			
						// Check if the announcement ID is retrieved successfully
						if ($announcementId) {
						// 	$mydb = $this->db->query("INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
						//     VALUES('{$announcementId}','Documents','{$notification_content}','unread','{$time}','{$recipient}', '{$scholar_id}')");
						//   $this->db->query($mydb);

		  
						}
							$mydb = $this->db->query("UPDATE `upload_documents` SET deleted_at = NOW() WHERE document_id=".$_POST['doc_id']);
						

						$this->input->set_cookie(array(
							"name" => "message",
							"value" => json_encode(array(
								"message" => "New " . $document_name . " created and file uploaded successfully!",
								"type" => "success"
							)),
							'expire' => 1
						));
						
						redirect("Scholar/documents");
			}
	}
    public function doInsert()
		{
			global $mydb;
	
			if (isset($_POST['save'])) {
				$notification_content = "".$_SESSION['NAME'] ." uploaded documents. You can check it now.";
				$recipient = "Administrator";
				$time = date('Y-m-d H:i:s');
				$description = $_POST['description'];
				$year_level = $_POST['yearlevel'];
				$semester = $_POST['semester'];
				$scholar_id = $_POST['scholar_id'];
	
				$program = $_POST['program'];
				$firstname = $_POST['firstname'];
				$middlename = $_POST['middlename'];
				$lastname = $_POST['lastname'];
	
				$username = $lastname.'_'.$firstname .'_'. $middlename ;
	
				if (empty($_FILES['fileToUpload']['name']) || empty($year_level) || empty($semester)) {
					$this->input->set_cookie(array(
						"name" => "message",
						"value" => json_encode(array(
							"message" => "All fields are required!",
							"type" => "error"
						)),
						'expire' => 1
					));
				redirect("Scholar/documents");
				} else {
					$file_name = $_FILES['fileToUpload']['name'];
					$file_tmp = $_FILES['fileToUpload']['tmp_name'];
		
					// Specify the directory where you want to save the uploaded file
					$target_directory = "scholars_document/". $program ."/". $username ."/";
					
                    if (!is_dir($target_directory)) {
                        mkdir($target_directory, 0777, true);
                    }

                    $target_file = $target_directory . $file_name;

					if (move_uploaded_file($file_tmp, $target_file)) {
						$document_name = str_replace("'", "\'", $file_name);
		
						$document = new Documents();
						$document->document_name = $document_name;
						$document->document_description = $description;
						$document->year_level = $year_level;
						$document->semester = $semester;
						$document->date_submitted = date("Y-m-d H:i:s");
						$document->document_status = "unread";
						$document->report_sender = $scholar_id;
						$document->create();
		
							// Get the ID of the just inserted announcement
							$announcementId = $document->getLastInsertId();
				
							// Check if the announcement ID is retrieved successfully
							if ($announcementId) {
							// 	$mydb = $this->db->query("INSERT INTO `notification` (`catch_id`,`notification_type`,`notification_message`, `notification_status`, `notification_date`, `notification_for`,`notif_creator`) 
                            //     VALUES('{$announcementId}','Documents','{$notification_content}','unread','{$time}','{$recipient}', '{$scholar_id}')");
                            //   $this->db->query($mydb);

              
							}
                            $this->input->set_cookie(array(
                                "name" => "message",
                                "value" => json_encode(array(
                                    "message" => "New " . $document_name . " created and file uploaded successfully!",
                                    "type" => "success"
                                )),
                                'expire' => 1
                            ));
						redirect("Scholar/documents");
					} else {
						  $this->input->set_cookie(array(
                            "name" => "message",
                            "value" => json_encode(array(
                                "message" =>"Failed to upload file. Please try again.",
                                "type" => "error"
                            )),
                            'expire' => 1
                        ));
						redirect("Scholar/documents");
					}
				}
			}
		}
}