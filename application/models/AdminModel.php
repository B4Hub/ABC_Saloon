<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class AdminModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function CustomersList(){
        $this->db->select("*");
        $this->db->where('cust_status!=','deleted');
        $this->db->order_by("cust_name");
        return $this->db->get('customer')->result_array();
        
    }
    public function AddBranch($branch_id){
        $data['branch_name'] = $this->input->post('branch_name');
        $data['address'] = $this->input->post('branch_address');
        $data['city'] = $this->input->post(  'branch_city');
        $data['state'] = $this->input->post('branch_state');
        $data['country'] = $this->input->post('branch_country');
       
        try{
            $this->db->insert('branch',$data);
            return true;
        }catch(Exception $e){
            return false;
        }       

        
    }
    public function DeleteCustomer(){
        $cust_id = $this->input->post('cust_id');
        try{
            $this->db->where('cust_id',$cust_id);
            $this->db->update('customer',['cust_status'=>'deleted']);
            return true;
        }catch(Exception $e){
            return false;
        }

        
    }
    public function UpdateCustomer(){
        $cust_id = $this->input->post('cust_id');
        $data= [
            "cust_name" => $this->input->post('name'),
            "cust_email" => $this->input->post('email'),
            "cust_phno" => $this->input->post('mobile'),
            "cust_gender" => $this->input->post('gender')
        ];
        try{
            $this->db->where('cust_id',$cust_id);
            $this->db->update('customer',$data);
            return true;
        }catch(Exception $e){
            return false;
        }

        
    }

    public function getCustomer(){
        $cust_id = $this->input->post('book_cust_id');
        $this->db->select("*");
        $this->db->where('cust_status!=','deleted');
        $this->db->where('cust_id',$cust_id);
        return $this->db->get('customer')->result_array();
        
    }
    public function checkCustomer(){
        $cust_phno = $this->input->post('cust_phno');
        $this->db->select("*");
        $this->db->where('cust_status!=','deleted');
        $this->db->where('cust_phno',$cust_phno);
        if(count($this->db->get('customer')->result_array())>0){
            return true;
        }else{
            return false;
        }
        
    }
    public function CustomerAlert(){
       $data= $this->input->post();
       return $this->db->get_where('customer',array("cust_id="=>$data['cust_id']))->result_array();
    }

    public function checkPhno(){
		$this->db->where('cust_phno',$this->input->post('cust_phno'));
        // nums_rows() number of rows that satisfies the given condition if mobile number exists it returns one affected rows kuda rayacha affected rows ante query run ayina tharvatha enni rows affect ayyayi ani ante modify or insertion appudu k
		if($this->db->get('customer',$this->input->post('cust_id'))->num_rows() > 0){
            return true;
        }else{
            return false;
        }

	}
    public function checkpwd(){
        $this->db->where('cust_phno',$this->input->post('cust_phno'));
		return $this->db->get('customer',$this->input->post('cust_phno'))->result_array();

	}
    public function checkCust(){
        $this->db->where('cust_phno',$this->input->post('cust_phno'));
        $this->db->where('PASSWORD',$this->input->post('pwd'));
		return ($this->db->get('customer',$this->input->post('cust_phno'))->num_rows() > 0)? true: false;

	}



    public function getPayments(){
        $this->db->select("*");
        $this->db->order_by('trans_date','desc');
        return $this->db->get('payment')->result_array();
    }


    public function UpdatePass($cust_id,$new_pass){
        $this->db->where("cust_id",$cust_id);
        $password = password_hash($new_pass, PASSWORD_DEFAULT);
        if($this->db->update("customer",array("cust_pass"=>$password))){
            return true;
        }else{
            return false;
        }
        
    }

    public function resetPass($cust_email,$pass){
        $this->db->where("cust_email",$cust_email);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        if($this->db->update("customer",array("cust_pass"=>$password))){
            return true;
        }else{
            return false;
        }
        
    }

}

?>
