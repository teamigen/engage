<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // public function insert($reportData) {
    //     $this->db->insert('reports', $reportData);
    //     return $this->db->insert_id(); 
    // }


    public function insertReport($data)
    {
        $this->db->insert('eg_report', $data);
        return $this->db->insert_id();
    }
    // public function getReportByMonthYear($month, $year)
    // {
    //     $this->db->select('*');
    //     $this->db->from('eg_report');
    //     $this->db->where('MONTH(created_at)', $month);
    //     $this->db->where('YEAR(created_at)', $year);

    //     $query = $this->db->get();
    //     return $query->row_array();
    // }

    public function getReportByMonth($month)
    {
        $this->db->select('*');
        $this->db->from('eg_report');
        $this->db->where('reportMonth', $month);

        $query = $this->db->get();
        return $query->row_array();
    }
    public function getReportByMonthYear($monthYear)
    {

        $this->db->like('reportMonth', $monthYear, 'after');
        $query = $this->db->get('eg_report');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function reportExists($reportMonth)
    {
        $this->db->where('reportMonth', $reportMonth);
        $query = $this->db->get('eg_report');
        return $query->num_rows() > 0;
    }

    public function updateReport($reportId, $data)
    {
        $this->db->where('reportId', $reportId);
        return $this->db->update('eg_report', $data);
    }


}
