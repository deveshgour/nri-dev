<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	
	function __construct() {
	 
        parent::__construct();
			
			admin_is_login();
      }
	
	
	public function login() { 
	
    $data = array();	
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$check_login = $this->Common_model->getsingle("admin",array("email" => $email));
		
		$check_password = $this->Common_model->getsingle("admin",array("email" => $email,"password" => md5($password)));
	//echo '<pre>';print_r($check_password);die;
		
		if($this->form_validation->run() == true)
           { 
              
               if($check_login){ 
				   $con = array(
               'email' => $this->input->post('email'),              
               'password' =>  md5($this->input->post('password')));
              $checkLogin = $this->Common_model->checkadminRow($con);
			//  print_r($checkLogin);die;
			  if(empty($checkLogin)){
				  $data["message"] = "Please enter your valid email and password";
			  }
			   
			   }else{
				  $data["message"] = "Please enter your valid email and password";
			  }
			
			 			 
			  if(!empty($checkLogin)){
				$array = array(
				   "email" => $check_password->email,
				   "admin_id" => $check_password->admin_id
				);

                  $this->session->set_userdata('adminId', $array);				
				  
				  redirect('admin/dashboard');
			  }
           }
   $this->load->view('layouts/admin_login_layout',$data);
   $this->load->view('admin/login',$data);
   $this->load->view('layouts/admin_footer_layout',$data);
  }
  
	
}
