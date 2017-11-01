<?php
    session_start();
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="admission";
	$conn=mysql_connect($hostname,$username,$password);
	mysql_select_db($dbname);
	
	extract($_POST);
	if($action=='save_update_delete'){
		//echo "UPDATE add_student_info SET picture='$picture_name',quta='$quta',pic_update_status='1' WHERE id='$studentID'"; die;
		$SQL_Query= mysql_query("UPDATE add_student_info SET picture='$picture_name',quta='$quta',pic_update_status='1' WHERE id='$studentID'");
		if($SQL_Query==1){
			   echo "1"; die;
			}
		else{
			  echo "2"; die;
			}
	}
?>