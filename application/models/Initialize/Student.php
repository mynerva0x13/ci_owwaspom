<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Model {

    protected $tblname = "scholar_info";

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }


    public function single_students($id = "") {
        $this->db->where("scholar_id", $id);
        $query = $this->db->get($this->tblname, 1);
        return $query->row();
    }
    
    public function single_student_userid($id = "") {
        $this->db->where("user_id", $id);
        $query = $this->db->get($this->tblname, 1);
        return $query->row();
    }

    public static function instantiate($record) {
        $object = new self;

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }

        return $object;
    }

    private function has_attribute($attribute) {
        return array_key_exists($attribute, $this->attributes());
    }

    protected function attributes() {
        $attributes = array();
        foreach ($this->dbfields() as $field) {
            if (property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }

    protected function sanitized_attributes() {
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
            $clean_attributes[$key] = $this->db->escape($value);
        }
        return $clean_attributes;
    }

    public function save() {
        return isset($this->id) ? $this->reply() : $this->create();
    }

    public function create() {
        $attributes = $this->sanitized_attributes();
        $table_columns = implode(',', array_keys($attributes));
        $table_val = implode(',', $attributes);

        $sql = "INSERT INTO $this->tblname($table_columns) VALUES($table_val)";
        $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            $this->id = $this->getLastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function delete($id = 0) {
		global $mydb;
		  $sql = "UPDATE ".$this->tblname;
		  $sql .= " SET deleted_at = NOW() WHERE scholar_id= ". $id;
		  $sql .= " ";
		 
		  
			if(!$this->db->query($sql)) return false; 	
    }
    public function getLastInsertId() {
        return $this->db->insert_id();
    }
}

// class Student extends CI_Model {
//     protected static $tblname = "scholar_info";

//     public function dbfields() {
//         return $this->db->list_fields($this->$tblname);
//     }

//     public function listofstudents() {
//         $query = $this->db->get($this->$tblname);
//         return $query->result();
//     }

//     public function find_students($id = "", $email = "") {
//         $this->db->where("scholar_id", $id);
//         $this->db->or_where("email", $email);
//         $query = $this->db->get($this->$tblname);
        
//         return $query->num_rows();
//     }

//     public function find_all_students($user = "") {
//         $this->db->where("user_id", $user);
//         $query = $this->db->get($this->$tblname);
        
//         return $query->num_rows();
//     }

//     public function single_students($id = "") {
//         $this->db->where("scholar_id", $id);
//         $query = $this->db->get($this->$tblname, 1);
//         return $query->row();
//     }

//     public function single_student_userid($id = "") {
//         $this->db->where("user_id", $id);
//         $query = $this->db->get($this->$tblname, 1);
//         return $query->row();
//     }

//     public function instantiate($record) {
//         $object = new self;

//         foreach ($record as $attribute => $value) {
//             if ($object->has_attribute($attribute)) {
//                 $object->$attribute = $value;
//             }
//         }

//         return $object;
//     }

//     private function has_attribute($attribute) {
//         return property_exists($this, $attribute);
//     }

//     protected function attributes() {        
//         $attributes = array();
//         foreach ($this->dbfields() as $field) {
//             if (property_exists($this, $field)) {
//                 $attributes[$field] = $this->$field;
//             }
//         }
//         return $attributes;
//     }

//     protected function sanitized_attributes() {
//         $clean_attributes = array();

//         foreach ($this->attributes() as $key) {
//             $clean_attributes[$key] = $this->db->escape($this->$key);
//         }

//         return $clean_attributes;
//     }

//     public function find_user_by_email($email) {
//         $this->db->where("email", $email);
//         $query = $this->db->get($this->$tblname);
        
//         return $query->num_rows();
//     }

//     public function save() {
//         return isset($this->id) ? $this->update() : $this->create();
//     }

//     public function create() {
//         $attributes = $this->sanitized_attributes();
//     //     $table_columns = implode(',', array_keys($attributes));
//     //     $table_val = implode(',', $attributes);

//     //     $sql = "INSERT INTO scholar_info($table_columns) VALUES($table_val)";
//     //     $existingEmail = $this->find_students("", $attributes['email']);
// 	// 	if ($existingEmail > 0) {
// 	// 		message ("Email already exists"); 
// 	// 		return false; // Return false to indicate duplicate email
// 	// 	}
//     //     else {
//     //     $this->db->query($sql);

//     //     if ($this->db->affected_rows() > 0) {
//     //         $this->id = $this->getLastInsertId();
//     //         return true;
//     //     } else {
//     //         return false;
//     //     }
//     // }
//     print_r($attributes);
//     }

//     public function create_acc() {
//         $attributes = $this->sanitized_attributes();

//         // $table_columns = implode(',', array_keys($attributes));
//         // $table_val = implode(',', $attributes);
//         // $sql = "INSERT INTO find_students($table_columns) VALUES($table_val)";
    	
//         // $this->db->query($sql);

//         // if ($this->db->affected_rows() > 0) {
//         //     return true;
//         // } else {
//         //     return false;
//         // }
//    print_r($attributes);
//     }

//     public function update($id = "") {
//         $attributes = $this->sanitized_attributes();
//         $this->db->where("scholar_id", $id);
//         $this->db->update($this->$tblname, $attributes);

        
//     }

//     public function delete($id = 0) {
//         $this->db->where("scholar_id", $id);
//         $this->db->delete($this->$tblname, 1);
//     }

//     public function getLastInsertId() {
//         return $this->db->insert_id();
//     }
// }
