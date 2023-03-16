<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){
        parent::__construct();
     $this ->load->model('CustomerModel');
	 $this->load->helper('cookie');
	 $this->load->library('session');
     $this->load->model('AuthModel');
     $this->load->helper('jwt_helper');
	 $this->load->library('stripe_lib'); 
	 $this->load->helper('url');
	}

    public function index(){
        $status=$this->session->flashdata('status');
		if(get_cookie('user_auth_token')==NULL){
			$this->load->view('user_views/login',['status'=>$status]);
		}else{
			
			$this->session->set_flashdata('status',$status);

			try{
				
				$data['cust_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				
				$this->session->set_flashdata('status',$status);
				redirect(base_url().'Customer/Dashboard');
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
        
    }


    public function Dashboard()
	{
		
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				

				
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "dashboard-li";   
				$data['li_eq']="0";
                $this->load->view('user_views/assets/sidebar',$data);
                $this->load->view('user_views/assets/header',$data);
				$this->load->view('user_views/user_dashboard',$data);	
				$this->load->view('user_views/assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}

    public function login()
	{
		$userdata=$this->AuthModel->CustomerAuthenticateLogin();
		if(password_verify($this->input->post('password'),$userdata->cust_pass)){
			unset($userdata->cust_pass);
			set_cookie('user_auth_token',JWT::encode($userdata,'485489464','HS256'),0);
			$this->session->set_flashdata('status',"success");
		}else{
			$this->session->set_flashdata('status',"failure"); 
		}
			
			redirect(base_url().'Customer');
	}


    public function forgotpass(){
		$status=$this->session->flashdata('status');
		if(get_cookie('user_auth_token')==NULL){
			$this->load->view('user_views/forgotpass',['status'=>$status]);
		}else{
			
			$this->session->set_flashdata('status',$status);

			try{
				
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				
				$this->session->set_flashdata('status',$status);
				redirect(base_url().'Customer/Dashboard');
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer/forgotpass');
			}
			
		}
		
	}



    public function Logout()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{
			delete_cookie('user_auth_token');
			redirect(base_url().'Customer');
			
		}
	}


    public function encrypt_pass($pass){
        $options = [
            'cost' => 12,
        ];
        echo password_hash($pass, PASSWORD_BCRYPT, $options);
    }





    function sendCode($email,$code){
        $this->load->library('phpmailer_lib') or die("error");
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'escrteam@gmail.com';
        $mail->Password = 'xodwtivaobdovhcb';
        $mail->SMTPSecure = 'tls';
        $mail->Port     = 587;
        $mail->setFrom('escrteam@gmail.com', 'Team ESCR');
        $mail->addAddress($email);
		$mail->Subject = 'Confirmation Code for Password Reset';
        $mail->isHTML(true);
		$mail->Body = ' 
		<body style="background-color: #e1e4e8;">
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Poppins:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
		<div   class = "email-template" style="font-family: \'Poppins\',sans-serif;margin:0 auto; max-width:300px; background-color: #ffffff; display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 50px; border-radius: 8px;"> 
			 <div   class = "email-header"> 
				 <div   class = "email-header-logo"> 
					 <img src ="'.base_url().'app_assets/images/logo/logo.png"   alt = "Logo"> 
				 </div> 
				 <div  class = "email-header-title"> 
					 <h3 align="left">confirmation code</h3> 
				 </div> 
			 </div> 
			 <div   class = "email-body"> 
				 <p> Hi '.$email.', </p> 
				 <p> Forgot your password? No worries. </p>
				 <p> Your confirmation code is <b>'.$code.'</b> </p>
				 <p> Please enter this code to reset your password. </p>
				 <p> If you did not request a password reset, please ignore this email. </p>
				 <p> Thanks, </p>
					<p> ABC Team </p>
		
			 </div> 
			 <div   class = "email-template-footer"> 
				 <p> &copy 2023 ABC. All rights reserved. </p> 
			 </div> 
		 </div>
		
	   </body>';
		if($mail->send()) return true;
		else return false;
	}

	public function requestCode(){
		if(get_cookie('user_auth_token')!=NULL){
			redirect(base_url().'Customer');
		}else{
			try{
				header('Content-Type: application/json');
				$email = $this->input->post('email');
				if($this->AuthModel->userCheckEmail($email)){
					$code = rand(100000,999999);
					if($this->sendCode($email,$code)){
						$time = time();
						$data = $email."|".$code.'|'.$time.'|'.($time+300);
						$confirm_code_hash = hash_hmac('sha256', $data, '485489464').'|'.$time;
						$this->session->set_userdata('confirm_code_hash',$confirm_code_hash);
						$this->session->set_userdata('confirm_code_email',$email);


						echo json_encode(array('status'=>true,'email'=>$email, 'message'=>'Code sent to your email'));
					}else{
						echo json_encode(array('status'=>false,'message'=>'Something went wrong'));
					}
				}else{
					echo json_encode(array('status'=>false,'message'=>'Email not found'));
				}

		    }catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}		
	    }

	}

	public function ChangePass()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				
				
				
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$data['li_id'] = "passchange-li";   
				$data['li_eq']="1";
				$this->load->view('user_views/assets/sidebar',$data);
				$this->load->view('user_views/assets/header',$data);
				$this->load->view('user_views/changepass',$data);
				$this->load->view('user_views/assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}

	public function UpdatePass()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$userdata=$this->AuthModel->getCustomer($data['user_data']->cust_id);
				$old_pass = $this->input->post('current_pass');
				$new_pass = $this->input->post('new_pass');

				if(password_verify($old_pass,$userdata->cust_pass)){
					if($this->CustomerModel->UpdatePass($data['user_data']->cust_id,$new_pass)){
						echo json_encode(array('status'=>'pass_changed','message'=>'Password Updated Successfully'));
					}else{
						echo json_encode(array('status'=>false,'message'=>'Password Update Failed'));

					}
				}else{
					echo json_encode(array('status'=>'incorrect_pass','message'=>'Incorrect Password'));
				}



			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}


	public function resetpassword(){
		if(get_cookie('user_auth_token')!=NULL){
			redirect(base_url().'Customer');
		}else{
			try{
				header('Content-Type: application/json');
				$data=$this->session->flashdata('status');
				$confirm_code_email = $this->session->userdata('confirm_code_email');
				$confirm_code_hash = $this->session->userdata('confirm_code_hash');
				$code = $this->input->post('code');
				$password = $this->input->post('password');
				if($confirm_code_email!=NULL && $confirm_code_hash!=NULL){
					$hash = explode('|',$confirm_code_hash);
					$time = $hash[1];
					$hash = $hash[0];
					if($hash==hash_hmac('sha256', $confirm_code_email."|".$code.'|'.$time.'|'.($time+300), '485489464')){
						if(time()<$time+300){
							$this->CustomerModel->resetPass($confirm_code_email,$password);
							echo json_encode(array('status'=>true,'message'=>'Password reset successfully'));
						}else{
							echo json_encode(array('status'=>false,'message'=>'Code expired'));
						}
					}else{
						echo json_encode(array('status'=>false,'message'=>'Invalid code'));
					}
				}else{
					echo json_encode(array('status'=>false,'message'=>'Invalid code'));
				}

		    }catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}		
	    }

	}


	public function BookAppointment()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				$this->load->model('CustomerModel');
				$data['pk'] = $this->config->item('pk_test_51MkUBlSCMoPdPSCi44yHi0hBjIM2BDyL1f42mEDCJTJh18W6r99WyplOrtLynSoGDKWmc7pAYj9K0QUNmBrrJgxQ00QIaLqxjx');
				$data['customer']=$this->CustomerModel->getCustomer();
				$data['branch']=$this->AppointmentModel->BranchList();
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$data['timeslots']=$this->AppointmentModel->TimeSlots($data['user_data']->cust_branch,date('Y-m-d'));
				$data['services']=$this->AppointmentModel->Services($data['user_data']->cust_branch);


				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "appointmentslist-li";   
				$data['li_eq']="0";
				$this->load->view('user_views/assets/sidebar',$data);
				$this->load->view('user_views/assets/header',$data);
				$this->load->view('user_views/book_appointment',$data);
				$this->load->view('user_views/assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}

	public function TimeSlots($branch_id)
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$timeslots=$this->AppointmentModel->TimeSlots($branch_id);

				

				echo json_encode($timeslots);
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}
	public function Services($branch_id)
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$services=$this->AppointmentModel->Services($branch_id);

				

				echo json_encode($services);
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}
	public function SlotsAndServices()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				$branch_id = $this->input->post('branch_id');
				$date = $this->input->post('date');
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				$result['timeslots']=$this->AppointmentModel->TimeSlots($branch_id,$date);
				$result['services']=$this->AppointmentModel->Services($branch_id);

				

				echo json_encode($result);
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}


	public function NewAppointment()
	{
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			try{
				
				
				header('Content-Type: application/json');
				$this->load->model('AppointmentModel');
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);
				
				
				if($data = $this->AppointmentModel->checkSlots()){
					$this->session->set_flashdata('status',"slot_error");
					echo json_encode(['status'=>'slot_unavailable']);
				}else{
					if($payment_id = $this->AppointmentModel->CustomerNewAppointment()){
						$this->session->set_userdata('payment_id',$payment_id);
						$this->session->set_flashdata('status',"appointment_booked");
						echo json_encode(['status'=>'appointment_booked']);
					}else{
						$this->session->set_flashdata('status',"appointment_not_booked");
						echo json_encode(['status'=>'appointment_not_booked']);
	
					}
				}
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}


	public function Checkout(){
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			
				
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);

				require 'vendor/autoload.php';

				$stripe = new \Stripe\StripeClient('sk_test_51MkUBlSCMoPdPSCi4v1KJVlRbbcVv3l2rqiozqEBvC1AjzzzQe5RwjLYmwGDoLuT964wWab3T1Ac1AVy9gntseyz00gD5YA5nC');
				$payment_id = $this->session->userdata('payment_id');
				$data['branch_id'] = $this->input->post('branch');
				$services_string = "";
				$amount = 0;
				foreach($this->input->post('services') as $service){
					$qdata =  $this->db->query("SELECT `service`.`service_cost`, `service`.`service_name` FROM `service` WHERE `service`.`service_id`='$service' AND `service`.`branch_id`='".$data['branch_id']."'")->result_array()[0];
					$amount+= $qdata['service_cost'];
					$services_string = $services_string.$qdata['service_name'].",";
				}
				$amount+= $amount*0.2;
				
				$services_string = rtrim($services_string,",");

				$checkout_session = $stripe->checkout->sessions->create([
				'line_items' => [[
					'price_data' => [
					'currency' => 'inr',
					'product_data' => [
						'name' => $services_string,
					],
					'unit_amount' => $amount*100,
					],
					'quantity' => 1,
					
				]],
				'mode' => 'payment',
				'success_url' => base_url().'Customer/CheckoutValidation?session_id={CHECKOUT_SESSION_ID}',
				'cancel_url' => base_url().'Customer/CheckoutValidation?session_id={CHECKOUT_SESSION_ID}',
				]);

				header("HTTP/1.1 303 See Other");
				header("Location: " . $checkout_session->url);
				
				try{
				
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}

	public function CheckoutValidation(){
		if(get_cookie('user_auth_token')==NULL){
			redirect(base_url().'Customer');
		}else{

			
				
				$data['user_data']=JWT::decode(get_cookie('user_auth_token'),'485489464',true);

				require 'vendor/autoload.php';
				$stripe = new \Stripe\StripeClient('sk_test_51MkUBlSCMoPdPSCi4v1KJVlRbbcVv3l2rqiozqEBvC1AjzzzQe5RwjLYmwGDoLuT964wWab3T1Ac1AVy9gntseyz00gD5YA5nC');

				$session_id = $this->input->get('session_id') ? $this->input->get('session_id') : '';
				$checkout_session = $stripe->checkout->sessions->retrieve($session_id);
				$payment_intent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
				$payment_status = $payment_intent->status;
				$transaction_id = $payment_intent->id;
				echo $this->session->userdata('payment_id');
				if($payment_status == 'succeeded'){
					// check amount with the amount in database
					$amount = $payment_intent->amount/100;
					$payment_id = $this->session->userdata('payment_id');
					$amount_db = $this->db->query("SELECT `payment`.`trans_amt` FROM `payment` WHERE `payment`.`payment_id`='$payment_id'")->result_array()[0]['trans_amt'];
					if($amount_db == $amount){
						$this->db->query("UPDATE `payment` SET `payment`.`trans_status`='success', `payment`.`trans_id`='$transaction_id' WHERE `payment`.`payment_id`='$payment_id'");
						// also update the appointment status
						$this->db->query("UPDATE `appointment` SET `appointment`.`status`='confirmed' WHERE `appointment`.`payment_id`='$payment_id'");
						$this->session->set_flashdata('status',"payment_success");
					}else{
						$this->db->query("UPDATE `payment` SET `payment`.`trans_status`='failed' WHERE `payment`.`payment_id`='$payment_id'");
						$this->session->set_flashdata('status',"payment_failed");
					}
				}else{
					
				}

				$this->session->unset_userdata('payment_id');
				redirect(base_url().'Customer/Dashboard');
				
				try{
				
				
			}catch(Exception $e){
				delete_cookie('user_auth_token');
				redirect(base_url().'Customer');
			}
			
		}
	}




}