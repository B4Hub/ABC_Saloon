<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class EmployeeModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function EmployeeList(){
        $this->db->select("*");
        $this->db->order_by("emp_id","desc");
        return $this->db->get('employee')->result_array();
        
    }

    public function UpdatePass($emp_id,$new_pass){
        $this->db->where("emp_id",$emp_id);
        $password = password_hash($new_pass, PASSWORD_DEFAULT);
        if($this->db->update("employee",array("password"=>$password))){
            return true;
        }else{
            return false;
        }
        
    }

    public function resetPass($emp_email,$pass){
        $this->db->where("emp_email",$emp_email);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        if($this->db->update("employee",array("password"=>$password))){
            return true;
        }else{
            return false;
        }
        
    }
}

?>
