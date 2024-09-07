<?php
class ChurchModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insertChurch($data)
    {
        $this->db->insert('churches', $data);
        return $this->db->insert_id();
    }

    public function insertContactPerson($data)
    {
        $this->db->insert('contact_persons', $data);
    }


    public function getallactivelocations()
    {
        $this->db->select('*');
        $this->db->from('eg_location');
        $this->db->where('locationStatus', 1);
        $this->db->order_by('locationName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    public function getAllChurches()
    {
        $this->db->select('churches.churchId, churches.churchName, eg_location.locationName ,pastorName,mobileNumber,churchSlug');
        $this->db->from('churches');
        $this->db->join('eg_location', 'churches.churchLocation = eg_location.locationId', 'left');
        $query = $this->db->get();
        return $query->result();
    }


    public function getChurchBySlug($churchSlug)
    {
        $this->db->where('churchSlug', $churchSlug);
        $query = $this->db->get('churches');


        echo $this->db->last_query();
        print_r($query->row());

        return $query->row();
    }



    public function updateChurch($churchId, $data)
    {
        $this->db->where('churchId', $churchId);
        return $this->db->update('churches', $data);
    }


    public function getContactPersonsByChurchSlug($churchSlug)
    {

        $this->db->select('churchId');
        $this->db->where('churchSlug', $churchSlug);
        $query = $this->db->get('churches');
        $church = $query->row();

        if ($church) {

            $this->db->where('churchId', $church->churchId);
            $query = $this->db->get('contact_persons');
            return $query->result();
        }

        return array();
    }


    public function deleteContactPersonsByChurchId($churchId)
    {
        $this->db->where('churchId', $churchId);
        return $this->db->delete('contact_persons');
    }

    public function delete_church($churchSlug)
    {

        $this->db->where('churchSlug', $churchSlug);
        return $this->db->delete('churches');
    }
    public function getChurchById($churchId)
    {
        $this->db->where('churchId', $churchId);
        $query = $this->db->get('churches');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function getallactivechurchesbystation($stationId)
    {
        $this->db->select('*');
        $this->db->from('churches');
        $this->db->join('eg_location', 'churches.churchLocation = eg_location.locationId', 'left');
        $this->db->where('churches.stationId', $stationId);
        $this->db->order_by('churchName', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}
