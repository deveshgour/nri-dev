<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	function __construct() {
	 
        parent::__construct();
			
			is_login();
      }
	
	public function index()
	{ 
		$data = array();
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		$check_login = $this->Common_model->getsingle("users",array("email" => $email));
		$check_password = $this->Common_model->getsingle("users",array("email" => $email,"password" => md5($password)));
	
		
		if($this->form_validation->run() == true)
           { 
              
               if($check_login){ 
				   $con = array(
               'email' => $this->input->post('email'),
               'status' => 2,
               'password' =>  md5($this->input->post('password')));
              $checkLogin = $this->Common_model->checkRow($con);
			//  print_r($checkLogin);die;
			  if(empty($checkLogin) && $check_password->status == 2){
				  $data["message"] = "Please enter your valid email and password";
			  }
			   
			   }else{
				  $data["message"] = "Please enter your valid email and password";
			  }
			 if($check_password->status == 1){
				 $data["message"] = "Please verify your account";
			 }
			  
			 			 
			  if(!empty($checkLogin) && $check_password->status == 2){
				$array = array(
				   "email" => $check_password->email,
				   "user_id" => $check_password->user_id
				);

                  $this->session->set_userdata('userId', $array);				
				  
				  redirect('home');
			  }
           }
		   
		 $this->load->view('layouts/login_layout',$data);
		 $this->load->view('login',$data);  
	} 

	public function signup()
	{
		$data = array();
       $data['country_value'] = $this->Common_model->getAll("country","id","asc");
	
  if(isset($_POST['submit'])){
	
	
    $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
    $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[6]');
    $this->form_validation->set_rules('confirmpassword', 'password confirmation', 'trim|required|matches[password]');
    $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('country_id', 'Country', 'trim|required');
	$this->form_validation->set_rules('contact_number', 'Contact Number', 'trim|required');
	
    $temail =  $this->input->post('email');
    $country_code = $this->input->post("country_code");
	$contact_number = $this->input->post("contact_number");
    if($this->form_validation->run() == false)
    { 
       $this->load->view('layouts/login_layout',$data);
		$this->load->view('signup',$data);
    }else{  
        
        $otp = rand(0000,9999);
      $digits = 4;
      $otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
      $data = array(
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'email' =>  $this->input->post('email'),
        "dial_code" => $country_code,
		"contact_number" => $contact_number,
        'password' => md5($this->input->post('password')), 
        'country_id' =>  $this->input->post('country_id'),	
        'date_added' => date('Y-m-d H:i:s'),
        'status' =>1,
        'otp' => $otp
      );
      $insertId = $this->Common_model->addRecords('users', $data);
      
      if ($insertId) {
            
        $email = $data['email'];
        $password = $this->input->post('password');
        $url = '<a href="'.base_url().'verify/'.md5($temail).'/'.$insertId.'" target="_blank">'.base_url().'verify/'.md5($temail).'/'.$insertId.'</a>';
			
        $message = 'Dear user, please click on the below activation link to verify your email address '.$url;

	   $subject = "New user registration";
		
        //sendEmail($email,$subject,$message);
		$check= sendmail($email,$subject,$message,"swatu03@gmail.com","NRI");
		
      }
      $data['message'] = 'User has been added successfully please check your email and activate your account';
	  
	 $this->load->view('layouts/login_layout',$data);
		$this->load->view('signup',$data);
    }
  }else{
		
		
		$this->load->view('layouts/login_layout',$data);
		$this->load->view('signup',$data);
  }
	}
	
public function verify()
	{
		$user_id = $this->uri->segment(3);
		$getData = $this->Common_model->getsingle("users",array("user_id" => $user_id));
		if($this->uri->segment(2) == md5($getData->email)){ 
		$this->Common_model->updateRecords("users", array("status" => 2), array("user_id" => $user_id));
		redirect(base_url().'login');
		}
	}
	
	
public function forgotpassword()
	{
		$data = array();
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$email = $this->input->post('email');
		
		$getData = $this->Common_model->getsingle("users",array("email" => $email));
		if(isset($_POST['submit'])){
			
			
			$url = '<a href="'.base_url().'resetpass/'.base64_encode($email).'" target="_blank">Click here</a>';
			
        $message = 'Your password request accepted successfully to reset your password click on below link'.' '.$url;
	
	   $subject = "Forgot Password";
		
        //sendEmail($email,$subject,$message);
		$check= sendmail($email,$subject,$message,"swatu03@gmail.com","Forgot Password");
		$data['checkmail'] = $this->Common_model->getsingle("users",array("email" => $email,"status" =>2));
		
		if($check == 1 && !empty($data['checkmail'])){
			$msg = "Email sent successfully";
		$data['message'] = '<div class="text-center" style="color: green; font-size: 18px;">'.$msg.'</div>';
                                    
		}else{
			$msg = "Please enter a valid email address";
		$data['message'] = '<div class="text-center" style="color: red; font-size: 18px;">'.$msg.'</div>';
                                    
		}		
		}
		
		$this->load->view('layouts/login_layout',$data);
		$this->load->view('forgotpassword',$data);
	}
	
		public function resetpass()
	{
		$data = array();
		//$email =  base64_decode($_GET['email']);
		$email =  base64_decode($this->uri->segment('2'));
		//echo $email;die;
		$data['email'] = $email;
		//$data['check_email'] = $this->Common_model->getsingle("users",array("email" => $_POST['hidden_email'],"status" =>2));
		
		if(isset($_POST['submit'])){ 
			 $this->form_validation->set_rules('password', 'password', 'trim|required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
			
			 
			  if($this->form_validation->run() == true)
                 { 
                     $checkcon = $this->Common_model->getsingle("users",array("email" => $_POST['hidden_email'],"status" =>2));
                     
			        if($checkcon->password == md5($this->input->post("password"))){
			            
                      $array = array(
					      'password' => md5($this->input->post("newpassword"))
					  );
					  $upd = $this->Common_model->updateRecords("users",$array,array("email" => $_POST['hidden_email']));
					  if($upd >=1){
					      
					      
					      $data['check_email'] = $this->Common_model->getsingle("users",array("email" => $_POST['hidden_email'],"status" =>2));
						  $data['message'] = "Paassword updated successfully";
						  
						  
					  }
			        }else{
			            $data['messages'] = "please enter valid old password";
			        
			        }
					  
	             }
		}
		
		$this->load->view('layouts/login_layout',$data);
		$this->load->view('resetpassword',$data);
	}
	
	public function aboutus()
	{
		$data = array();
		$data['aboutus'] = $this->Common_model->getsingle('pages',array("page_id" => 1)); 
		$this->load->view('layouts/login_layout',$data);
		$this->load->view('aboutus',$data);
	}
	
	public function privacypolicy()
	{
		$data = array();
		$data['privacypolicy'] = $this->Common_model->getsingle('pages',array("page_id" => 2)); 
		$this->load->view('layouts/login_layout',$data);
		$this->load->view('privacypolicy',$data);
	}
	
}
