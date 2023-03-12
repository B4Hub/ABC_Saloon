<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class AuthModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function AuthenticateLogin(){
        
        $this->db->select("emp_id,emp_name,emp_email,password,role_name,emp_phno,branch_id");
        $this->db->join("role","employee.role_id=role.role_id");
        $this->db->where("emp_email",$this->input->post('username'));
        return $this->db->get('employee')->row();
        
    }

    public function getEmployee($emp_id){
        $this->db->select("emp_id,emp_name,emp_email,password,role_name,emp_phno,branch_id");
        $this->db->join("role","employee.role_id=role.role_id");
        $this->db->where("emp_id",$emp_id);
        return $this->db->get('employee')->row();
    }

    public function checkEmail($email){
        $this->db->select("*");
        $this->db->where("emp_email",$email);
        if($this->db->get('employee')->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}

?>