<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dev extends CI_Controller {
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

    public function employee(){
        if(get_cookie('auth_token')==NULL){
			redirect(base_url().'Dev');
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
				$this->load->view('employee',$data);
				$this->load->view('assets/footer',$data);
			}catch(Exception $e){
				delete_cookie('auth_token');
				redirect(base_url().'Dev');
			}
			
		}
    }

}