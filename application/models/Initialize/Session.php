<?php

class Session extends CI_Model {
    public function __construct() {
        
        parent::__construct();
        
    }

    function MessageResponse($msg,$type) {
        if ($type=="info"){
            return  '<div class="alert alert-info">'. $msg . '</div>';
             
       }elseif($type=="error" || $type=="danger"){
           return  '<div class="alert alert-danger">' . $msg . '</div>';
                           
       }
       elseif($type=="success"){
           return  '<div class="alert alert-success">' . $msg . '</div>';
       }	
       elseif($type=="warning"){
        return  '<div class="alert alert-warning">' . $msg . '</div>';
    }
    }

}