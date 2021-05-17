<?php

class Graphdata extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }

    function getPreviousYearData($year)
    {
        $data = array();
        $query = $this->db->query("SELECT * from yearly_visitors WHERE year =".$year." AND total_visitors 
            IS NOT NULL ORDER BY total_visitors DESC LIMIT 10");
        // $query = $this->db->query("SELECT * FROM yearly_visitors WHERE country_code != 'PHL' AND year=".$year." AND total_visitors 
        //     IS NOT NULL ORDER BY total_visitors DESC LIMIT 10");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        return $data;
    }

    function getleastVisitorsData($year)
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM yearly_visitors WHERE total_visitors 
            IS NOT NULL AND year = ".$year." AND total_visitors < 5000 ORDER BY total_visitors LIMIT 10");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        return $data;
    }

    function getMonthlyAverage()
    {
        $data = array();
        $query = $this->db->query("SELECT SUM(average) AS 'total_average', month 
            FROM monthly_visitors WHERE average IS NOT NULL GROUP BY month_number");

        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        return $data;
    }

    function getVisitorsTotal($year)
    {
        $query = $this->db->query("SELECT SUM(total_visitors) AS 'total' FROM yearly_visitors 
            WHERE year = ".$year);

        if ($query->num_rows() >0)
        {
            $row = $query->row();
            return $row->total;
        }
    }

    function getForeignTotal($year)
    {
        $query = $this->db->query("SELECT SUM(total_visitors) AS 'total' FROM yearly_visitors 
            WHERE country_code != 'PHL' AND year = ".$year);
        
        if ($query->num_rows() >0)
        {
            $row = $query->row();
            return $row->total;  
        }
    }

    function getLocalTotal($year)
    {
        $query = $this->db->query("SELECT SUM(total_visitors) AS 'total' FROM yearly_visitors 
            WHERE country_code = 'PHL' AND year = ".$year);
        
        if ($query->num_rows() >0)
        {
            $row = $query->row();
            return $row->total;
        }
    }

    function getLandmarkVisitors($landmarkID, $year)
    {
        $data = array();
        $query = $this->db->query("SELECT * FROM yearly_visitors 
            WHERE landmark_id = ".$landmarkID." AND year = ".$year." AND total_visitors IS NOT NULL 
            ORDER BY total_visitors DESC LIMIT 10");
        
        if ($query->num_rows() > 0)
        {
            foreach ($query->result_array() as $row)
            {
                $data[] = $row;
            }
        }
        return $data;
    }
}
?>