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
	
	public function buzz_list()
	{ 
		$data = array();
		
		$data["buzz_list"] = $this->Common_model->getAll("buzz","buzz_id","desc");
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/buzz_list',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function add_buzz()
	{
		$data = array();
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');		   
		   
		   $title = $this->input->post('title');
		   $description = $this->input->post('description');		  
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
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("buzz",$array);
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("buzz",$array);
		   }
		   redirect("Admin_dashboard/buzz_list");
	        }
		 }
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/add_buzz',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function view_buzz()
	{
		$data = array();	
		
		$buzz_id = $this->uri->segment("3");
		$data["view_buzz"] = $this->Common_model->getsingle("buzz",array("buzz_id" => $buzz_id));
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/view_buzz',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function edit_buzz()
	{
		$data = array();
		$buzz_id = $this->uri->segment("3");
		$data['buzz_data'] = $this->Common_model->getsingle("buzz",array("buzz_id" => $buzz_id));

		
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');		   
		   
		   $title = $this->input->post('title');
		   $description = $this->input->post('description');		  
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
			
			
			if($data['buzz_data']->image == $_FILES['image']['name']){
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("buzz", $array, array("buzz_id" => $buzz_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("buzz", $array, array("buzz_id" => $buzz_id));
		   }
		   redirect("Admin_dashboard/buzz_list");
	        
		   }else{ 
			   $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("buzz", $array, array("buzz_id" => $buzz_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("buzz", $array, array("buzz_id" => $buzz_id));
		   }
		   redirect("Admin_dashboard/buzz_list");
		 }
		   }
		}
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/edit_buzz',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function delete_buzz()
	{
		$this->Common_model->deleteRecords("buzz",array("buzz_id" => $this->uri->segment("3")));
		redirect("Admin_dashboard/buzz_list");
	}
	
	public function gov_list()
	{
		$data = array();
		
		$data["gov_list"] = $this->Common_model->getAll("lets_gov","gov_id","desc");
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/gov_list',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function add_gov()
	{
		$data = array();
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('url', 'Url', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');		   
		   
		   $title = $this->input->post('title');
		   $url = $this->input->post('url');		  
		   $status = $this->input->post('status');
		   $description = $this->input->post('description');
		   
		   if($this->form_validation->run() == true)
           { 
	         // print_r($_POST);die;
			// echo $_FILES['media_path']['name'];die;
	        $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("lets_gov",$array);
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     "image" => $uploadfile,
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("lets_gov",$array);
		   }
		   redirect("Admin_dashboard/gov_list");
	        }
		 }
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/add_gov',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function view_gov()
	{
		$data = array();	
		
		$gov_id = $this->uri->segment("3");
		$data["view_gov"] = $this->Common_model->getsingle("lets_gov",array("gov_id" => $gov_id));
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/view_gov',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function edit_gov()
	{
		$data = array();
		$gov_id = $this->uri->segment("3");
		$data['gov_data'] = $this->Common_model->getsingle("lets_gov",array("gov_id" => $gov_id));

		
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('url', 'Url', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   
		   $title = $this->input->post('title');
		   $url = $this->input->post('url');		  
		   $status = $this->input->post('status');
		   $description = $this->input->post('description'); 
		   
		   if($this->form_validation->run() == true)
           { 
	         // print_r($_POST);die;
			// echo $_FILES['media_path']['name'];die;
	        $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			
			if($data['gov_data']->image == $_FILES['image']['name']){
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("lets_gov", $array, array("gov_id" => $gov_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("lets_gov", $array, array("gov_id" => $gov_id));
		   }
		   redirect("Admin_dashboard/gov_list");
	        
		   }else{ 
			   $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("lets_gov", $array, array("gov_id" => $gov_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "url" => $url,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("lets_gov", $array, array("gov_id" => $gov_id));
		   }
		   redirect("Admin_dashboard/gov_list");
		 }
		   }
		}
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/edit_gov',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function delete_gov()
	{
		$this->Common_model->deleteRecords("lets_gov",array("gov_id" => $this->uri->segment("3")));
		redirect("Admin_dashboard/gov_list");
	}
	
	public function fact_list()
	{
		$data = array();
		
		$data["fact_list"] = $this->Common_model->getAll("fact","fact_id","desc");
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/fact_list',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function add_fact()
	{
		$data = array();
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');		   
		   
		   $title = $this->input->post('title');
		   $description = $this->input->post('description');		  
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
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("fact",$array);
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->addRecords("fact",$array);
		   }
		   redirect("Admin_dashboard/fact_list");
	        }
		 }
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/add_fact',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function view_fact()
	{
		$data = array();	
		
		$fact_id = $this->uri->segment("3");
		$data["view_fact"] = $this->Common_model->getsingle("fact",array("fact_id" => $fact_id));
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
        $this->load->view('admin/view_fact',$data);
        $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function edit_fact()
	{
		$data = array();
		$fact_id = $this->uri->segment("3");
		$data['fact_data'] = $this->Common_model->getsingle("fact",array("fact_id" => $fact_id));

		
		if($_POST['submit']){
		   $this->form_validation->set_rules('title', 'Title', 'trim|required');
		   $this->form_validation->set_rules('description', 'Description', 'trim|required');
		   $this->form_validation->set_rules('status', 'Status', 'trim|required');		   
		   
		   $title = $this->input->post('title');
		   $description = $this->input->post('description');		  
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
			
			
			if($data['fact_data']->image == $_FILES['image']['name']){
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("fact", $array, array("fact_id" => $fact_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("fact", $array, array("fact_id" => $fact_id));
		   }
		   redirect("Admin_dashboard/fact_list");
	        
		   }else{ 
			   $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			
			
			if($this->upload->do_upload('image'))
			{
				
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
	            $array = array(					  
					  "image" => $uploadfile,
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("fact", $array, array("fact_id" => $fact_id));
				//redirect("admin/connect_to_root");
		   }else{
			   $array = array(
				     
					  "title" => $title,
					  "description" => $description,
					  "status" => $status,
					  "create_date" => date("Y-m-d H:i:s")
				);
				$this->Common_model->updateRecords("fact", $array, array("fact_id" => $fact_id));
		   }
		   redirect("Admin_dashboard/fact_list");
		 }
		   }
		}
		
		$this->load->view('layouts/admin_login_dashboard_layout',$data);
       $this->load->view('admin/edit_fact',$data);
       $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function delete_fact()
	{
		$this->Common_model->deleteRecords("fact",array("fact_id" => $this->uri->segment("3")));
		redirect("Admin_dashboard/fact_list");
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
