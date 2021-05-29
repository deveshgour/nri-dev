<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model

{
	function checkRow($params = array()){
		$this->db->select('*');
		$this->db->from('users');

		if(array_key_exists("email",$params)) {
			$this->db->where("(email = '".$params['email']."')");
		}
		
		if(array_key_exists("password",$params)) {
			$this->db->where('password',$params['password']);
		}
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function activate($data, $id){
		$this->db->where('users.user_id', $id);
		return $this->db->update('users', $data);
	}

	function getAllRecords($table)
	{

		$query = $this->db->get($table);
		return $query->result_array();
	}


	function getSingleRecordById($table,$conditions)

	{

		$query = $this->db->get_where($table,$conditions);
		return $query->row_array();
	   //$this->db->last_query();
	   //die();

	}


public function getsingle($table,$where)
	{
		$q = $this->db->get_where($table,$where);
		return $q->row();
	}

	public function getAll($table,$order_id,$order_by)
	{
		$this->db->select('*');
		$this->db->order_by( $order_id, $order_by);
		$q = $this->db->get($table);

		$num_rows = $q->num_rows();
		if($num_rows >0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			$q->free_result();
			return $data;
		}
	}





	function getAllRecordsById($table,$conditions)
	{

		$query = $this->db->get_where($table,$conditions);

		return $query->result_array();
	}


	function addRecords($table,$post_data)
	{
		$this->db->insert($table,$post_data);

		return $this->db->insert_id();

	}


	function updateRecords($table, $post_data, $where_condition)
	{
		$this->db->where($where_condition);
		$query = $this->db->update($table, $post_data);
		return $query;
	}

	function deleteRecords($table,$where_condition)
	{

		$this->db->where($where_condition);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}

	}
	
	function getAllJoin($num, $offset, $where, $type = 1, $table, $field1, $table1, $field2,$sort_by, $sort_order, $sort_columns, $field,$search = '')
    {
      
        if ($where && ($type == 1))
        {           
            $this->db->select($field);
            $this->db->join("$table1", "$table1.$field2 = $table.$field1");
           
            $q = $this->db->order_by($sort_by, $sort_order);
            $q = $this->db->get_where($table, $where, $num, $offset);
        } else
        {  
            $i = 1;
            // check condition
            if ($type == 'ser' && $where != '')
            {
              
                $this->db->select($field);
                $this->db->join("$table1", "$table1.$field2 = $table.$field1");
                
                foreach ($where as $key => $value)
                {
                    if ($key == '' && $value != '')
                    {
                        $this->db->like("$key", "$value", 'after');
                    } 
                    $i++;
                }
               
                $q = $this->db->order_by($sort_by, $sort_order);
                $q = $this->db->get($table, $num, $offset);
            } else
            {  
                $this->db->select($field);
                $this->db->join("$table1", "$table1.$field2 = $table.$field1");
                $q = $this->db->order_by($sort_by, $sort_order);
				if($search != ''){
				//$this->db->like('post.hashtag',$search,'after');
				$this->db->where(array('post.post_author !='=>12));
				$this->db->where("FIND_IN_SET('$search',post.hashtag) !=", 0);
				}
                $q = $this->db->get($table, $num, $offset);
            }
        }
        $num_rows = $q->num_rows();
        if ($num_rows > 0)
        {
            foreach ($q->result() as $rows)
            {
                $data[] = $rows;
            }
            $q->free_result();
            $ret['rows'] = $data;
        }

        // count Values
        if ($where && ($type == 1))
        {
            $this->db->select($field);
            $this->db->join("$table1", "$table1.$field2 = $table.$field1");
            $q = $this->db->get_where($table, $where);
        } else
        {
            $i = 1;
            // check condition
            if ($type == 'ser' && $where != '')
            {
                $this->db->select($field);
                $this->db->join("$table1", "$table1.$field2 = $table.$field1");
                               
                foreach ($where as $key => $value)
                {
                   if ($key == '' && $value != '')
                    {
                        $this->db->like("$key", "$value", 'after');
                    } 
                    
                    $i++;
                }
                $q = $this->db->get($table);
            } else
            {
                $this->db->select($field);
                $this->db->join("$table1", "$table1.$field2 = $table.$field1");
                if($search != ''){
				//$this->db->like('post.hashtag',$search, 'after');
				$this->db->where(array('post.post_author !='=>12));
				$this->db->where("FIND_IN_SET('$search',post.hashtag) !=", 0); 
				}				
                $q = $this->db->get($table);
            }
        }
        $ret['num_rows'] = $q->num_rows();
        return $ret;
    }
    
    function jointwotable($table, $field_first, $table1, $field_second,$where='',$field) {

        $this->db->select($field);
        $this->db->from("$table");
        $this->db->join("$table1", "$table1.$field_second = $table.$field_first"); 
        if($where !=''){
        $this->db->where($where); 
        }
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            foreach($q->result() as $rows) {
                $data[] = $rows;
            }
            $q->free_result();
            return $data;
        }
    }
	
	function joint($postid){
	$sql = "SELECT `users`.`user_id`, `users`.`firstname`, `users`.`lastname`, `like`.`like_id` FROM `like` JOIN `users` ON `users`.`user_id` = `like`.`user_id` WHERE `post_id` = '".$postid."' ORDER BY like.post_id DESC LIMIT 1";
	$q = $this->db->query($sql);
        
		  $data =  array() ;
		  
		  
		 foreach($q->result_array() as $row)
			{
				 $data[]  = $row;
			}
			
			return $data; 
	}
	function jointwotablesingle($table, $field_first, $table1, $field_second,$where='',$field) {

        $this->db->select($field);
        $this->db->from("$table");
        $this->db->join("$table1", "$table1.$field_second = $table.$field_first","left"); 
        if($where !=''){
        $this->db->where($where); 
        }
        $q = $this->db->get();
        if($q->num_rows() > 0) {
          return $q->row();
             
        }else{
			return false;
		}
    }
	
	function commentpagination($where,$num,$offset,$sort_by, $sort_order)
    {   
		
		$this->db->select('*');
		$this->db->where($where);
		
		$this->db->order_by($sort_by, $sort_order);
		$q = $this->db->get('comment', $num, $offset);
   
        $num_rows = $q->num_rows();
        if ($num_rows > 0)
        {
            foreach ($q->result() as $rows)
            {
                $data[] = $rows;
            }
            $q->free_result();
            $ret['rows'] = $data;
        }

        $this->db->select('*');
		
		$this->db->where($where);
		
		$this->db->order_by($sort_by, $sort_order);	
		$q = $this->db->get('comment');
        $ret['num_rows'] = $q->num_rows();
        return $ret;
	}
	
	public function countwhereuser($table,$where)
	{
	   $this->db->select('*');
	   $q = $this->db->get_where($table,$where);
	  return $q->num_rows();
	   
	}
	
	public function getAllwhereorder($table,$where,$order_id,$order_by)
	{
		$this->db->select('*');
		$this->db->order_by($order_id, $order_by);	
		$q = $this->db->get_where($table,$where);
		$num_rows = $q->num_rows();
		if($num_rows >0)
		{
			foreach($q->result() as $row)
			{
				$data[] = $row;
			}
			$q->free_result();
			return $data;
		}
	}
	
	function checkadminRow($params = array()){
		$this->db->select('*');
		$this->db->from('admin');

		if(array_key_exists("email",$params)) {
			$this->db->where("(email = '".$params['email']."')");
		}
		
		if(array_key_exists("password",$params)) {
			$this->db->where('password',$params['password']);
		}
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
	public function searchuserslikenew($like,$where)
	{ 
		$this->db->select('*');
		$this->db->from('users');
		$this->db->like("CONCAT(firstname)",$like);
		$this->db->where($where);
		return $this->db->get()->result();
	}
}
