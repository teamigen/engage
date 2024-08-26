<?php 

class Family_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertFamilyDetails($familyDetails)
    {
        $this->db->trans_start();

        foreach ($familyDetails as $detail) {
            $this->db->insert('staff_family', $detail);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_family_by_staff($staffId) {
        $this->db->where('staffId', $staffId);
        $query = $this->db->get('staff_family'); 
        return $query->result();
    }
}
?>