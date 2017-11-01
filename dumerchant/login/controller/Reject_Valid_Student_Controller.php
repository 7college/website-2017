<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='save_update_delete')
 {
	 $SqlInsert="UPDATE student_info_fbs SET payment_status='0' WHERE id='$id'";
	 $SQL=mysql_query($SqlInsert);
	
	if($SQL==1){
		   echo $id;
		} 
		else{
		   echo "0";
		}
 }

?>