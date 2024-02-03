<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('upload_form');
    }

    public function do_upload() {
        $uploadDirectory = './assets/images/uploads/'; // Change this to your desired upload directory

        // Generate a unique filename to prevent overwriting
        $fileName = uniqid('image_') . '_' . time() . '.' . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        
        $uploadPath = $uploadDirectory . $fileName;
    
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {
            // Provide the image URL in the response
            $response = array('url' => $fileName);
            echo json_encode($response);
        } else {
            // Handle the case where the file couldn't be moved
            header('HTTP/1.1 500 Internal Server Error');
            echo 'Error moving the file';
        }
    }
}
