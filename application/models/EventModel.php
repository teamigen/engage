<?php
class EventModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($data) {
        return $this->db->insert('events', $data);
    }
}
?>
