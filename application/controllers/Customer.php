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




}