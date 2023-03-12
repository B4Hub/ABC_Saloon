<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class FeedbackModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }


    public function getFeedbacks(){
        $this->db->select("feedback.*,customer.cust_name");
        $this->db->from("feedback");
        $this->db->join("customer","customer.cust_id=feedback.cust_id");

        $this->db->order_by("feedback_id","desc");
        return $this->db->get()->result_array();
    }

}


?>