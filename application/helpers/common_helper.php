<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/********************** Cheack Required Field***********/

function not_login()
{
    $CI =& get_instance();

    $checkLogin = $CI->session->userdata('userId');
	//print_r($checkLogin);die;
    $is_logged_in = $checkLogin['user_id'];

    if (!isset($is_logged_in)){

        redirect(base_url());

    }
}

function is_login()
{

    $CI =& get_instance();

    $is_logged_in = $CI->session->userdata('userId');

    if (isset($is_logged_in)){
          //  echo 'test';echo $_SERVER['REQUEST_URI'];die;
        redirect(base_url().'home');

    }
}

     function sendmail($to,$subject,$message,$from,$name=null)
 {
	// $from="customercare@wheelsonair.com";
			$to=$to;
			$email=$from;
			$subject = $subject; 
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$name.'  <'.$email.'>' . "\r\n";
			return $send = mail($to, $subject, $message,$headers); 
			
	 
 }
 function convert_time($date1,$formate)
	{
		$CI =& get_instance();
        $user_tz = $CI->session->userdata('timezone');
		
		if($user_tz ==''){
			$user_tz = date_default_timezone_get();
		}
		if($formate == ''){
		    $formate=='Y-m-d H:i:s';
		}
		
		$date = new DateTime($date1, new DateTimeZone(date_default_timezone_get()));
		
		$date->setTimezone(new DateTimeZone($user_tz));
		return $date->format($formate);
		
	}
	
	function admin_not_login()
{
    $CI =& get_instance();

    $checkLogin = $CI->session->userdata('adminId');
	//print_r($checkLogin);die;
    $is_logged_in = $checkLogin['admin_id'];

    if (!isset($is_logged_in)){

        redirect(base_url().'admin/login');

    }
}

function admin_is_login()
{

    $CI =& get_instance();

    $is_logged_in = $CI->session->userdata('adminId');

    if (isset($is_logged_in)){
          //  echo 'test';echo $_SERVER['REQUEST_URI'];die;
        redirect(base_url().'admin/dashboard');

    }
}

function time_diff_string($from, $to, $full = false) {
	$CI =& get_instance();
    $from = new DateTime($from);
    $to = new DateTime($to);
    $diff = $to->diff($from);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function send_mail($email, $subject, $msg){  
     

$CI =& get_instance();
       $CI->load->library('email');
       $CI->email->initialize(array('mailtype'=>'html'));
       $CI->email->from("swatu03@gmail.com", "NRI");        
       $CI->email->to($email);
       $CI->email->subject($subject);      
       $CI->email->message($msg);
       
       $return = $CI->email->send();
       if($return){
           return true;
       }else{
          return false;
       }
       }