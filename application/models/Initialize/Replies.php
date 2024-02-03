<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Replies extends CI_Model {

    protected $tblname = "replies";

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    public function listofreplies() {
        return $this->db->get($this->tblname)->result();
    }

    public function find_replies($id = "", $when = "") {
        $this->db->where("reply_id", $id);
        $this->db->or_where("reply_create_at", $when);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function find_all_replies($when = "") {
        $this->db->where("reply_create_at", $when);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function single_replies($id = "") {
        $this->db->where("reply_id", $id);
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

        print_r($attributes);
        $sql = "INSERT INTO $this->tblname($table_columns) VALUES($table_val)";
        $this->db->query($sql);

        if ($this->db->affected_rows() > 0) {
            $this->id = $this->getLastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function getLastInsertId() {
        return $this->db->insert_id();
    }
}
