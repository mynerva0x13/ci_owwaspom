<?php

class documentScholar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->helper('cookie');
        $this->load->database();
        $this->load->library('session');
        $this->load->model("Initialize/Session");
        
        
        
        $this->load->model("Initialize/Student");
        $this->load->model("Initialize/Func_Misc");
        $this->load->model("Initialize/Account");

        
        $this->load->model("Initialize/Request");
    }
}