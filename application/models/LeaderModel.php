<?php
class LeaderModel extends CI_Model {

    


    public function slugExists($slug)
    {
        $this->db->where('leaderSlug', $slug);
        $query = $this->db->get('leaders');
        return $query->num_rows() > 0;
    }

    public function saveLeader($data) {
        return $this->db->insert('leaders', $data);
    }

    public function getAllLeaders() {
        $query = $this->db->get('leaders');
        return $query->result();
    }

    public function getLeaderBySlug($slug) {
        $this->db->where('leaderSlug', $slug);
        $query = $this->db->get('leaders');
        return $query->row();
    }
    
    public function getAllLeadersbyStation($stationId) {
        $this->db->where('stationId', $stationId);
        $query = $this->db->get('leaders');
        return $query->result();
    }

    public function getAllLeadersbyStations($stationId) {
        $this->db->where('stationId', $stationId);
        $query = $this->db->get('leaders');
        return $query->result_array();
    }

    public function getAllLeadersbyStaff($staffId) {
        $this->db->where('staffId', $staffId);
        $query = $this->db->get('leaders');
        return $query->result_array();
    }

    

    public function updateLeader($slug, $data) {
        $this->db->where('leaderId', $slug);
        $this->db->update('leaders', $data);

        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    

    public function deleteLeaderBySlug($slug) {
        $this->db->where('leaderSlug', $slug);
        return $this->db->delete('leaders');
    }
    
    
}

