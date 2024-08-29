<?php

class StaffModel extends CI_Model
{

    public function insertStaff($staffData)
    {

        $this->db->insert('staff', $staffData);
        return $this->db->insert_id();
    }

    public function insertFamilyDetails($familyData)
    {

        $this->db->insert('staff_family', $familyData);
    }

    public function insertTransferDetails($transferData)
    {

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

    public function get_staff_by_slug($staffSlug)
    {
        return $this->db->select('*')
            ->from('staff')
            ->where('staffSlug', $staffSlug)
            ->get()
            ->row_array();
    }

    public function slugExists($slug)
    {
        $this->db->where('staffSlug', $slug);
        $query = $this->db->get('staff');
        return $query->num_rows() > 0;
    }


    public function getStaffById($staffId)
    {

        $this->db->where('staffId', $staffId);
        $query = $this->db->get('staff');

        return $query->row();
    }

    public function updateStaff($staffId, $staffData)
    {
        $this->db->where('staffId', $staffId);
        return $this->db->update('staff', $staffData);
    }

    public function deleteFamilyDetails($staffId)
    {
        $this->db->where('staffId', $staffId);
        return $this->db->delete('staff_family');
    }
    public function deleteTransferDetails($staffId)
    {
        $this->db->where('staffId', $staffId);
        return $this->db->delete('staff_transfers');
    }

    public function checkWhatsAppNumberExists($whatsappNumber)
    {
        $this->db->where('whatsappNumber', $whatsappNumber);
        $query = $this->db->get('staff');
        return $query->num_rows() > 0;
    }

    public function getStaffByUsername($username) {
        return $this->db->get_where('staff', ['username' => $username])->row();
    }
}
