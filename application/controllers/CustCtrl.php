<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustCtrl extends CI_Controller {
	public function __construct(){
        parent::__construct();
     $this ->load->model('CustomerModel');
	 $this->load->helper('cookie');
	 $this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('dashboard');
	}
	public function Cust_dashboard()
	{
		$this->load->view('Cust_dashboard');
	}
	public function dashboard()
	{
		$this->load->view('dashboard');
	}

	public function getCust()
	{ 
			if(! $this->CustomerModel->checkPhno()){
				$this->session->set_flashdata('status',"invalid_mobile");
				redirect(base_url().'Main/mobilenoView');
			}else{
				// check if password matches
				 $data['mobile']=$this->input->post('cust_phno');
				 $data['status']=1;
				 $this->load->view("otpView",$data);
				
			}

			//$this->UserinfoModel->UpdateData("id");
	}

	public function custLogin(){
		if(! $this->CustomerModel->checkPhno()){
			$data['status'] = 0;
			$this->load->view('mobilenoView',$data);
		}else{
			// check if password matches
			if(! $this->CustomerModel->checkCust()){
				$data['mobile']=$this->input->post('cust_phno');
				$data['status'] = 3;
				$this->load->view("otpView",$data);
			}else{
				redirect(base_url().'dashboard');
			}

			 
			
		}
	}

}
