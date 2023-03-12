<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){  
		parent::__construct(); 
		$this->load->model('DashboardModel');
		$this->load->model('FeedbackModel');
		$this->load->model('AuthModel');
		$this->load->helper('cookie');
		$this->load->library('session');
		$this->load->model('EmployeeModel');
		$this->load->helper('jwt_helper');
	}

	
	public function index()
	{
		$status=$this->session->flashdata('status');
		if(get_cookie('auth_token')==NULL){
			$this->load->view('login',['status'=>$status]);
		}else{
			
			$this->session->set_flashdata('status',$status);

			try{
				

				$data['earnings']=$this->DashboardModel->WeekEarnings();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				
				$this->session->set_flashdata('status',$status);
				redirect(base_url().'Admin/Dashboard');
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function Dashboard()
	{
		
		if(get_cookie('auth_token')==NULL){
			$this->load->view('login');
		}else{

			try{
				

				$data['earnings']=$this->DashboardModel->WeekEarnings();
				$data['feedbacks']=$this->FeedbackModel->getFeedbacks();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "dashboard-li";   
				$data['li_eq']="0";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('dashboard',$data);	
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	
	public function login()
	{
		$userdata=$this->AuthModel->AuthenticateLogin();
		if(password_verify($this->input->post('password'),$userdata->password)){
			unset($userdata->password);
			set_cookie('auth_token',JWT::encode($userdata,'485489464','HS256'),0);
			$this->session->set_flashdata('status',"success");
		}else{
			$this->session->set_flashdata('status',"failure"); 
		}
			
			redirect(base_url().'Admin');
	}

    public function forgotpass(){
		$status=$this->session->flashdata('status');
		if(get_cookie('auth_token')==NULL){
			$this->load->view('forgotpass',['status'=>$status]);
		}else{
			
			$this->session->set_flashdata('status',$status);

			try{
				

				$data['earnings']=$this->DashboardModel->WeekEarnings();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				
				$this->session->set_flashdata('status',$status);
				redirect(base_url().'Admin/Dashboard');
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin/forgotpass');
			}
			
		}
		
	}
	//Employee List
	public function EmployeeList()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				

				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				
				$this->load->view('employee',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}


	//Customers 
	public function CustomersList()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$this->load->model('CustomerModel');
				$data['customers']=$this->CustomerModel->CustomersList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "customers-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('customer',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function AddCustomer()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				$this->load->model('CustomerModel');
				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['status']=$this->session->flashdata('status');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['li_id'] = "customers-li";   
				$data['li_eq']="0";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('customer_views/add_customer',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function RegisterCustomer()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				header('Content-Type: application/json');
				$this->load->model('CustomerModel');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				
				$data['cust_phno'] = $this->input->post('cust_phno');
				if($this->CustomerModel->checkCustomer()){
					echo json_encode(['status'=>'mobile_exists']);
				}else{
					if($this->CustomerModel->RegisterCustomer($data['user_data']->branch_id)){
						$this->session->set_flashdata('status',"success");
						echo json_encode(['status'=>'registration_success']);
					}else{
						echo json_encode(['status'=>'unknown_error']);
	
					}
				}
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function DeleteCustomer()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				$this->load->model('CustomerModel');
				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				if($this->CustomerModel->DeleteCustomer()){
					$this->session->set_flashdata('status',"deleted");
				}else{
					$this->session->set_flashdata('status',"error");

				}
				redirect(base_url().'Admin/CustomersList');
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function EditCustomer()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				$this->load->model('CustomerModel');
				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				if($this->CustomerModel->UpdateCustomer()){
					$this->session->set_flashdata('status',"updated");
				}else{
					$this->session->set_flashdata('status',"error");

				}
				redirect(base_url().'Admin/CustomersList');
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}

	//Appointments 
	public function Appointments()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['appointments']=$this->AppointmentModel->AppointmentsList($data['user_data']->branch_id);
				foreach($data['appointments'] as $key=>$value){
					$data['appointments'][$key]['services'] = $this->AppointmentModel->AppointmentServices($value['appoint_id']);
				}
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "appointments-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('appointment_views/appointments_list',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}


	public function BookAppointment()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				$this->load->model('CustomerModel');
				$data['customer']=$this->CustomerModel->getCustomer();
				$data['branch']=$this->AppointmentModel->BranchList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['timeslots']=$this->AppointmentModel->TimeSlots($data['user_data']->branch_id,date('Y-m-d'));
				$data['services']=$this->AppointmentModel->Services($data['user_data']->branch_id);


				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "appointmentslist-li";   
				$data['li_eq']="0";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('appointment_views/book_appointment',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function NewAppointment()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				header('Content-Type: application/json');
				$this->load->model('AppointmentModel');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				
				
				if($data = $this->AppointmentModel->checkSlots()){
					$this->session->set_flashdata('status',"slot_error");
					echo json_encode(['status'=>'slot_unavailable']);
				}else{
					if($this->AppointmentModel->NewAppointment()){
						$this->session->set_flashdata('status',"appointment_booked");
						echo json_encode(['status'=>'appointment_booked']);
					}else{
						$this->session->set_flashdata('status',"appointment_not_booked");
						echo json_encode(['status'=>'appointment_not_booked']);
	
					}
				}
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function AddAppointment()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				$this->load->model('CustomerModel');
				$data['customers']=$this->CustomerModel->CustomersList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "appointmentslist-li";   
				$data['li_eq']="0";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('appointment_views/add_appointment',$data);
				$this->load->view('assets/footer',$data);
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function AppointmentStatus(){

		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				$this->load->model('AppointmentModel');
				$data['customers']=$this->AppointmentModel->Appointmentbooking();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "appointments-li";   
				$data['li_eq']="0";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('appointment_views/appointment_status',$data);
				$this->load->view('assets/footer',$data);
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}

	}

	public function TimeSlots($branch_id)
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$timeslots=$this->AppointmentModel->TimeSlots($branch_id);

				

				echo json_encode($timeslots);
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function Services($branch_id)
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$services=$this->AppointmentModel->Services($branch_id);

				

				echo json_encode($services);
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function SlotsAndServices()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				$branch_id = $this->input->post('branch_id');
				$date = $this->input->post('date');
				
				$this->load->model('AppointmentModel');
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$result['timeslots']=$this->AppointmentModel->TimeSlots($branch_id,$date);
				$result['services']=$this->AppointmentModel->Services($branch_id);

				

				echo json_encode($result);
				
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}


	//Account Settings

	public function Profile()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				

				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['li_id'] = "profile-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('account_views/profile',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}
	public function ChangePass()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				
				
				$data['employees']=$this->EmployeeModel->EmployeeList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['li_id'] = "passchange-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('account_views/changepass',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}

	public function UpdatePass()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{
				header('Content-Type: application/json');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$userdata=$this->AuthModel->getEmployee($data['user_data']->emp_id);
				$old_pass = $this->input->post('current_pass');
				$new_pass = $this->input->post('new_pass');

				if(password_verify($old_pass,$userdata->password)){
					if($this->EmployeeModel->UpdatePass($data['user_data']->emp_id,$new_pass)){
						echo json_encode(array('status'=>'pass_changed','message'=>'Password Updated Successfully'));
					}else{
						echo json_encode(array('status'=>false,'message'=>'Password Update Failed'));

					}
				}else{
					echo json_encode(array('status'=>'incorrect_pass','message'=>'Incorrect Password'));
				}



			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			
		}
	}


	public function Logout()
	{
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{
			delete_cookie('auth_token');
			redirect(base_url().'Admin');
			
		}
	}

	//feedback
	public function Feedback(){
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{
			try{
				$this->load->model('CustomerModel');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['feedbacks']=$this->FeedbackModel->getFeedbacks();
				$data['li_id'] = "feedback-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);   
				$this->load->view('Feedback.php');
				$this->load->view('assets/footer',$data);

		    }catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}		
	    }

	}
	//Alerts
	public function Alerts(){
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{

			try{	
				$this->load->model('CustomerModel');
				$data['customers']=$this->CustomerModel->CustomersList();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "alerts-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);
				$this->load->view('alert',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}
			 
		}
	}
	public function sendalert(){
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{
			try{
				$this->load->model('CustomerModel');
				$data['customers']=$this->CustomerModel->CustomerAlert();
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['li_id'] = "alerts-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);   
				$this->load->view('sendalert',$data);
				$this->load->view('assets/footer',$data);

		    }catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}		
		  	
	    }

    }
	public function Payments(){
		if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Admin');
		}else{
			try{
				$this->load->model('CustomerModel');
				$data['user_data']=JWT::decode(get_cookie('auth_token'),'485489464',true);
				$data['status']=$this->session->flashdata('status');
				$data['payments']=$this->CustomerModel->getPayments();
				$data['li_id'] = "payments-li";   
				$data['li_eq']="1";
				$this->load->view('assets/sidebar',$data);
				$this->load->view('assets/header',$data);   
				$this->load->view('Payments.php');
				$this->load->view('assets/footer',$data);

		    }catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}		
	    }

	}

	function sendCode($email,$code){
		$this->load->library('email');
		$this->email->from('teaminnovative24@gmail.com', 'Team Innovative');
		$this->email->to($email);
		$this->email->subject('Confirmation Code for Password Reset');
		$this->email->message(' 
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
				 <p> &copy 2022 ABC. All rights reserved. </p> 
			 </div> 
		 </div>
		
	   </body>');
		if($this->email->send()) return true;
		else return false;
	}

	public function requestCode(){
		if(get_cookie('auth_token')!=NULL){
			redirect(base_url().'Admin');
		}else{
			try{
				header('Content-Type: application/json');
				$email = $this->input->post('email');
				if($this->AuthModel->checkEmail($email)){
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
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}		
	    }

	}


	public function resetpassword(){
		if(get_cookie('auth_token')!=NULL){
			redirect(base_url().'Admin');
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
							$this->EmployeeModel->resetPass($confirm_code_email,$password);
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
				delete_cookie('auth_token');
				redirect(base_url().'Admin');
			}		
	    }

	}



	//employee table
	
}