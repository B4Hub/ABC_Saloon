<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class AppointmentModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function AppointmentsList($branch_id){
        return $this->db->query("SELECT customer.cust_name,customer.cust_gender,appoint_id,appoint_date,slot.slot_time,total_price FROM `appointment` JOIN customer ON appointment.cust_id=customer.cust_id JOIN slot ON slot.slot_id=appointment.slot_id WHERE appointment.branch_id='3'")->result_array();
        
        
    }
    public function AppointmentServices($appoint_id){
        return $this->db->query("SELECT service.service_name FROM `appointment_service` JOIN service ON service.service_id=appointment_service.service_id WHERE `appointment_id`='$appoint_id' ")->result_array();
    }
    public function RegisterCustomer(){
        $data['cust_name'] = $this->input->post('cust_name');
        $data['cust_email'] = $this->input->post('cust_email');
        $data['cust_phno'] = $this->input->post('cust_phno');
        $data['cust_gender'] = $this->input->post('gender');
        $data['cust_status'] = 'New';
        try{
            $this->db->insert('customer',$data);
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
    public function Branchlist(){
       return $this->db->get('branch')->result_array();
    }
    public function TimeSlots($branch_id,$date){

       return $this->db->query("SELECT `slot`.*,`slot`.`no_of_slots`-COUNT(`appointment`.`slot_id`) AS available_slots FROM `slot` LEFT OUTER JOIN `appointment` ON `slot`.`branch_id`=`appointment`.`branch_id` AND `slot`.`slot_id`=`appointment`.`slot_id` AND `appointment`.`appoint_date`='$date' AND `appointment`.`status`='confirmed' WHERE `slot`.`branch_id`='$branch_id' GROUP BY `slot`.`slot_id`")->result_array();
    }
    public function Services($branch_id=1){
        $this->db->where('branch_id',$branch_id);
       return $this->db->get('service')->result_array();
    }

    public function checkSlots(){
        $branch = $this->input->post('branch');
        $slot = $this->input->post('slot');
        $date = $this->input->post('date');
        if($this->db->query("SELECT `slot`.`no_of_slots`-COUNT(`appointment`.`slot_id`) AS available_slots FROM `slot` LEFT OUTER JOIN `appointment` ON `slot`.`branch_id`=`appointment`.`branch_id` AND `slot`.`slot_id`=`appointment`.`slot_id` AND `appointment`.`appoint_date`='$date' AND `appointment`.`status`='confirmed' WHERE `slot`.`branch_id`='$branch' AND `slot`.`slot_id`='$slot' GROUP BY `slot`.`slot_id`")->result_array()[0]['available_slots']<=0){
            return true;
        }
        
     }

    private function getGUIDnoHash(){
        mt_srand((int)microtime()*10000);
        $charid = md5(uniqid(rand(), true));
        $c = unpack("C*",$charid);
        $c = implode("",$c);

        return substr($c,0,10);
    }

    public function NewAppointment(){
        $data['cust_id'] = $this->input->post('cust_id');
        $data['branch_id'] = $this->input->post('branch');
        $data['slot_id'] = $this->input->post('slot');
        $data['appoint_date'] = $this->input->post('date');
        $data['status'] = 'confirmed';
        $data['cust_id'] = $this->input->post('customer_id');
        $data['payment_mode'] = $this->input->post('payment_mode');
        $data['remarks'] = $this->input->post('remarks');
        $amount = 0;
        foreach($this->input->post('services') as $service){
            $amount += $this->db->query("SELECT `service`.`service_cost` FROM `service` WHERE `service`.`service_id`='$service' AND `service`.`branch_id`='".$data['branch_id']."'")->result_array()[0]['service_cost'];
        }
        $amount+= $amount*0.2;
        $data['total_price'] = $amount;
        $data['payment_id']=$this->getGUIDnoHash();
        
        try{
            if($this->db->insert('payment',[
                'trans_id' => $data['payment_id'],
                'trans_mode'=>$data['payment_mode'],
                'trans_amt'=>$data['total_price'],
                'trans_status'=>"success"
            ])){
                if($this->db->insert('appointment',$data)){
                    $appoint_id = $this->db->insert_id();
                    foreach($this->input->post('services') as $service){
                        $this->db->insert('appointment_service',[
                            'appointment_id'=>$appoint_id,
                            'service_id'=>$service
                        ]);
                    }
                }
            }

            
            return true;
        }catch(Exception $e){
            return false;
        }

    }
}

?>
