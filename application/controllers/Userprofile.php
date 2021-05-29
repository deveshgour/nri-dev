<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userprofile extends CI_Controller {
 function __construct() {
	 
        parent::__construct();
			
			not_login();
      }
	public function userprofile()
	{
		$data = array();
		$data['page'] = 0;
			
		$pagecon['per_page'] = 3;
		$data['per_page'] = 3;
		$session_id = $this->session->userdata('userId')['user_id'];
		$data["foruserimage"] = $this->Common_model->getsingle("users",array("user_id" => $session_id));
		$data["country_name"] = $this->Common_model->getsingle("country",array("id" => $data["foruserimage"]->country_id));
		
		$var_search = 'post.user_id ='.$session_id;
		$var_type = 1;
		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'date_added';
		$field = "post.post_id,post.post,post.media_path,post.media_type,post.status,post.date_added,users.user_id,users.firstname,users.lastname,users.user_image,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($pagecon['per_page'], $data['page'], $var_search, $var_type, 'post', "user_id", "users", "user_id",$sort_by, $sort_order, $sort_columns, $field,$search = '');
		//print_r($this->db->last_query()); die;
		$data["userDetail"] = $this->Common_model->getsingle("users",array("user_id" => $this->session->userdata("userId")["user_id"]));
		$data["allphoto"] = $this->Common_model->getAllwhereorder("user_images",array("user_id" => $this->session->userdata("userId")["user_id"],"photo_type" => "image"),"image_id","desc");
		$data["allvideo"] = $this->Common_model->getAllwhereorder("user_images",array("user_id" => $this->session->userdata("userId")["user_id"],"photo_type" => "video"),"image_id","desc");
		
		if(!empty($result['rows'])) {
				$data['post_data'] = $result['rows'];
				$data['count_total'] = $result['num_rows'];
			} else {
				$data['post_data'] = '';
				$data['count_total'] = '';
			}
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/userprofile',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function userphotoupload()
	{ 
		    $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$data['encrypt_name'] = true;
			
			$media_type_name = $_FILES['userphoto']['type'];		
		    $media_type = explode('/',$media_type_name);
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('userphoto'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
			   if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}
			   
			   $array = array(
			        "user_id" => $this->session->userdata("userId")["user_id"],
					"photo" => $uploadfile,
					"photo_type" => $media_type_new
			   );
			   
			   $insert_id = $this->Common_model->addRecords('user_images',$array);
			   $message = "Image Submitted successfully";
               $this->session->set_flashdata('success', $message);
			   redirect("userprofile");
	}else{
	          if (!$this->upload->do_upload('userphoto')) {
    $this->session->set_flashdata( 'error_msg', $this->upload->display_errors() );
     redirect("userprofile");
  }
	}
	}
	
	public function uservideoupload()
	{ 
		    $data['upload_path'] = 'upload/';
		$data['allowed_types'] = '3gp|mp4|mpeg|mpg|ogg|avi|ogg';
		$data['max_size'] = '20480';
		$data['overwrite']     = false;
		$data['encrypt_name'] = true;
			
			$media_type_name = $_FILES['uservideo']['type'];		
		    $media_type = explode('/',$media_type_name);
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('uservideo'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
			   if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}
			   
			   $array = array(
			        "user_id" => $this->session->userdata("userId")["user_id"],
					"photo" => $uploadfile,
					"photo_type" => $media_type_new
			   );
			   
			   $insert_id = $this->Common_model->addRecords('user_images',$array);
			   $message = "Video Submitted successfully";
               $this->session->set_flashdata('success', $message);
			   redirect("userprofile");
	}else{
	          if (!$this->upload->do_upload('uservideo')) {
    $this->session->set_flashdata( 'error_msg', $this->upload->display_errors() );
     redirect("userprofile");
  }
	}
	}
	
	public function get_offset()
	{
		$data['offset'] = $this->input->post('offset');
        
		$data['page'] = 5;
		//$var_search = array();
		$session_id = $this->session->userdata('userId')['user_id'];
		$var_search = 'post.user_id ='.$session_id;

		
        
		$var_type = 1;

		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'post.date_added';
		
        $field = "post.post_id,post.post,post.media_path,post.media_type,post.status,post.date_added,users.user_id,users.firstname,users.lastname,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($data['page'], $data['offset'], $var_search, $var_type, 'post', 'user_id', 'users', 'user_id',$sort_by, $sort_order, $sort_columns, $fields);
		
		if(!empty($result['rows'])) {
			$data['post_data'] = $result['rows'];
			$data['count_total'] = $result['num_rows'];
		} else {
			$data['post_data'] = '';
			$data['count_total'] = '';
		}	

		$this->load->view('home/ajax_value',$data);
	}
	
	public function search_friends()
	{ 
		if(isset($_POST['search'])){
	
	$result = $this->Common_model->searchuserslikenew($_POST['search'],array("status" => 2));
	
	
	$data = '<ul class="list-unstyled">';

	foreach($result as $re){
		
			$country_name = $this->Common_model->getsingle("country",array("id" => $re->country_id));
			$data .= '<li><a href="'.base_url()."friend-user/".base64_encode($re->user_id).'" ><span value='.$re->user_id.'>'.$re->firstname.' '.$re->lastname.'<span class="country_name">'. $country_name->name.'<span></span></a></li>';
			 }  
			 
			 $data .= '</ul>';
			
	}
	
echo $data;
	
	}
	
public function friend_user()
	{
		$user_id = base64_decode($this->uri->segment('2'));
		$data["user_id"] = $user_id;
		$session_id = $this->session->userdata("userId")["user_id"];
		
		$data = array();
		$data['page'] = 0;
			
		$pagecon['per_page'] = 3;
		$data['per_page'] = 3;
		
		$data["foruserimage"] = $this->Common_model->getsingle("users",array("user_id" => $user_id));
		
		$data["country_name"] = $this->Common_model->getsingle("country",array("id" => $data["foruserimage"]->country_id));
		
		$var_search = 'post.user_id ='.$user_id;
		$var_type = 1;
		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'date_added';
		$field = "post.post_id,post.post,post.media_path,post.media_type,post.status,post.date_added,users.user_id,users.firstname,users.lastname,users.user_image,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($pagecon['per_page'], $data['page'], $var_search, $var_type, 'post', "user_id", "users", "user_id",$sort_by, $sort_order, $sort_columns, $field,$search = '');
		
		//print_r($this->db->last_query()); die;
		$data["userDetail"] = $this->Common_model->getsingle("users",array("user_id" => $user_id));
		$data["allphoto"] = $this->Common_model->getAllwhereorder("user_images",array("user_id" => $user_id,"photo_type" => "image"),"image_id","desc");
		$data["allvideo"] = $this->Common_model->getAllwhereorder("user_images",array("user_id" => $user_id,"photo_type" => "video"),"image_id","desc");
		$data["checkfriend"] = $this->Common_model->getsingle("friend",array("friend_user_id" => $user_id,"user_id" => $session_id));
		$data["checknewfriend"] = $this->Common_model->getsingle("friend",array("friend_user_id" => $session_id,"user_id" => $user_id));
		
		if(!empty($result['rows'])) {
				$data['post_data'] = $result['rows'];
				$data['count_total'] = $result['num_rows'];
			} else {
				$data['post_data'] = '';
				$data['count_total'] = '';
			}
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/friend_user',$data);  
		$this->load->view('layouts/footer_layout',$data);
		
	}
	
	public function friendRequest()
	{
		$user = $this->input->post('userid');
		$reciever = $this->Common_model->getsingle('users',array('user_id'=>$user));	
		$session_id = $this->session->userdata('userId')['user_id'];
		$sender = $this->session->userdata('firstname');
		$where = '(user_id = '.$user.' and friend_user_id = '.$session_id.') or ( user_id = '.$session_id.' and friend_user_id = '.$user.' )';
		$row = $this->Common_model->getsingle('friend',$where);
		if(empty($row)){
				$array = array(
				   'friend_user_id' => $user,
				   'create_at' => date('Y:m:d H:i:s'),
				   'user_id' => $session_id,
				   'request_status' => 0,				   
				);
			$this->Common_model->addRecords('friend',$array);
			$response = array("success" => true, 'message'=>'Friend Request Sent Successfully');
		    echo json_encode($response); exit;
		}
		$response = array("success" => false, 'message'=>'Your request not processed');
		echo json_encode($response);
	}
	
	public function deleteRequest()
	{
		$user = $this->input->post('userid');		
		$session_id = $this->session->userdata('userId')['user_id'];
		
		$this->Common_model->deleteRecords("friend",array("friend_user_id" => $user,"user_id" => $session_id));
		$response = array("success" => true, 'message'=>'Request remove successfully');
		echo json_encode($response);
	}
	
	public function friendRequest_list()
	{
		$user_id = $this->session->userdata('userId')['user_id'];	
		$data['friendrequest_list'] = $this->Common_model->jointwotable("friend", "friend_user_id", "users", "user_id",array("friend.user_id" => $user_id,"friend.request_status" => 0),"*");
		
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/friendRequest_list',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
}
