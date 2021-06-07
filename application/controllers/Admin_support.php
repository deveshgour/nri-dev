<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_support extends CI_Controller {
	function __construct() {
	 
        parent::__construct();
			
			admin_not_login();
      }
	

	  public function support_list() { 
	  $data = array();
	  
	  $data['support_list'] = $this->Common_model->getAll("ask_me",'ask_id','desc');
	  
      $this->load->view('layouts/admin_login_dashboard_layout',$data);
      $this->load->view('admin/support_list',$data);
      $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	public function chat()
	{
	  $data = array();
	  $this->load->view('layouts/admin_login_dashboard_layout',$data);
      $this->load->view('admin/chat',$data);
      $this->load->view('layouts/admin_footer_dashboard_layout',$data);
	}
	
	
	public function create_chat()
	{
		$user_id = $this->input->post('friend_user_id');
		$friend_user_id = $this->input->post('friend_user_id');
		$msg = $this->input->post('msg');
		
		$chat_id = $this->input->post('group_id');
		$data['group_id'] = $chat_id;
		
		$media_name = $_FILES['attachedFIle']['name'];
		$media_type_name = $_FILES['attachedFIle']['type'];		
		$media_type = explode('/',$media_type_name);
		
		if(!empty($msg) || !empty($media_name)){
		$array = array("admin_id" => 1,"msg" => $msg,"real_video_name"=> $media_name,"user_id" => $user_id,"create_date" =>date("Y-m-d H:i:s"));
		$insertid = $this->Common_model->addRecords("support_chat",$array);
		
		if(!empty($media_type[0])){
			
		   if($media_type[0] == 'image'){
		
			if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}				
			
		    $data['upload_path'] = 'chat_images/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('attachedFIle'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		
		$array = array("admin_id" => 1,"user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
		$this->Common_model->updateRecords("support_chat",$array,array("chat_id" => $insertid));
			}

		
		}elseif($media_type[0] == 'video'){
			
			if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}				
			
		$data['upload_path'] = 'chat_images/';
		$data['allowed_types'] = '3gp|mp4|mpeg|mpg|ogg|avi|ogg';
		//$data['max_size'] = '20480';
		
		$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('attachedFIle'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		$array = array("admin_id" => 1,"user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
		$this->Common_model->updateRecords("support_chat",$array,array("chat_id" => $insertid));

		}
		}else{
			 $data['upload_path'] = 'chat_images/';
			$data['allowed_types'] = 'pdf|doc|xml|zip|docx|csv';
			
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('attachedFIle'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   $array = array("admin_id" => 1,"user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
		$this->Common_model->updateRecords("support_chat",$array,array("chat_id" => $insertid));

			   
			}
		}
		}
		
		
	  }
		
		$list = $this->load->view('admin/createchat_ajax', array('group_id'=>$chat_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
}
