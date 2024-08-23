<?php 

class StaffModel extends CI_Model {

    public function insertStaff($staffData) {
       
        $this->db->insert('staff', $staffData);
        return $this->db->insert_id();
    }

    public function insertFamilyDetails($familyData) {
      
        $this->db->insert('staff_family', $familyData);
    }

    public function insertTransferDetails($transferData) {
     
        $this->db->insert('staff_transfers', $transferData);
    }
}

?>