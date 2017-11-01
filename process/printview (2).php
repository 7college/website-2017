<?php
    session_start();
	include('../admin/login/config/config.php');
	extract($_POST);
	if($action=='saveallstudentdata'){
		$sql_res=mysql_query("select max(id) as sid from combile_data");
		$rows=mysql_fetch_assoc($sql_res);
		$apsID=$rows['sid']+1;
		$appsid=date('y').str_pad($apsID,6,"0",STR_PAD_LEFT); 
		
		
	   $insert=mysql_query("INSERT INTO combile_data (name,fname,mname,gender,dob,sscroll,sscreg,sscpass,sscgpa,sscltr,sscboard,hscroll,hscreg,hscpass,hscgpa,hscltr,hscboard,instituteid,timedate,servername,sscgrp,hscgrp,application_id) VALUES ('$name','$fname','$mname','$gender','$dob','$sscroll','$sscreg','$sscpass','$sscgpa','$sscltr','$sscboard','$hscroll','$hscreg','$hscpass','$hscgpa','$hscltr','$hscboard','$insid','$timedate','$servername','$sscgrp','$hscgrp','$appsid');");
	   $_SESSION['insertid']=mysql_insert_id();
	   if($insert==1){ echo '1'; die; }

	}
	if($action=='update_image_quata'){
	   $update=mysql_query("UPDATE combile_data SET picture='$picture_name',quata='$quta',mobile='$mobile',district='$district' WHERE id='$hid'");
	   if($update==1){ echo '1'; die; }

	}
?>