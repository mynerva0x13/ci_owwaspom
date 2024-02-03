<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Model {
    protected $tblname = "request_info";

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    public function listofstudentrequest() {
        $query = $this->db->get($this->tblname);
        return $query->result();
    }

    public function find_studentrequest($id = "", $when = "") {
        $this->db->where('request_info_id', $id);
        $this->db->or_where('ANNOUNCEMENT_WHEN', $when);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function find_all_studentrequest($when = "") {
        $this->db->where('date_posted', $when);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function single_studentrequest($id = "") {
        $this->db->where('request_info_id', $id);
        $query = $this->db->get($this->tblname);
        return $query->row();
    }
    public function single_studentrequest_student($id = "") {
        $this->db->where('scholar_id', $id);
        $query = $this->db->get($this->tblname);
        return $query->row();
    }
    public function instantiate($record) {
        $object = new self;

        foreach ($record as $attribute => $value) {
            if ($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function has_attribute($attribute) {
        return property_exists($this, $attribute);
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
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create() {
        $attributes = $this->sanitized_attributes();
        // print_r($attributes);
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
        return true;
    }

    public function update($id = 0) {
        $attributes = $this->sanitized_attributes();
        $this->db->where('request_info_id', $id);
        $this->db->update($this->tblname, $attributes);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id = 0) {
        $this->db->where('request_info_id', $id);
        $this->db->limit(1);
        $this->db->delete($this->tblname);
        return $this->db->affected_rows() > 0;
    }

    public function sendMail($cont = []) {
        // Implement email sending logic using CodeIgniter's Email Library
    }

    public function getLastInsertId() {
        return $this->db->insert_id();
    }
}
