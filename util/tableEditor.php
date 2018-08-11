<?php
require_once 'dbEditor.php';
class tableEditor {
    private $db = null;
    public function insert($keyword, $text) {
        if ($this->db == null) $this->db = new dbEditor();
        return $this->db->insert($keyword, $text);
    }
    public function get_text($keyword) {
        if ($this->db == null) $this->db = new dbEditor();
        return $this->db->get_array($keyword);
    }
    public function exists($keyword) {
        if ($this->db == null) $this->db = new dbEditor();
        return $this->db->exists($keyword);
    }
    public function remove($keyword) {
        if ($this->db == null) $this->db = new dbEditor();
        return $this->db->remove($keyword);
    }
}
?>
