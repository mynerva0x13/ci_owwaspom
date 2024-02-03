<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Model {

    protected $tblname = "announcement";

    public $id;

    public function dbfields() {
        return $this->db->list_fields($this->tblname);
    }

    public function list_of_announcement() {
        return $this->db->get($this->tblname)->result();
    }

    public function find_announcement($id = "", $when = "") {
        $this->db->where('id_announcement', $id)
                 ->or_where('ANNOUNCEMENT_WHEN', $when);
        return $this->db->get($this->tblname)->num_rows();
    }

    public function find_all_announcement($when = "") {
        $this->db->where('date_posted', $when);
        return $this->db->get($this->tblname)->num_rows();
    }

    public function single_announcement($id = "") {
        $this->db->where('id_announcement', $id);
        return $this->db->get($this->tblname)->row();
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
    }

    public function update($id = 0) {
        $attributes = $this->sanitized_attributes();
        $this->db->where('id_announcement', $id)->update($this->tblname, $attributes);
        return $this->db->affected_rows() > 0;
    }

    public function delete($id = 0) {
        $this->db->where('id_announcement', $id)->delete($this->tblname);
        return $this->db->affected_rows() > 0;
    }

    public function send_mail($cont = []) {
        $this->load->library('email');

        $this->email->from($cont['enty'], 'Your Name');
        $this->email->to($cont['mail']);
        $this->email->subject($cont['subject']);
        $this->email->message($cont['msg']);

        return $this->email->send();
    }

    public function getLastInsertId() {
        return $this->db->insert_id();
    }
}
