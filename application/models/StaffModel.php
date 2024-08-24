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

    public function getallstaffdetails()
    {
        $this->db->select('staff.*, eg_station.stationName'); 
        $this->db->from('staff');
        $this->db->join('eg_station', 'staff.station = eg_station.stationId', 'left'); 
        $this->db->order_by('staff.staffName', 'asc'); 
        $query = $this->db->get(); 
        return $query->result_array(); 
    }

    public function delete_staff($staffId)
{
   
    $this->db->where('staffId', $staffId);
    return $this->db->delete('staff');
}

    

    
    
}

?>