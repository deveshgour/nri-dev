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
			
			
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
			
			
		 $this->load->view('layouts/home_layout',$data);
		 $this->load->view('home/home',$data);  
		 $this->load->view('layouts/footer_layout',$data);
	} 
	
	public function postUpload()
	{
	    //print_r($_FILES['uploadImage']);die;
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
			$data['max_size'] = '338186'; 
            $data['max_width']  = '1024';
            $data['max_height']  = '768';
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
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		if($_POST['submit']){
			$firstname = $this->input->post("firstname");
			$lastname = $this->input->post("lastname");
			$country_code = $this->input->post("country_code");
			$contact_number = $this->input->post("contact_number");
			$email = $this->input->post("email");
			$dob = $this->input->post("dob");
			$gender = $this->input->post('gender');
			$permanent_address = $this->input->post('permanent_address');
			$permanent_country = $this->input->post('permanent_country');
			$local_address = $this->input->post('local_address');
			$local_country = $this->input->post('local_country');
			
			//echo $_FILES['uploadImage']['name'];die;
		if(!empty($_FILES["uploadImage"]["name"])){ 	
		$data['upload_path'] = 'upload/';
		$data['allowed_types'] = 'gif|jpg|png|jpeg';	
		//$data['max_size'] = '10000';
        //$data['max_width']  = '1024';
        //$data['max_height']  = '768';
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
			   "permanent_address" => $permanent_address,
			   "permanent_country" => $permanent_country,
			   "local_address" => $local_address,
			   "local_country" => $local_country,
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
			   "permanent_address" => $permanent_address,
			   "permanent_country" => $permanent_country,
			   "local_address" => $local_address,
			   "local_country" => $local_country,
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
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		
		 $this->load->view('layouts/profile_layout',$data);
		 $this->load->view('home/root_detail_list',$data);  
		 $this->load->view('layouts/footer_layout',$data);
	}
	
	public function root_detail()
	{
		$data = array();
		$root_id = $this->uri->segment("2");
		$detail_id = $this->uri->segment("3");
		
			/*---------------------------mood-------------------------------*/
		 $this->load->helper('smiley');
             $this->load->library('table');
            $image = base_url().'smiley/';
                $image_array = get_clickable_smileys($image, 'comments');
                $col_array = $this->table->make_columns($image_array, 8);

                $data['smiley_table'] = $this->table->generate($col_array);
		/*--------------------------------------------------------------*/
		$data["detail"] = $this->Common_model->getsingle("root_detail",array("detail_id" => $detail_id));
		$data['connect_to_root'] = $this->Common_model->getAllwhereorder("connect_to_root",array("status" => 1),"root_id","asc");
		$this->load->view('layouts/profile_layout',$data);
		$this->load->view('home/root_detail',$data);  
		$this->load->view('layouts/footer_layout',$data);
	}
	
	public function change_post()
	{ 
		$where = array();
		
		$value = $this->input->post('value');
		$post_id = $this->input->post('post_id');
		
		$userid = $this->session->userdata('userId')['user_id'];
        $array = array();
		$array = array(
		  'post' => $value
		);
		$update = $this->Common_model->updateRecords('post',$array,array('user_id' => $userid,'post_id' =>$post_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}
	
	public function add_reply_comment()
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
		  'comment_id' => $comment_id,
		  'comment_user_id' => $comment_user_id,
		  'reply_comment' => $reply_val,
		  'user_id' => $user_id,
		  'create_date' => date("Y-m-d,H:i:s")
		);
		$update = $this->Common_model->addRecords('reply_comment',$array);
		
		$data['getallcomment'] = $this->Common_model->getAllwhereorder("reply_comment",array("comment_id" =>$comment_id),"reply_id","asc");
		
		
		$list = $this->load->view('home/ajax_replycomment', array('getallcomment'=>$data['getallcomment'],'comment_id'=>$comment_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
		
	}
	
	public function create_group()
	{
		if(!empty($_POST['group_title']) && !empty($_POST['groupmem'])){
			$group_mem = implode(', ',$_POST['groupmem']);
			
		
		$data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';			
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if ( ! $this->upload->do_upload('image'))
        {
			$array = array(
			    "title" => $_POST['group_title'],
				"user_id" => $this->session->userdata('userId')['user_id'],
				"group_members" => $group_mem,
				"create_date" => date("Y-m-d H:i:s")
			);
			$insertid = $this->Common_model->addRecords("create_group",$array);
			$count_member = count($_POST['groupmem']);
			
			for($i=0; $i<$count_member; $i++)
				{ 
			$second_array = array(
			         "user_id" => $this->session->userdata('userId')['user_id'],
					 "group_id" => $insertid,
					 "members" => $_POST['groupmem'][$i]
			);
			$this->Common_model->addRecords("group_members",$second_array);
				}
				$this->session->set_flashdata('message', 'Group created successfully');
				//redirect("event");
				redirect($_SERVER['HTTP_REFERER']);
           $return = array('message' => $this->upload->display_errors());
            
			 
			 
			
            
        }
        else
        {if($this->upload->do_upload('image'))
			{ 
		       
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			$array = array(
			    "title" => $_POST['group_title'],
				"user_id" => $this->session->userdata('userId')['user_id'],
				"group_members" => $group_mem,
				"image" => $uploadfile,
				"create_date" => date("Y-m-d H:i:s")
			);
			$insertid = $this->Common_model->addRecords("create_group",$array);
			$count_member = count($_POST['groupmem']);
			
			for($i=0; $i<$count_member; $i++)
				{ 
			$second_array = array(
			         "user_id" => $this->session->userdata('userId')['user_id'],
					 "group_id" => $insertid,
					 "members" => $_POST['groupmem'][$i]
			);
			$this->Common_model->addRecords("group_members",$second_array);
			 $this->session->set_flashdata('message', 'Group created successfully');
			
			 
			 
				}
				$this->session->set_flashdata('message', 'Group created successfully');
				//redirect("event");
				redirect($_SERVER['HTTP_REFERER']);
		}
		}
		}else{
			 $this->session->set_flashdata('message', 'Error');
			 
			// redirect("event");
			redirect($_SERVER['HTTP_REFERER']);
			
		}
		
	}
	
	public function search_group()
	{
		$search_value = $this->input->post("search_value");
		$user_id = $this->input->post("user_id");
		if(!empty($search_value)){
		$data['searchData'] = $this->Common_model->searchgrouplikenew($search_value,array("user_id" => $user_id));
		}else{
		$data['searchData'] = $this->Common_model->getAllwhereorder("create_group",array("user_id" => $this->session->userdata("userId")["user_id"]),"group_id","desc");

		}
		$this->load->view('home/searchgroup_ajax',$data);
	}
	
	public function addsmiley() 
	{
		$userid = $this->session->userdata('userId')['user_id'];
		$smily_name = $this->input->post('smiley_id');
		$image_name = $this->input->post('image_name');
		$image_path = base_url().'smiley/'.$image_name;
		$getemoji = $this->Common_model->getsingle("smiley_table",array("user_id" => $this->session->userdata("userId")['user_id'])); 
		//echo '<pre>';print_r($getemoji);die;
		if(!empty($getemoji)){
			$array = array(
		    "comments" => $smily_name,
			"image" => $image_path,
			"user_id" => $userid
		);
		$this->Common_model->updateRecords("smiley_table",$array,array("user_id" => $userid));
		}else{
		$array = array(
		    "comments" => $smily_name,
			"image" => $image_path,
			"user_id" => $userid
		);
		$this->Common_model->addRecords("smiley_table",$array);
		}
	}
	
	public function ask_me(){
		$data = array();
		$your_name=$this->input->post("your_name");
		$email = $this->input->post("email_id");
		//$email = "swati.it03@gmail.com";
		$mobile_number = $this->input->post("mobile_number");
		
		$array = array("your_name" => $your_name,"email_id" => $email,"mobile_number"=>$mobile_number,"create_date" => date("Y-m-d H:i:s"));
		$this->Common_model->addRecords("ask_me",$array);
		$subject = "Ask me";
		$msg = "Hello Admin,<br/>";
		$msg .= "<b>Name: </b>".$your_name.'<br/>';
		$msg .= "<b>Email: </b>".$email.'<br/>';
		$msg .= "<b>Mobile Number: </b>".$mobile_number.'<br/>';
		$msg .= "Please Contact this user";
		send_mail($email, $subject, $msg);
	}
	
	public function comment_like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('postid');		
		$comment_id = $this->input->post('commentid');
		$author = $this->input->post('userid');
		
		  
		
		$liked = $this->Common_model->getsingle('comment_like',array('comment_id'=>$comment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('comment_like',array("comment_like_id" => $liked->comment_like_id));
			 $count_like_one = $this->Common_model->jointwotable('comment_like', 'user_id', 'users', 'user_id',array('comment_id' => $comment_id,'comment_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_like.comment_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','commentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('comment_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('comment_like', 'user_id', 'users', 'user_id',array('comment_id' => $comment_id,'comment_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_like.comment_like_id');
		   $response = array("success" => true, 'message'=>'Successfully add','commentlike'=>count($count_like_one));

		}
		
		}
		echo json_encode($response);
		
		
	}
	
	public function replycomment_like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('postid');		
		$comment_id = $this->input->post('commentid');
		$replycomment_id = $this->input->post('replycommentid');
		
		  
		
		$liked = $this->Common_model->getsingle('replycomment_like',array('replycomment_id'=>$replycomment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('replycomment_like',array("replycomment_like_id" => $liked->replycomment_like_id));
			 $count_like_one = $this->Common_model->jointwotable('replycomment_like', 'user_id', 'users', 'user_id',array('replycomment_id' => $replycomment_id,'replycomment_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_like.replycomment_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','replycommentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'replycomment_id' => $replycomment_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('replycomment_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('replycomment_like', 'user_id', 'users', 'user_id',array('replycomment_id' => $replycomment_id,'replycomment_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_like.replycomment_like_id');
		   $response = array("success" => true, 'message'=>'Successfully add','replycommentlike'=>count($count_like_one));

		}
		
		}
		echo json_encode($response);
		
		
	}
	
	public function change_comment()
	{ 
		$where = array();
		
		$value = $this->input->post('value');
		$comment_id = $this->input->post('comment_id');
		
		$userid = $this->session->userdata('userId')['user_id'];
        
		$array = array(
		  'comment' => $value
		);
		$update = $this->Common_model->updateRecords('comment',$array,array('user_id' => $userid,'comment_id' =>$comment_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

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
		$update = $this->Common_model->updateRecords('reply_comment',$array,array('user_id' => $userid,'reply_id' =>$reply_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}
	
	public function delete_replycomment()
	{
		$comment_id = $this->input->post("comment_id");
		$replycommentid = $this->input->post("replycommentid");
		$postid = $this->input->post("postid");
		
		
		$this->Common_model->deleteRecords("reply_comment",array("reply_id" => $replycommentid));
		//$this->Common_model->deleteRecords("reply_comment",array("reply_id" => $replycommentid));
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
