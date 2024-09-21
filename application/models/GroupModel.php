<?php

class GroupModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }


    public function insertGroup($data)
    {
        return $this->db->insert('groups', $data);
    }


    public function getAllWeeklyGroups()
    {
        $this->db->select('g.id, g.groupName, g.groupLocation, g.meetingPlace, g.groupType, l.locationName, g.groupSlug');
        $this->db->from('groups g');
        $this->db->join('eg_location l', 'g.groupLocation = l.locationId', 'left');
        $this->db->where('l.locationStatus', 1);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function getAllWeeklyGroupsbystationId()
    {
        $this->db->select('g.id, g.groupName, g.groupLocation, g.meetingPlace, g.groupType, l.locationName, g.groupSlug');
        $this->db->from('groups g');
        $this->db->join('eg_location l', 'g.groupLocation = l.locationId', 'left');
        $this->db->where('l.locationStatus', 1);
        $this->db->where('g.stationId', $_COOKIE['stationId']);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllWeeklyGroupsbystaff()
    {
        $this->db->select('g.id, g.groupName, g.groupLocation, g.meetingPlace, g.groupType, l.locationName, g.groupSlug');
        $this->db->from('groups g');
        $this->db->join('eg_location l', 'g.groupLocation = l.locationId', 'left');
        $this->db->where('l.locationStatus', 1);
        $this->db->where('g.staffId', $_COOKIE['staffId']);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function delete_group($groupSlug)
    {

        $this->db->where('groupSlug', $groupSlug);
        return $this->db->delete('groups');
    }


    public function isSlugUnique($slug)
    {
        $this->db->where('groupSlug', $slug);
        $query = $this->db->get('groups');
        return $query->num_rows() === 0;
    }

    public function getGroupById($groupId)
    {

        $this->db->where('id', $groupId);
        $query = $this->db->get('groups');
        return $query->row();
    }

    public function getGroupBySlug($groupSlug)
    {
        $this->db->where('groupSlug', $groupSlug);
        $query = $this->db->get('groups');
        return $query->row();
    }
    public function updateGroup($groupId, $data)
    {
        $this->db->where('id', $groupId);
        return $this->db->update('groups', $data);
    }

    public function slug_exists($slug)
    {
        $this->db->where('groupSlug', $slug);
        $query = $this->db->get('groups');
        return $query->num_rows() > 0;
    }
}
