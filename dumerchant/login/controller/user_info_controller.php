<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='save_update_delete')
 {
	 $SqlInsert="INSERT INTO  fbs_user (full_name,email,phone,user_name,password,user_type,status) VALUES ('$user_full_name','$txt_email','$txt_phone','$user_id', '$student_password','$user_type','1')";

//echo $SqlInser; die;
	$SQL=mysql_query($SqlInsert);
	
	if($SQL){
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }

?>