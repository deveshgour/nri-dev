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
	//	$data["allphoto"] = $this->Common_model->getAllwhereorder("post",array("user_id" => $this->session->userdata('userId')['user_id'],'media_type' => 'image'),'post_id','desc');
        //$data["allvideo"] = $this->Common_model->getAllwhereorder("post",array("user_id" => $this->session->userdata("userId")["user_id"],"media_type" => "video"),"post_id","desc");

		
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
			
				/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/userprofile',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function userphotoupload()
	{ 
		    $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg|webp';
			$config['max_size'] = 6000;
            $config['max_width'] = 5500;
            $config['max_height'] = 5500;
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
		if(!empty($re->user_image)){
		$img = base_url().'upload/'.$re->user_image;
		}else{
		$img = base_url().'images/user_image.png';
		}
		
			$country_name = $this->Common_model->getsingle("country",array("id" => $re->country_id));
			$data .= '<li><a href="'.base_url()."friend-user/".base64_encode($re->user_id).'" ><span value='.$re->user_id.' class="d-flex align-items-center"><span class="mr-2"><img src="'.$img.'" class="rounded-circle" width="30" height="30"/></span><span>'.$re->firstname.' '.$re->lastname.'<span class="country_name">'. $country_name->name.'</span></span></span></a></li>';
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
			
		$pagecon['per_page'] = 50;
		$data['per_page'] = 50;
		
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
	$where = '(friend_user_id ='.$session_id.' and user_id ='.$user_id.') or (friend_user_id ='.$user_id.' and user_id ='.$session_id.')';
		$data["checkfriend"] = $this->Common_model->getsingle("friend",$where);
		
		if(!empty($result['rows'])) {
				$data['post_data'] = $result['rows'];
				$data['count_total'] = $result['num_rows'];
			} else {
				$data['post_data'] = '';
				$data['count_total'] = '';
			}
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
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
			$insert = $this->Common_model->addRecords('friend',$array);
			$array = array("user_id" => $session_id,"friend_user_id" => $user, "status" => 0,"create_date" => date('Y-m-d H:i:s'),"message_request"=>"friend_req");
			$this->Common_model->addRecords("notification",$array);
			
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
		$this->Common_model->deleteRecords("notification",array("friend_user_id" => $user,"user_id" => $session_id,"message_request"=>"friend_req"));
		$response = array("success" => true, 'message'=>'Request remove successfully');
		
		echo json_encode($response);
	}
	
	public function deletefriendRequest()
	{
		$user = $this->input->post('userid');		
		$session_id = $this->session->userdata('userId')['user_id'];
		
		$this->Common_model->deleteRecords("friend",array("friend_user_id" => $session_id,"user_id" => $user));
		$this->Common_model->deleteRecords("notification",array("friend_user_id" => $session_id,"user_id" => $user,"message_request"=>"friend_req"));
		$response = array("success" => true, 'message'=>'Request remove successfully');
		
		echo json_encode($response);
	}
	
	public function friendRequest_list()
	{
		$user_id = $this->session->userdata('userId')['user_id'];	
		$data['friendrequest_list'] = $this->Common_model->jointwotableorderby("friend", "user_id", "users", "user_id",array("friend.friend_user_id" => $user_id,"friend.request_status" => 0),"*","friend_id","desc");
		
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/friendRequest_list',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function respondRequest()
	{ 
		$friend_id = $this->input->post('frnd_id');	
		$frndsug = $this->input->post('frndsug');		
		$user_id = $this->session->userdata('userId')['user_id'];
		$list_id = $this->input->post('listid');	
		$array = array(		  
			   'create_at' => date('Y:m:d H:i:s'),		  
			   'request_status' => 1
			);
			$this->Common_model->updateRecords('friend',$array,array('friend_user_id' => $user_id,'user_id' => $friend_id));	
			$this->Common_model->updateRecords("notification",array("create_date"=>date('Y:m:d H:i:s'),"status" => 1,"message_request"=>"friend_req"),array('friend_user_id' => $user_id,'user_id' => $friend_id));
			$response = array("success" => true, 'message'=>'Friend Request Sent Successfully');
			echo json_encode($response); 
	}
	
	public function buzz_list()
	{
		$data = array();
		$data['buzz_list'] = $this->Common_model->getAllwhereorder("buzz",array("status" => "1"),"buzz_id","desc");
		 
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/buzz_list',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function buzz_detail()
	{
		$data = array();
		
		$buzz_id = $this->uri->segment("2");
		$data["detail"] = $this->Common_model->getsingle("buzz",array("buzz_id" => $buzz_id));
		$data["userDetail"] = $this->Common_model->getsingle("users",array("user_id" => $this->session->userdata("userId")["user_id"]));
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/buzz_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function gov_list()
	{
		$data = array();
		$data['gov_list'] = $this->Common_model->getAllwhereorder("lets_gov",array("status" => "1"),"gov_id","desc");
		 
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/gov_list',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function gov_detail_bkp()
	{
		$data = array();
		
		$gov_id = $this->uri->segment("2");
		$data["detail"] = $this->Common_model->getsingle("lets_gov",array("gov_id" => $gov_id));
		$data["userDetail"] = $this->Common_model->getsingle("users",array("user_id" => $this->session->userdata("userId")["user_id"]));
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/gov_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function gov_detail()
	{ 
		$data = array();
		
		$data['page'] = 0;
			
		$pagecon['per_page'] = 3;
		$data['per_page'] = 3;
		
		$session_id = $this->session->userdata('userId')['user_id'];
		$data["foruserimage"] = $this->Common_model->getsingle("users",array("user_id" => $session_id));
		
		$var_search = 'status = 1';
		$var_type = 1;
		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'create_date';
		$field = "lets_gov.gov_id,lets_gov.url,lets_gov.description,lets_gov.title,lets_gov.image,lets_gov.status,lets_gov.create_date,users.user_id,users.firstname,users.lastname,users.user_image,users.email,users.country_id";
		//$result = $this->Common_model->getAllJoin($pagecon['per_page'], $data['page'], $var_search, $var_type, 'lets_gov', "user_id", "users", "user_id",$sort_by, $sort_order, $sort_columns, $field,$search = ''); 
		$result = $this->Common_model->getAllusers($pagecon['per_page'], $data['page'], $var_search, $var_type, 'lets_gov', $sort_by, $sort_order,  $sort_columns);
		//print_r($this->db->last_query()); 
		
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		
		
		 
		if(!empty($result['rows'])) {
				$data['post_data'] = $result['rows'];
				$data['count_total'] = $result['num_rows'];
			} else {
				$data['post_data'] = '';
				$data['count_total'] = '';
			}
			
				/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		 $this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/gov_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	} 
	
		public function get_govoffset()
	{
		$data['offset'] = $this->input->post('offset');
        
		$data['page'] = 3;
		//$var_search = array();
		$session_id = $this->session->userdata('userId')['user_id'];
		$var_search = 'status = 1';

		
        
		$var_type = 1;

		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'create_date';
		
        //$field = "post.post_id,post.post,post.media_path,post.media_type,post.status,post.date_added,users.user_id,users.firstname,users.lastname,users.email,users.country_id";
		$result = $this->Common_model->getAllusers($data['page'], $data['offset'], $var_search, $var_type, 'lets_gov', $sort_by, $sort_order,  $sort_columns);
		//echo "<pre>";print_r($result);die;
		//echo $this->db->last_query();die;
		if(!empty($result['rows'])) {
			$data['post_data'] = $result['rows'];
			$data['count_total'] = $result['num_rows'];
		} else {
			$data['post_data'] = '';
			$data['count_total'] = '';
		}	

		$this->load->view('home/ajax_govvalue',$data);
	}
	
	public function fact_list()
	{
		$data = array();
		$data['fact_list'] = $this->Common_model->getAllwhereorder("fact",array("status" => "1"),"fact_id","desc");
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		 
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/fact_list',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function like_gov()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('post');		
		$status = $this->input->post('status');
		$author = $this->input->post('author');
		
		  
		
		$liked = $this->Common_model->getsingle('like_gov',array('gov_id'=>$post_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if($liked){
			if($liked->status == $status){
			$response = array("status" => $status,"success" => false, 'message'=>'Successfully insert');
			}else{
			$this->Common_model->updateData('like_gov',array('status'=>$status),array('like_gov_id'=>$liked->like_gov_id));
			$count_like_one = $this->Common_model->jointwotable('like_gov', 'user_id', 'users', 'user_id',array('gov_id' => $post_id,'like_gov.status'=>1),'users.user_id,users.firstname,users.lastname,like_gov.like_gov_id');
		 
			$response = array("status" => $status, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}
            $this->Common_model->deleteRecords('like_gov',array("like_id" => $liked->like_id));
			$count_like_one = $this->Common_model->jointwotable('like_gov', 'user_id', 'users', 'user_id',array('gov_id' => $post_id,'like_gov.status'=>1),'users.user_id,users.firstname,users.lastname,like_gov.like_gov_id');
			$response = array("status" => "0","success" => false, 'message'=>'Successfully delete','like'=>count($count_like_one));
		}else{
		if($status == 1){
			$array = array(
			'gov_id' => $post_id,
			'user_id' => $user_id,
			//'create_at' => date('Y:m:d H:i:s'),
			'status' => $status
			);
			$insert_id = $this->Common_model->addRecords('like_gov',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('like_gov', 'user_id', 'users', 'user_id',array('gov_id' => $post_id,'like_gov.status'=>1),'users.user_id,users.firstname,users.lastname,like_gov.like_gov_id');
		 
			
			$response = array("status" => $status, "type"=>$type, "success" => true, 'message'=>'Successfully insert','like_gov'=>count($count_like_one));
			}else{
				$response = array("status" => $status, "type"=>$type, "success" => false, 'message'=>'Not Liked');

			}

			}else{
				$response = array("success" => false, 'message'=>'Not Liked');

			}

		}

		echo json_encode($response);
	}
	
	public function addcommentgov()
	{
		
		$post_id = $this->input->post("postId");
		$userIds = $this->input->post("userIds");
		$post_comment = $this->input->post("post_comment");
		$array = array(
			"comment" => $post_comment,
			"gov_id" => $post_id,
			"user_id" => $userIds,
			"create_date" => date("Y-m-d,H:i:s")
			);
		$insertid = $this->Common_model->addRecords("comment_gov",$array);
		
		$data['getallcomment'] = $this->Common_model->commentpaginationgov(array("gov_id" => $post_id),3,0,"comment_gov_id", "desc");
		$data['totalcommentcount'] = $this->Common_model->countwhereuser("comment_gov",array("gov_id" => $post_id));
		$data['post_id'] = $this->input->post("postId");
		
		$list = $this->load->view('home/ajax_gov_comment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$post_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list,'totalcommentcount' => $data['totalcommentcount']);
		echo json_encode($return);
       
	}
	
		public function get_gov_comments()
	{
		$offset = $this->input->post('offset');
		
		$postid = $this->input->post('postid');
		$off = $offset + 1;
		$limit = 3;
		$offset = $offset * $limit;
		
		
		
		$data['getallcomment'] = $this->Common_model->commentpaginationgov(array("gov_id" => $postid),$limit,$offset,"comment_gov_id", "desc");
		
		$list = $this->load->view('home/ajax_newgovcomment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$postid,'offset'=>$off), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
	public function delete_gov_comment()
	{
		$comment_id = $this->input->post("comment_id");
		$postid = $this->input->post("postid");
		
		$this->Common_model->deleteRecords("comment_gov",array("comment_gov_id" => $comment_id,"gov_id" => $postid));
	}
	
	/*----------------------------------------buzz--------------------------------------*/
	
	public function like_buzz()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('post');		
		$status = $this->input->post('status');
		$author = $this->input->post('author');
		
		  
		
		$liked = $this->Common_model->getsingle('like_buzz',array('buzz_id'=>$post_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if($liked){
			if($liked->status == $status){ 
			$response = array("status" => $status,"success" => false, 'message'=>'Successfully insert');
			}else{
			$this->Common_model->updateData('like_buzz',array('status'=>$status),array('like_buzz_id'=>$liked->like_buzz_id));
			$count_like_one = $this->Common_model->jointwotable('like_buzz', 'user_id', 'users', 'user_id',array('buzz_id' => $post_id,'like_buzz.status'=>1),'users.user_id,users.firstname,users.lastname,like_buzz.like_buzz_id');
		 
			$response = array("status" => $status, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}
            $this->Common_model->deleteRecords('like_buzz',array("like_buzz_id" => $liked->like_buzz_id));
			$count_like_one = $this->Common_model->jointwotable('like_buzz', 'user_id', 'users', 'user_id',array('buzz_id' => $post_id,'like_buzz.status'=>1),'users.user_id,users.firstname,users.lastname,like_buzz.like_buzz_id');
			$response = array("status" => "0","success" => false, 'message'=>'Successfully delete','like'=>count($count_like_one));
		}else{
		if($status == 1){
			$array = array(
			'buzz_id' => $post_id,
			'user_id' => $user_id,
			//'create_at' => date('Y:m:d H:i:s'),
			'status' => $status
			);
			$insert_id = $this->Common_model->addRecords('like_buzz',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('like_buzz', 'user_id', 'users', 'user_id',array('buzz_id' => $post_id,'like_buzz.status'=>1),'users.user_id,users.firstname,users.lastname,like_buzz.like_buzz_id');
		// echo $this->db->last_query();die;
			//echo "<pre>";print_r();die;
			$response = array("status" => $status, "type"=>$type, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}else{
				$response = array("status" => $status, "type"=>$type, "success" => false, 'message'=>'Not Liked');

			}

			}else{
				$response = array("success" => false, 'message'=>'Not Liked');

			}

		}

		echo json_encode($response);
	}
	
	public function addcommentbuzz()
	{
		
		$post_id = $this->input->post("postId");
		$userIds = $this->input->post("userIds");
		$post_comment = $this->input->post("post_comment");
		$array = array(
			"comment" => $post_comment,
			"buzz_id" => $post_id,
			"user_id" => $userIds,
			"create_date" => date("Y-m-d,H:i:s")
			);
		$insertid = $this->Common_model->addRecords("comment_buzz",$array);
		
		$data['getallcomment'] = $this->Common_model->commentpaginationbuzz(array("buzz_id" => $post_id),3,0,"comment_buzz_id", "desc");
		$data['totalcommentcount'] = $this->Common_model->countwhereuser("comment_buzz",array("buzz_id" => $post_id));
		$data['post_id'] = $this->input->post("postId");
		
		$list = $this->load->view('home/ajax_buzz_comment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$post_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list,'totalcommentcount' => $data['totalcommentcount']);
		echo json_encode($return);
       
	}
	
		public function get_buzz_comments()
	{
		$offset = $this->input->post('offset');
		
		$postid = $this->input->post('postid');
		$off = $offset + 1;
		$limit = 3;
		$offset = $offset * $limit;
		
		
		
		$data['getallcomment'] = $this->Common_model->commentpaginationbuzz(array("buzz_id" => $postid),$limit,$offset,"comment_buzz_id", "desc");
		
		$list = $this->load->view('home/ajax_newbuzzcomment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$postid,'offset'=>$off), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
	public function delete_buzz_comment()
	{
		$comment_id = $this->input->post("comment_id");
		$postid = $this->input->post("postid");
		
		$this->Common_model->deleteRecords("comment_buzz",array("comment_buzz_id" => $comment_id,"buzz_id" => $postid));
	}
	 
	/* ---------------------------------------------------------------------------------- */
	
	public function fact_detail()
	{
		$data = array();
		
		$fact = $this->uri->segment("2");
		$data["detail"] = $this->Common_model->getsingle("fact",array("fact_id" => $fact));
		$data["userDetail"] = $this->Common_model->getsingle("users",array("user_id" => $this->session->userdata("userId")["user_id"]));
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/fact_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	} 
	
	/*----------------------------------------root--------------------------------------*/
	
	public function like_root()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('post');		
		$status = $this->input->post('status');
		$root_id = $this->input->post('root_id');
		$author = $this->input->post('author');
		
		  
		
		$liked = $this->Common_model->getsingle('like_root',array('detail_id'=>$post_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if($liked){
			if($liked->status == $status){ 
			$response = array("status" => $status,"success" => false, 'message'=>'Successfully insert');
			}else{
			$this->Common_model->updateData('like_root',array('status'=>$status),array('like_root_id'=>$liked->like_root_id));
			$count_like_one = $this->Common_model->jointwotable('like_root', 'user_id', 'users', 'user_id',array('detail_id' => $post_id,'like_root.status'=>1),'users.user_id,users.firstname,users.lastname,like_root.like_root_id');
		 
			$response = array("status" => $status, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}
            $this->Common_model->deleteRecords('like_root',array("like_root_id" => $liked->like_root_id));
			$count_like_one = $this->Common_model->jointwotable('like_root', 'user_id', 'users', 'user_id',array('detail_id' => $post_id,'like_root.status'=>1),'users.user_id,users.firstname,users.lastname,like_root.like_root_id');
			$response = array("status" => "0","success" => false, 'message'=>'Successfully delete','like'=>count($count_like_one));
		}else{
		if($status == 1){
			$array = array(
			'root_id' => $root_id,
			'user_id' => $user_id,
			'detail_id' => $post_id,
			//'create_at' => date('Y:m:d H:i:s'),
			'status' => $status
			);
			$insert_id = $this->Common_model->addRecords('like_root',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('like_root', 'user_id', 'users', 'user_id',array('detail_id' => $post_id,'like_root.status'=>1),'users.user_id,users.firstname,users.lastname,like_root.like_root_id');
		// echo $this->db->last_query();die;
			//echo "<pre>";print_r();die;
			$response = array("status" => $status, "type"=>$type, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}else{
				$response = array("status" => $status, "type"=>$type, "success" => false, 'message'=>'Not Liked');

			}

			}else{
				$response = array("success" => false, 'message'=>'Not Liked');

			}

		}

		echo json_encode($response);
	}
	
	public function addcommentroot()
	{
		
		$post_id = $this->input->post("postId");
		$userIds = $this->input->post("userIds");
		$rootid = $this->input->post("rootid");
		$post_comment = $this->input->post("post_comment");
		$array = array(
			"comment" => $post_comment,
			"root_id" => $rootid,
			"detail_id" => $post_id,
			"user_id" => $userIds,
			"create_date" => date("Y-m-d,H:i:s")
			);
		$insertid = $this->Common_model->addRecords("comment_root",$array);
		
		$data['getallcomment'] = $this->Common_model->commentpaginationroot(array("detail_id" => $post_id),3,0,"comment_root_id", "desc");
		$data['totalcommentcount'] = $this->Common_model->countwhereuser("comment_root",array("detail_id" => $post_id));
		$data['post_id'] = $this->input->post("postId");
		
		$list = $this->load->view('home/ajax_root_comment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$post_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list,'totalcommentcount' => $data['totalcommentcount']);
		echo json_encode($return);
       
	}
	
		public function get_root_comments()
	{
		$offset = $this->input->post('offset');
		
		$postid = $this->input->post('postid');
		$off = $offset + 1;
		$limit = 3;
		$offset = $offset * $limit;
		
		
		
		$data['getallcomment'] = $this->Common_model->commentpaginationroot(array("detail_id" => $postid),$limit,$offset,"comment_root_id", "desc");
		
		$list = $this->load->view('home/ajax_newrootcomment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$postid,'offset'=>$off), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
	public function delete_root_comment()
	{
		$comment_id = $this->input->post("comment_id");
		$postid = $this->input->post("postid");
		
		$this->Common_model->deleteRecords("comment_root",array("comment_root_id" => $comment_id));
	}
	 
	/* ---------------------------------------------------------------------------------- */
	
		public function add_root_reply_comment()
	{
		$where = array();
		
		$post_id = $this->input->post('post_id');
		$comment_id = $this->input->post('comment_id');
		$comment_user_id = $this->input->post('comment_user_id');
		$user_id = $this->input->post('user_id');
		$reply_val = $this->input->post('reply_val');
        $array = array();
		$array = array(
		  'post_id' => $post_id,
		  'comment_root_id' => $comment_id,
		  'comment_root_user_id' => $comment_user_id,
		  'reply_comment' => $reply_val,
		  'user_id' => $user_id,
		  'create_date' => date("Y-m-d,H:i:s")
		);
		$update = $this->Common_model->addRecords('replycomment_root',$array);
		
		$data['getallcomment'] = $this->Common_model->getAllwhereorder("replycomment_root",array("comment_root_id" =>$comment_id),"replyroot_id","asc");
		
		
		$list = $this->load->view('home/ajax_replyrootcomment', array('getallcomment'=>$data['getallcomment'],'comment_id'=>$comment_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
		
	}
	
	
	public function change_rootcomment()
	{ 
		$where = array();
		
		$value = $this->input->post('value');
		$comment_id = $this->input->post('comment_id');
		
		$userid = $this->session->userdata('userId')['user_id'];
        $array = array();
		$array = array(
		  'comment' => $value
		);
		$update = $this->Common_model->updateRecords('comment_root',$array,array('user_id' => $userid,'comment_root_id' =>$comment_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}
	
	public function delete_replycomment()
	{
		$comment_id = $this->input->post("comment_id");
		$replycommentid = $this->input->post("replycommentid");
		$postid = $this->input->post("postid");
		
		
		$this->Common_model->deleteRecords("replycomment_root",array("replyroot_id" => $replycommentid));
		//$this->Common_model->deleteRecords("reply_comment",array("reply_id" => $replycommentid));
	}
	
	public function replycomment_like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('postid');		
		$comment_id = $this->input->post('commentid');
		$replycomment_id = $this->input->post('replycommentid');
		
		  
		
		$liked = $this->Common_model->getsingle('replycomment_root_like',array('replycomment_root_id'=>$replycomment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('replycomment_root_like',array("replycomment_root_id" => $liked->replycomment_root_id));
			 $count_like_one = $this->Common_model->jointwotable('replycomment_root_like', 'user_id', 'users', 'user_id',array('replycomment_root_id' => $replycomment_id,'replycomment_root_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_root_like.replycomment_root_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','replycommentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'replycomment_root_id' => $replycomment_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_root_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('replycomment_root_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('replycomment_root_like', 'user_id', 'users', 'user_id',array('replycomment_root_id' => $replycomment_id,'replycomment_root_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_root_like.replycomment_root_like_id');
		   $response = array("success" => true, 'message'=>'Successfully add','replycommentlike'=>count($count_like_one));

		}
		
		}
		echo json_encode($response);
		
		
	}
	
	public function comment_like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('postid');		
		$comment_id = $this->input->post('commentid');
		$author = $this->input->post('userid');
		
		  
		
		$liked = $this->Common_model->getsingle('comment_root_like',array('comment_root_id'=>$comment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('comment_root_like',array("comment_root_like_id" => $liked->comment_root_like_id));
			 $count_like_one = $this->Common_model->jointwotable('comment_root_like', 'user_id', 'users', 'user_id',array('comment_root_id' => $comment_id,'comment_root_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_root_like.comment_root_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','commentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_root_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('comment_root_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('comment_root_like', 'user_id', 'users', 'user_id',array('comment_root_id' => $comment_id,'comment_root_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_root_like.comment_root_like_id');
		   $response = array("success" => true, 'message'=>'Successfully add','commentlike'=>count($count_like_one));

		}
		
		}
		echo json_encode($response);
		
		
	}
	
	public function change_replycomment()
	{ 
		$where = array();
		
		$value = $this->input->post('value');
		$reply_id = $this->input->post('reply_id');
		
		$userid = $this->session->userdata('userId')['user_id'];
        
		$array = array(
		  'reply_comment' => $value
		);
		$update = $this->Common_model->updateRecords('replycomment_root',$array,array('user_id' => $userid,'replyroot_id' =>$reply_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}
}
