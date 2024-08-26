<?php 
class Transfer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertTransferDetails($transferDetails)
    {
        $this->db->trans_start();

        foreach ($transferDetails as $detail) {
            $this->db->insert('staff_transfers', $detail);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function get_transfer_by_staff($staffId) {
        $this->db->where('staffId', $staffId);
        $query = $this->db->get('staff_transfers'); 
        return $query->result();
    }
}
?>