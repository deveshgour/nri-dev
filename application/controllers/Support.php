<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller {
 function __construct() {
	 
        parent::__construct();
			
			not_login();
      }
	
	public function chat()
	{
		$data = array();
		
		/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/support',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function chat_system()
	{
		$user_id = $this->session->userdata('userId')['user_id'];
		$friend_user_id = $this->input->post('friend_user_id');
		$msg = $this->input->post('msg');
		
		$chat_id = $this->input->post('group_id');
		$data['group_id'] = $chat_id;
		
		$media_name = $_FILES['attachedFIle']['name'];
		$media_type_name = $_FILES['attachedFIle']['type'];		
		$media_type = explode('/',$media_type_name);
		
		if(!empty($msg) || !empty($media_name)){
		$array = array("msg" => $msg,"real_video_name"=> $media_name,"user_id" => $user_id,"create_date" =>date("Y-m-d H:i:s"));
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
			$config['max_size'] = 6000;
            $config['max_width'] = 5500;
            $config['max_height'] = 5500;
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('attachedFIle'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		
		$array = array("user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
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
			  
		
		$array = array("user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
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
			   $array = array("user_id" => $user_id,"media_type" => $media_type_new,"media_path"=>$uploadfile);
		$this->Common_model->updateRecords("support_chat",$array,array("chat_id" => $insertid));

			   
			}
		}
		}
		
		
	  }
		
		$list = $this->load->view('home/createsupportchat_ajax', array('group_id'=>$this->session->userdata('userId')['user_id']), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
		
	}
	
	public function chat_image_model()
	{
		$data['chat_id'] = $this->input->post('chatid');
		$data['chata_image_show'] = $this->Common_model->getsingle("support_chat",array("chat_id" => $data['chat_id']));
		//echo '<pre>';print_r($data['chata_image_show']);die;
		$this->load->view('home/chat_image_model',$data);
	}
	
	public function chat_video_model()
	{
		$data['chat_id'] = $this->input->post('chatid');
		$data['chata_image_show'] = $this->Common_model->getsingle("support_chat",array("chat_id" => $data['chat_id']));
		
		$this->load->view('home/chat_video_model',$data);
	}
	
	public function downloadpdf()
	{ 
		$this->load->helper('download');
		$chatid = $this->uri->segment('3');
       //$chatid = $this->input->post('chatid');
		$chata_pdf = $this->Common_model->getsingle("support_chat",array("chat_id" => $chatid));
     // echo '<pre>';print_r($chata_pdf);die;
        $name = $chata_pdf->media_path;
$real_name = $chata_pdf->real_video_name;
$data = file_get_contents(base_url()."chat_images/".$chata_pdf->media_path);
force_download($real_name, $data);
      
	//$type = explode('.',$name);
	
	
	redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function delete_all_chat()
	{
		$chatid = $this->input->post("chatid");
		$implode = implode(',',$chatid);
		print_r($implode);
	}

}
