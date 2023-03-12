<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class DashboardModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function WeekEarnings(){
        $this->db->select("SUM(trans_amt),DATE(trans_date)");
        $this->db->where("trans_status","success");
        $this->db->group_by("DATE(trans_date)");
        $this->db->order_by("DATE(trans_date)","desc");
        $this->db->limit(7);
        return $this->db->get('payment')->result_array();
        
    }
}

?>
