<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='save_update_delete')
 {
	
	//echo "UPDATE fbs_default_setup SET baban_name='$baban_name',floor_no='$floor_name',room_no='$room_no',capasity='$capasity' WHERE id='1'"; die;
	
	
	 $SqlInsert="UPDATE fbs_default_setup SET baban_name='$baban_name',floor_no='$floor_name',room_no='$room_no',capasity='$capasity' WHERE id='1'";
	$SQL=mysql_query($SqlInsert);
	
	if($SQL){
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }

?>