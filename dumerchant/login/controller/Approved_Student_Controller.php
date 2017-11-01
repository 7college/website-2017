<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='save_update_appId')
 {
	 //$datetime=date("Y-m-d h:i:sa");
	 $SqlStudent=mysql_query("UPDATE student_info_fbs SET payment_status='0' WHERE id='$appId'");
	 if($SqlStudent==1){
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }
 if($action=='save_update_reject')
 {
	 //$datetime=date("Y-m-d h:i:sa");
	 $SqlStudent=mysql_query("UPDATE student_info_fbs SET payment_status='1' WHERE id='$appId'");
	 if($SqlStudent==1){
		   echo "3";
		} 
		else{
		   echo "0";
		}
 }

?>