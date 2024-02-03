<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class NewScholar extends CI_Model {
    protected $tblname = "scholar_info";

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    protected function attributes() {
        $attributes = array();
        foreach ($this->dbfields( ) as $field) {
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

    protected function unsanitized_attributes() {
        $clean_attributes = array();
        foreach ($this->attributes() as $key => $value) {
           
            $clean_attributes[$key] = ($value);
        }
        return $clean_attributes;
    } 
    public function create() {
        $attributes = $this->sanitized_attributes();

        $table_columns = implode(',', array_keys($attributes));
        $table_val = implode(',', $attributes);
        $sql = "INSERT INTO scholar_info($table_columns) VALUES($table_val)";
    	
        $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        print_r($attributes);
    }
    public function getLastInsertId() {
        return $this->db->insert_id();
    }
    public function update($id = "") {
        $attributes = $this->unsanitized_attributes();

        // print_r($attributes);
        $this->db->where("scholar_id", $id);
        $this->db->update("scholar_info", $attributes);
    }
}