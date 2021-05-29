<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userdashboard extends CI_Controller {
 function __construct() {
	 
        parent::__construct();
			
			not_login();
      }
	
	
	public function home()
	{ 
		$data = array();
		
		$data['page'] = 0;
			
		$pagecon['per_page'] = 3;
		$data['per_page'] = 3;
		
		$session_id = $this->session->userdata('userId')['user_id'];
		$data["foruserimage"] = $this->Common_model->getsingle("users",array("user_id" => $session_id));
		
		$var_search = 'post.user_id ='.$session_id.' OR post.status = 1';
		$var_type = 1;
		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'date_added';
		$field = "post.post_id,post.post,post.media_path,post.media_type,post.status,post.date_added,users.user_id,users.firstname,users.lastname,users.user_image,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($pagecon['per_page'], $data['page'], $var_search, $var_type, 'post', "user_id", "users", "user_id",$sort_by, $sort_order, $sort_columns, $field,$search = ''); 
		//print_r($this->db->last_query()); die;
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		
		 
		if(!empty($result['rows'])) {
				$data['post_data'] = $result['rows'];
				$data['count_total'] = $result['num_rows'];
			} else {
				$data['post_data'] = '';
				$data['count_total'] = '';
			}
		 $this->load->view('layouts/home_layout',$data);
		 $this->load->view('home/home',$data);  
		 $this->load->view('layouts/footer_layout',$data);
	} 
	
	public function postUpload()
	{
	    $media_name = $_FILES['uploadImage']['name'];		
		
		$post_value = $this->input->post("post_value");
		
		$media_type_name = $_FILES['uploadImage']['type'];
		
		$media_type = explode('/',$media_type_name);
		
		if(!empty($post_value) || !empty($media_name)){
		$array = array(
		    "post" => $post_value,
			"user_id" => $this->session->userdata('userId')['user_id'],
			"date_added" => date('Y-m-d H:i:s'),
			"status" => 0
		);
		$insertid = $this->Common_model->addRecords("post",$array);
		
		if(!empty($media_type[0])){
			
		   if($media_type[0] == 'image'){
		
			if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}				
			
		    $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png';
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('uploadImage'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		$array = array(
		    "post" => $post_value,
			"user_id" => $this->session->userdata('userId')['user_id'],
			"media_type" => $media_type_new,
			"media_path" => $uploadfile
		);
		$this->Common_model->updateRecords("post",$array,array("post_id" => $insertid));
			}

		
		}elseif($media_type[0] == 'video'){
			
			if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}				
			
		$data['upload_path'] = 'upload/';
		$data['allowed_types'] = '3gp|mp4|mpeg|mpg|ogg|avi|ogg';
		$data['max_size'] = '20480';
		$data['overwrite']     = false;
		$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('uploadImage'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		$array = array(
		    "post" => $post_value,
			"user_id" => $this->session->userdata('userId')['user_id'],
			"media_type" => $media_type_new,
			"media_path" => $uploadfile
		);
		$this->Common_model->updateRecords("post",$array,array("post_id" => $insertid));
		}
		}
		}
		$return = array('code'=>100,'success'=>true,'message'=>'Post Successfully');
		}else{
			$return = array('code'=>200,'success'=>false,'message'=>'Please write some Text or insert a Image or Video');
		}
		echo json_encode($return);
	}
	
		public function get_offset()
	{
		$data['offset'] = $this->input->post('offset');
        
		$data['page'] = 5;
		//$var_search = array();
		$session_id = $this->session->userdata('userId')['user_id'];
		$var_search = 'post.user_id ='.$session_id.' OR post.status = 1';

		
        
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
	
	public function my_profile()
	{
		//print_r($_POST);die;
		$data = array();
		$user_id = $this->session->userdata('userId')['user_id'];
		$data['myprofile'] = $this->Common_model->getsingle("users",array("user_id" => $user_id));
		$data['country_code'] = $this->Common_model->getAll("country","id","asc");
		
		if($_POST['submit']){
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$country_code = $this->input->post("country_code");
			$contact_number = $this->input->post("contact_number");
			$email = $this->input->post("email");
			$dob = $this->input->post("dob");
			$gender = $this->input->post('gender');
			
			//echo $_FILES['uploadImage']['name'];die;
		if(!empty($_FILES["uploadImage"]["name"])){ 	
		$data['upload_path'] = 'upload/';
		$data['allowed_types'] = 'gif|jpg|png';		
		$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if($this->upload->do_upload('uploadImage'))
			{ 
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			   
			   $array = array(
			   "firstname" => $firstname,
			   "lastname" => $lastname,
			   "email" => $email,
			   "dial_code" => $country_code,
			   "contact_number" => $contact_number,
			   "dob" => $dob,
			   "gender" => $gender,
			   "user_image" => $uploadfile
			   );
			   $this->Common_model->updateRecords("users",$array,array("user_id" => $user_id));
			}
		}else{
			 $array = array(
			   "firstname" => $firstname,
			   "lastname" => $lastname,
			   "email" => $email,
			   "dial_code" => $country_code,
			   "contact_number" => $contact_number,
			   "dob" => $dob,
			   "gender" => $gender,
			   "user_image" => $data['myprofile']->user_image
			   );
			   $this->Common_model->updateRecords("users",$array,array("user_id" => $user_id));
		}
		$this->session->set_flashdata('profile_update', 'Profile updated Successfully');
		redirect("myprofile");
			
		}
		
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/myprofile',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function settimezone()
	{
		$ip = $_SERVER['REMOTE_ADDR']; // the IP address to query
		$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
		if($query && $query['status'] == 'success') {
			$user_tz = $query['timezone'];
			$this->session->set_userdata('timezone',$user_tz);
		}else{
			$user_tz = date_default_timezone_get();
			$this->session->set_userdata('timezone',$user_tz);
		}
		$response = array("success" => true, 'message'=>'Timezone Session set succesfuly');
		echo json_encode($response);
	}
	
	public function like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('post');		
		$status = $this->input->post('status');
		$author = $this->input->post('author');
		
		  
		
		$liked = $this->Common_model->getsingle('like',array('post_id'=>$post_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if($liked){
			if($liked->status == $status){
			$response = array("status" => $status,"success" => false, 'message'=>'Successfully insert');
			}else{
			$this->Common_model->updateData('like',array('status'=>$status),array('like_id'=>$liked->like_id));
			$count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'user_id',array('post_id' => $post_id,'like.status'=>1),'users.user_id,users.firstname,users.lastname,like.like_id');
		 
			$response = array("status" => $status, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}
            $this->Common_model->deleteRecords('like',array("like_id" => $liked->like_id));
			$count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'user_id',array('post_id' => $post_id,'like.status'=>1),'users.user_id,users.firstname,users.lastname,like.like_id');
			$response = array("status" => "0","success" => false, 'message'=>'Successfully delete','like'=>count($count_like_one));
		}else{
		if($status == 1){
			$array = array(
			'post_id' => $post_id,
			'user_id' => $user_id,
			//'create_at' => date('Y:m:d H:i:s'),
			'status' => $status
			);
			$insert_id = $this->Common_model->addRecords('like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('like', 'user_id', 'users', 'user_id',array('post_id' => $post_id,'like.status'=>1),'users.user_id,users.firstname,users.lastname,like.like_id');
		 
			
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
	
	public function addcomment()
	{
		
		$post_id = $this->input->post("postId");
		$userIds = $this->input->post("userIds");
		$post_comment = $this->input->post("post_comment");
		$array = array(
			"comment" => $post_comment,
			"post_id" => $post_id,
			"user_id" => $userIds,
			"create_date" => date("Y-m-d,H:i:s")
			);
		$insertid = $this->Common_model->addRecords("comment",$array);
		
		$data['getallcomment'] = $this->Common_model->commentpagination(array("post_id" => $post_id),3,0,"comment_id", "desc");
		$data['totalcommentcount'] = $this->Common_model->countwhereuser("comment",array("post_id" => $post_id));
		$data['post_id'] = $this->input->post("postId");
		
		$list = $this->load->view('home/ajax_comment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$post_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list,'totalcommentcount' => $data['totalcommentcount']);
		echo json_encode($return);
       
	}
	
	public function delete_comment()
	{
		$comment_id = $this->input->post("comment_id");
		$postid = $this->input->post("postid");
		
		$this->Common_model->deleteRecords("comment",array("comment_id" => $comment_id,"post_id" => $postid));
	}
	
	public function get_comments()
	{
		$offset = $this->input->post('offset');
		
		$postid = $this->input->post('postid');
		$off = $offset + 1;
		$limit = 3;
		$offset = $offset * $limit;
		
		
		
		$data['getallcomment'] = $this->Common_model->commentpagination(array("post_id" => $postid),$limit,$offset,"comment_id", "desc");
		
		$list = $this->load->view('home/ajax_newcomment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$postid,'offset'=>$off), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
	public function post_delete()
	{
		$post_id = $this->input->post("post_id");
		
		$this->Common_model->deleteRecords("comment",array("post_id" => $post_id));
		
        $this->Common_model->deleteRecords("like",array("post_id" => $post_id));
		$this->Common_model->deleteRecords("post",array("post_id" => $post_id));
	}
	
	public function root_detail_list()
	{
		$data = array();
		
		$root_id = $this->uri->segment("2");
		$data["root_detail_list"] = $this->Common_model->getAllwhereorder("root_detail",array("root_id" => $root_id),"detail_id","desc");
		
		 $this->load->view('layouts/profile_layout',$data);
		 $this->load->view('home/root_detail_list',$data);  
		 $this->load->view('layouts/footer_layout',$data);
	}
	
	public function root_detail()
	{
		$data = array();
		$root_id = $this->uri->segment("2");
		$detail_id = $this->uri->segment("3");
		$data["detail"] = $this->Common_model->getsingle("root_detail",array("detail_id" => $detail_id));
		$data["root_id"] = $this->Common_model->getsingle("connect_to_root",array("root_id" => $root_id));
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/root_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}

	public function logout()
	{
		  $unset_data = array('email'=>'','user_id'=>'');
            $this->session->unset_userdata($unset_data); 
			$this->session->sess_destroy();
            $base_url = base_url();
            redirect($base_url,'refresh');
	}
}
