<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_dashboard extends CI_Controller {
	function __construct() {
	 
        parent::__construct();
			
			admin_not_login();
      }
	

	  public function dashboard() { 
	  $data = array();
	  
	  
	  
      $this->load->view('layouts/admin_login_dashboard_layout',$data);
      $this->load->view('admin/dashboard',$data);
      $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function post_user()
	{
		$data = array();
	  
	  $data['post_user'] = $this->Common_model->getAll("users","user_id","desc");
	  
       $this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/post_user',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function post_list()
	{
		$data = array();
		$segment = $this->uri->segment("3");
	  
	  $data['post_list'] = $this->Common_model->getAllwhereorder("post",array("user_id" => $segment),"user_id","desc");
	  
	  
       $this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/post_list',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function post_detail()
	{
		$data = array();
		$segment = $this->uri->segment("3");
	  
	  $data['post_detail'] = $this->Common_model->getsingle("post",array("post_id" => $segment));
	 
       $this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/post_detail',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function change_status()
	{
		$data = array();
		$segment = $this->uri->segment("3");
	  
	  $postData = $this->Common_model->getsingle("post",array("post_id" => $segment));
	  if($postData->status == "0"){
	 $this->Common_model->updateRecords("post", array("status" => "1"), array("post_id" => $segment));
	  }else{
		  $this->Common_model->updateRecords("post", array("status" => "0"), array("post_id" => $segment));
	  }
	  redirect("Admin_dashboard/post_list/".$postData->user_id);
      
	}
	
	public function add_connect_to_root()
	{
	   $data = array();
	   
	   
	   if($_POST['submit']){
		   $this->form_validation->set_rules('connect_root', 'Connect to root', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');
		   
		   $connect_root = $this->input->post('connect_root');
		   $status = $this->input->post('status');
		   
		   if($this->form_validation->run() == true)
           { 
	            $array = array(
				      "connect_root" => $connect_root,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("connect_to_root",$array);
				redirect("admin/connect_to_root");
		   }
		   
	   }
		  
	   $this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/add_connect_to_root',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function connect_to_root()
	{
		$data = array();
		
		$data["connect_to_root"] = $this->Common_model->getAll("connect_to_root","root_id","desc");
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/connect_to_root',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function root_detail_list()
	{ 
		$data = array();
		$segment = $this->uri->segment("3");
		
		$data["root_detail"] = $this->Common_model->getAllwhereorder("root_detail",array("root_id" => $segment),"root_id","desc");
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/root_detail_list',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function root_detail()
	{
		$data = array();
		$root_id = $this->uri->segment("3");
		$detail_id = $this->uri->segment("4");
		
		$data["connect_root"] = $this->Common_model->getsingle("connect_to_root",array("root_id" => $root_id));
		
		$data["root_detail"] = $this->Common_model->getsingle("root_detail",array("root_id" => $root_id,"detail_id" => $detail_id));
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/root_detail',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function add_root_detail()
	{
		$data = array();
		
		$data['root_detail'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		  
		 if($_POST['submit']){
		   $this->form_validation->set_rules('root_id', 'Root', 'trim|required');
		   $this->form_validation->set_rules('root_detail', 'Main text', 'trim|required');
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');
		   
		   $root_id = $this->input->post('root_id');
		   $root_detail = $this->input->post('root_detail');
		   $title = $this->input->post('title');
		   $status = $this->input->post('status');
		   
		   if($this->form_validation->run() == true)
           { 
	         // print_r($_POST);die;
			// echo $_FILES['media_path']['name'];die;
	        $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('media_path'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(
				      "root_id" => $root_id,
					  "root_detail" => $root_detail,
					  "media_path" => $uploadfile,
					  "title" => $title,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("root_detail",$array);
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				      "root_id" => $root_id,
					  "root_detail" => $root_detail,
					  "title" => $title,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("root_detail",$array);
		   }
		   redirect("admin/root_detail_list/".$root_id);
	        }
		 }
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/add_root_detail',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	 public function logout()
	{
		  $unset_data = array('email'=>'','admin_id'=>'');
            $this->session->unset_userdata($unset_data); 
			$this->session->sess_destroy();
            $base_url = base_url()."admin/login";
            redirect($base_url,'refresh');
	}
}
