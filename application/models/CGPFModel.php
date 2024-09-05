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
    

    public function saveMember($cgpfId, $name, $designation, $phone, $email)
    {
        $data = [
            'cgpf_id' => $cgpfId,
            'name' => $name,
            'designation' => $designation,
            'phone' => $phone,
            'email' => $email,

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
}
