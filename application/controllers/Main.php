<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('homeView');
	}
	public function contact()
	{
		$this->load->view('contact');
	}
	public function services()
	{
		$this->load->view('services');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function mobilenoView()
	{   $data['status']=$this->session->flashdata('status');
		$this->load->view('mobilenoView',$data);
	}
	public function otpView()
	{
		$this->load->view('otpView');
	}
}
