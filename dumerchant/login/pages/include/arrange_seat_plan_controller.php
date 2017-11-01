<?php
 session_start();
 require_once('../../config/config.php');
 extract($_REQUEST);
if($action=='save_update_delete')
{
	
     //$centerUpdate=mysql_query("UPDATE fbs_manage_center SET assign_status='1' WHERE id='$center_name'");
     $INSERT=mysql_query("INSERT INTO  fbs_seat_plan(center_name,roll_from,roll_to)VALUES('$center_name','$roll_from','$roll_to')");
	 for($i=$roll_from; $i<=$roll_to; $i++){
		  //echo "UPDATE student_info_fbs SET hallName='$center_name' WHERE application_id='".${$i}."'";
		 $update=mysql_query("UPDATE student_info_fbs SET room_no='$center_name' WHERE application_id='$i'");
	  }

	if($INSERT==1 && $update==1){
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }

?>