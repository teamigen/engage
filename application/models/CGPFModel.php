<?php
class CGPFModel extends CI_Model
{

    public function saveCGPF($cgpfName, $cgpfSlug, $locationId, $periodName, $startDate, $endDate, $staffId, $stationId)
    {
        $data = [
            'cgpf_name' => $cgpfName,
            'location_id' => $locationId,
            'period_name' => $periodName,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'cgpf_slug' => $cgpfSlug,
            'staffId' => $staffId,
            'stationId' => $stationId
        ];

        $this->db->insert('cgpf', $data);

        // Debugging: Print insert ID
        // print_r($this->db->insert_id());

        return $this->db->insert_id();
    }


    public function saveMember($cgpfId, $name, $designation, $phone, $email, $staffId, $stationId)
    {
        $data = [
            'cgpf_id' => $cgpfId,
            'name' => $name,
            'designation' => $designation,
            'phone' => $phone,
            'email' => $email,
            'staffId' => $staffId,
            'stationId' => $stationId


        ];
        $this->db->insert('cgpf_members', $data);
    }

    public function getAllCGPF()
    {

        $this->db->select('cgpf.cgpf_name, eg_location.locationName, cgpf.period_name, cgpf.end_date, cgpf.cgpf_slug');
        $this->db->from('cgpf');
        $this->db->join('eg_location', 'eg_location.locationId = cgpf.location_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAllCGPFbyStationId()
    {

        $this->db->select('cgpf.cgpf_name, eg_location.locationName, cgpf.period_name, cgpf.end_date, cgpf.cgpf_slug');
        $this->db->from('cgpf');
        $this->db->join('eg_location', 'eg_location.locationId = cgpf.location_id', 'left');
        $this->db->where('cgpf.stationId', $_COOKIE['stationId']);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_cgpf($cgpf_slug)
    {

        $this->db->where('cgpf_slug', $cgpf_slug);
        return $this->db->delete('cgpf');
    }

    public function get_CGPF_by_slug($slug)
    {
        $this->db->select('*');
        $this->db->from('cgpf');
        $this->db->where('cgpf_slug', $slug);
        $query = $this->db->get();


        return $query->row();
    }

    public function get_members_by_cgpf_id($cgpfId)
    {
        $this->db->select('*');
        $this->db->from('cgpf_members');
        $this->db->where('cgpf_id', $cgpfId);
        $query = $this->db->get();
        return $query->result();
    }
    public function updateCgpf($cgpf_id, $cgpf_data)
    {
        $this->db->where('cgpf_id', $cgpf_id);
        return $this->db->update('cgpf', $cgpf_data);
    }
    public function deleteMembersByCgpfId($cgpf_id)
    {
        $this->db->delete('cgpf_members', ['cgpf_id' => $cgpf_id]);
    }
    public function insertMember($member_data)
    {
        return $this->db->insert('cgpf_members', $member_data);
    }
    public function getCgpfBySlug($cgpf_slug)
    {
        return $this->db->get_where('cgpf', ['cgpf_slug' => $cgpf_slug])->row();
    }
    public function getMembersByCgpfId($cgpf_id)
    {
        return $this->db->get_where('cgpf_members', ['cgpf_id' => $cgpf_id])->result();
    }
}
