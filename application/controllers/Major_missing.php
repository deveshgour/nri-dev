<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Major_missing extends CI_Controller {
 function __construct() {
	 
        parent::__construct();
			
			not_login();
      }
	
	
	public function major()
	{ 
		$data = array();
		
		$data['page'] = 0;
			
		$pagecon['per_page'] = 3;
		$data['per_page'] = 3;
		
		$session_id = $this->session->userdata('userId')['user_id'];
		$data["foruserimage"] = $this->Common_model->getsingle("users",array("user_id" => $session_id));
		
		$var_search = 'major_missing.user_id ='.$session_id.' OR major_missing.status = 1';
		$var_type = 1;
		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'date_added';
		$field = "major_missing.major_id,major_missing.post,major_missing.media_path,major_missing.media_type,major_missing.status,major_missing.date_added,users.user_id,users.firstname,users.lastname,users.user_image,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($pagecon['per_page'], $data['page'], $var_search, $var_type, 'major_missing', "user_id", "users", "user_id",$sort_by, $sort_order, $sort_columns, $field,$search = ''); 
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
		 $this->load->view('home/major_missing',$data);  
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
		$insertid = $this->Common_model->addRecords("major_missing",$array);
		
		if(!empty($media_type[0])){
			
		   if($media_type[0] == 'image'){
		
			if(!empty($media_type[0])){
              $media_type_new = $media_type[0];
			}else{
              $media_type_new = $media_type_name;
			}				
			
		    $data['upload_path'] = 'upload/';
			$data['allowed_types'] = 'gif|jpg|png|jpeg';
			$data['max_size'] = '338186'; 
			
			//$data['max_size'] = "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)
			//$data['max_height'] = "768";
			//$data['max_width'] = "1024";
           
			$data['encrypt_name'] = true;
			
			$this->load->library('upload',$data);
			$uploadfile ='';
			
			if ( ! $this->upload->do_upload('uploadImage'))
        {
           $return = array('message' => $this->upload->display_errors());

            
        }
        else
        {if($this->upload->do_upload('uploadImage'))
			{ 
		       
			   $attachment_data = array('upload_data' => $this->upload->data());
			   $uploadfile = $attachment_data['upload_data']['file_name'];
			  
		
		$array = array(
		    "post" => $post_value,
			"user_id" => $this->session->userdata('userId')['user_id'],
			"media_type" => $media_type_new,
			"media_path" => $uploadfile
		);
		$this->Common_model->updateRecords("major_missing",$array,array("major_id" => $insertid));
			}

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
		$this->Common_model->updateRecords("major_missing",$array,array("major_id" => $insertid));
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
		$var_search = 'major_missing.user_id ='.$session_id.' OR major_missing.status = 1';

		
        
		$var_type = 1;

		$sort_columns = array();
		$sort_order = 'desc';
		$sort_by = 'major_missing.date_added';
		
        $field = "major_missing.major_id,major_missing.post,major_missing.media_path,major_missing.media_type,major_missing.status,major_missing.date_added,users.user_id,users.firstname,users.lastname,users.email,users.country_id";
		$result = $this->Common_model->getAllJoin($data['page'], $data['offset'], $var_search, $var_type, 'major_missing', 'user_id', 'users', 'user_id',$sort_by, $sort_order, $sort_columns, $fields);
		
		if(!empty($result['rows'])) {
			$data['post_data'] = $result['rows'];
			$data['count_total'] = $result['num_rows'];
		} else {
			$data['post_data'] = '';
			$data['count_total'] = '';
		}	

		$this->load->view('home/major_ajax_value',$data);
	} 
	
	public function like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('post');		
		$status = $this->input->post('status');
		$author = $this->input->post('author');
		
		  
		
		$liked = $this->Common_model->getsingle('like_major',array('major_id'=>$post_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if($liked){
			if($liked->status == $status){
			$response = array("status" => $status,"success" => false, 'message'=>'Successfully insert');
			}else{
			$this->Common_model->updateData('like_major',array('status'=>$status),array('like_major_id'=>$liked->like_major_id));
			$count_like_one = $this->Common_model->jointwotable('like_major', 'user_id', 'users', 'user_id',array('major_id' => $post_id,'like_major.status'=>1),'users.user_id,users.firstname,users.lastname,like_major.like_major_id');
		 
			$response = array("status" => $status, "success" => true, 'message'=>'Successfully insert','like'=>count($count_like_one));
			}
            $this->Common_model->deleteRecords('like_major',array("like_major_id" => $liked->like_id));
			$count_like_one = $this->Common_model->jointwotable('like_major', 'user_id', 'users', 'user_id',array('major_id' => $post_id,'like_major.status'=>1),'users.user_id,users.firstname,users.lastname,like_major.like_major_id');
			$response = array("status" => "0","success" => false, 'message'=>'Successfully delete','like'=>count($count_like_one));
		}else{
		if($status == 1){
			$array = array(
			'major_id' => $post_id,
			'user_id' => $user_id,
			//'create_at' => date('Y:m:d H:i:s'),
			'status' => $status
			);
			$insert_id = $this->Common_model->addRecords('like_major',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('like_major', 'user_id', 'users', 'user_id',array('major_id' => $post_id,'like_major.status'=>1),'users.user_id,users.firstname,users.lastname,like_major.like_major_id');
		 
			
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
			"major_id" => $post_id,
			"user_id" => $userIds,
			"create_date" => date("Y-m-d,H:i:s")
			);
		$insertid = $this->Common_model->addRecords("comment_major",$array);
		
		$data['getallcomment'] = $this->Common_model->commentpaginationmajor(array("major_id" => $post_id),3,0,"comment_major_id", "desc");
		$data['totalcommentcount'] = $this->Common_model->countwhereuser("comment_major",array("major_id" => $post_id));
		$data['post_id'] = $this->input->post("postId");
		
		$list = $this->load->view('home/ajax_major_comment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$post_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list,'totalcommentcount' => $data['totalcommentcount']);
		echo json_encode($return);
       
	}
	
	public function delete_comment()
	{
		$comment_id = $this->input->post("comment_id");
		$postid = $this->input->post("postid");
		
		$this->Common_model->deleteRecords("comment_major",array("comment_major_id" => $comment_id,"major_id" => $postid));
	}
	
	public function get_comments()
	{
		$offset = $this->input->post('offset');
		
		$postid = $this->input->post('postid');
		$off = $offset + 1;
		$limit = 3;
		$offset = $offset * $limit;
		
		
		
		$data['getallcomment'] = $this->Common_model->commentpaginationmajor(array("major_id" => $postid),$limit,$offset,"comment_major_id", "desc");
		
		$list = $this->load->view('home/ajax_newmajorcomment', array('getallcomment'=>$data['getallcomment'],'post_id'=>$postid,'offset'=>$off), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
	}
	
	public function comment_like()
	{
		$data['title'] = 'Like';	
		$user_id = $this->session->userdata('userId')['user_id'];
		$post_id = $this->input->post('postid');		
		$comment_id = $this->input->post('commentid');
		$author = $this->input->post('userid');
		
		  
		
		$liked = $this->Common_model->getsingle('comment_major_like',array('comment_id'=>$comment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('comment_major_like',array("comment_like_id" => $liked->comment_like_id));
			 $count_like_one = $this->Common_model->jointwotable('comment_major_like', 'user_id', 'users', 'user_id',array('comment_id' => $comment_id,'comment_major_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_major_like.comment_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','commentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('comment_major_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('comment_major_like', 'user_id', 'users', 'user_id',array('comment_id' => $comment_id,'comment_major_like.status'=>1),'users.user_id,users.firstname,users.lastname,comment_major_like.comment_like_id');
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
		
		  
		
		$liked = $this->Common_model->getsingle('replycomment_major_like',array('replycomment_id'=>$replycomment_id,'user_id'=>$this->session->userdata('userId')['user_id']));
		if(!empty($liked)){
			 $this->Common_model->deleteRecords('replycomment_major_like',array("replycomment_like_id" => $liked->replycomment_like_id));
			 $count_like_one = $this->Common_model->jointwotable('replycomment_major_like', 'user_id', 'users', 'user_id',array('replycomment_id' => $replycomment_id,'replycomment_major_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_major_like.replycomment_like_id');
			$response = array("success" => false, 'message'=>'Successfully delete','replycommentlike'=>count($count_like_one));

		}else{
			$array = array(
			'post_id' => $post_id,
			'replycomment_id' => $replycomment_id,
			'user_id' => $this->session->userdata('userId')['user_id'],
			'comment_id' => $comment_id,
			'status' => 1
			);
			$insert_id = $this->Common_model->addRecords('replycomment_major_like',$array);
			if($insert_id > 0){
			
			$count_like_one = $this->Common_model->jointwotable('replycomment_major_like', 'user_id', 'users', 'user_id',array('replycomment_id' => $replycomment_id,'replycomment_major_like.status'=>1),'users.user_id,users.firstname,users.lastname,replycomment_major_like.replycomment_like_id');
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
		$update = $this->Common_model->updateRecords('comment_major',$array,array('user_id' => $userid,'comment_major_id' =>$comment_id));
		
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
		$update = $this->Common_model->updateRecords('replycomment_major',$array,array('user_id' => $userid,'reply_id' =>$reply_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}
	
	public function delete_replycomment()
	{
		$comment_id = $this->input->post("comment_id");
		$replycommentid = $this->input->post("replycommentid");
		$postid = $this->input->post("postid");
		
		
		$this->Common_model->deleteRecords("replycomment_major",array("reply_id" => $replycommentid));
		//$this->Common_model->deleteRecords("reply_comment",array("reply_id" => $replycommentid));
	}
	
	public function post_delete()
	{
		$post_id = $this->input->post("post_id");
		
		//$this->Common_model->deleteRecords("comment",array("post_id" => $post_id));
		
        $this->Common_model->deleteRecords("like_major",array("major_id" => $post_id));
		$this->Common_model->deleteRecords("major_missing",array("major_id" => $post_id));
	    
        
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
		$update = $this->Common_model->addRecords('replycomment_major',$array);
		
		$data['getallcomment'] = $this->Common_model->getAllwhereorder("replycomment_major",array("comment_id" =>$comment_id),"reply_id","asc");
		
		
		$list = $this->load->view('home/ajax_replymajorcomment', array('getallcomment'=>$data['getallcomment'],'comment_id'=>$comment_id), true);
					
		$this->output->set_content_type('application/json');
		
		$return = array('success'=>true, 'list'=> $list);
		echo json_encode($return);
		
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
		$update = $this->Common_model->updateRecords('major_missing',$array,array('user_id' => $userid,'major_id' =>$post_id));
		
		$response = array("code" => 100, "success" => true, 'message'=>'Post Change Successfully');
		

		echo json_encode($response); 
	}

	
}
