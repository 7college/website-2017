<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='save_update_delete')
 {
	 $SqlInsert="INSERT INTO fbs_room_setup (baban_name,room_no,capasity)VALUES ('$baban_name','$room_no','$capasity')";
	$SQL=mysql_query($SqlInsert);
	
	if($SQL){
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }

?>