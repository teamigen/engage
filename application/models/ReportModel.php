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


    public function getWeekReportByMonthYearAndUser($monthYear, $userId)
    {
        $this->db->like('reportMonth', $monthYear, 'after');
        $this->db->where('staffId', $userId);
        $query = $this->db->get('eg_weekreport');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }


    public function getReportByMonthYearAndUser($monthYear, $userId)
    {
        $this->db->where('reportMonth', $monthYear);
        $this->db->where('staffId', $userId);
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





    public function insertDailyReport($reportData)
    {

        $this->db->insert_batch('eg_dailyreport', $reportData);
    }


    public function getDailyReportByMonthYearAndUser($monthYear, $userId)
    {
        $this->db->like('reportMonth', $monthYear, 'after');
        $this->db->where('staffId', $userId);
        $query = $this->db->get('eg_dailyreport');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function getReportsByMonth($reportMonth)
    {
        $this->db->where('reportMonth', $reportMonth);
        $query = $this->db->get('eg_weekreport');
        return $query->result_array();
    }

    public function updateWeeklyReport($data, $reportMonth)
    {
        $this->db->where('reportMonth', $reportMonth);
        $this->db->update('eg_weekreport', $data);
    }

    public function insertWeeklyReport($data)
    {
        $this->db->insert_batch('eg_weekreport', $data);
    }

    public function deleteEvent($id, $reportMonth)
    {
        $this->db->where('id', $id);
        $this->db->where('reportMonth', $reportMonth);
        return $this->db->delete('eg_weekreport');
    }



    public function getDailyReportByMonth($reportMonth)
    {
        $this->db->where('reportMonth', $reportMonth);
        $query = $this->db->get('eg_dailyreport'); 
        return $query->result_array(); 
    }

    public function updateDailyReport($reportMonth, $reportData)
    {
        

        foreach ($reportData as $data) {
            $this->db->where('reportMonth', $reportMonth);
            $this->db->where('dateOfEvent', $data['dateOfEvent']);
            $this->db->update('eg_dailyreport', $data); 
        }
    }

    public function getMonthReportByMonthYearAndUser($monthYear, $userId)
    {
        $this->db->where('reportMonth', $monthYear);
        $this->db->where('staffId', $userId);
        $query = $this->db->get('eg_report');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
}
