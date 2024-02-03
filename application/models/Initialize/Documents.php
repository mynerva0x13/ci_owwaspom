<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Model {
    protected $tblname = "upload_documents";

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    public function listofdocument() {
        $query = $this->db->get($this->tblname);
        return $query->result();
    }

    public function find_document($id = "", $name = "") {
        $this->db->where('document_id', $id);
        $this->db->or_where('document_name', $name);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function find_all_document($name = "") {
        $this->db->where('document_name', $name);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function single_document($id = "") {
        $this->db->where('document_id', $id);
        $query = $this->db->get($this->tblname);
        return $query->row();
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create() {
        $attributes = $this->sanitized_attributes();
       
        $table_columns = implode(',', array_keys($attributes));
        $table_val = implode(',', $attributes);
        $sql = "INSERT INTO $this->tblname($table_columns) VALUES($table_val)";
        $this->db->query($sql);

      

        // $this->db->query($sql, $values);

        if ($this->db->affected_rows() > 0) {
            $this->id = $this->getLastInsertId();
            return true;
        } else {
            return false;
        }
    }

    public function update($id = 0) {
        $data = $this->sanitized_attributes();
        $this->db->where('document_id', $id);
        $this->db->update($this->tblname, $data);
        return true;
    }

    public function delete($id = 0) {
        $this->db->where('document_id', $id);
        $this->db->delete($this->tblname);
        return true;
    }
    public function getLastInsertId() {
        return $this->db->insert_id();
    }
    private function sanitized_attributes() {
        $clean_attributes = array();
        foreach ($this->dbfields() as $field) {
            if (property_exists($this, $field)) {
                $clean_attributes[$field] =   $this->db->escape($this->$field);

            }
        }
        return $clean_attributes;
    }
}
