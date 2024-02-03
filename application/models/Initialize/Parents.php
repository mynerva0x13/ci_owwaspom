<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parents extends CI_Model {

    protected $tblname = "tblparents";

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    public function listofparents() {
        return $this->db->get($this->tblname)->result();
    }

    public function find_parents($id = "", $name = "") {
        $this->db->where('IDNO', $id)
                 ->or_where('FATHER', $name)
                 ->or_where('MOTHER', $name);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function find_all_parents($name = "") {
        $this->db->where('FATHER', $name)
                 ->or_where('MOTHER', $name);
        $query = $this->db->get($this->tblname);
        return $query->num_rows();
    }

    public function single_parents($id = "") {
        $query = $this->db->get_where($this->tblname, array('IDNO' => $id), 1);
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
        return array_key_exists($attribute, get_object_vars($this));
    }

    protected function attributes() {
        return $this->dbfields();
    }

    protected function sanitized_attributes() {
        $clean_attributes = array();
        foreach ($this->attributes() as $key) {
            $clean_attributes[$key] = $this->db->escape($this->$key);
        }
        return $clean_attributes;
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create() {
        $attributes = $this->sanitized_attributes();
        $this->db->insert($this->tblname, $attributes);

        return $this->db->insert_id();
    }

    public function update($id = 0) {
        $attributes = $this->sanitized_attributes();
        $this->db->where('IDNO', $id);
        $this->db->update($this->tblname, $attributes);
    }

    public function delete($id = 0) {
        $this->db->where('IDNO', $id);
        $this->db->limit(1);
        $this->db->delete($this->tblname);
    }
}
