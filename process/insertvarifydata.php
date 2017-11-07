<?php
    session_start();
	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='saveallvarifieddata'){
		$sqlcheckrow=mysql_query("SELECT * FROM  fbs_applicant_data WHERE hscroll='".db_escape($hscroll)."' AND hscpass='2017' AND hscboard='".db_escape($hscboard)."'");
		$count=mysql_num_rows($sqlcheckrow);
		if($count==1){
			echo '402'; die; 
		}	
		else{	
			
		$sql_res=mysql_query("select max(id) as sid from fbs_applicant_data");
		$rows=mysql_fetch_assoc($sql_res);
		$apsID=$rows['sid']+1;
		$appsid=date('Y').str_pad($apsID,6,"0",STR_PAD_LEFT); 
		$appsdate=date('Y-m-d');
		$insert=mysql_query("INSERT INTO fbs_applicant_data(name,fname,mname,gender,dob,sscroll,sscreg,sscpass,sscgpa,sscboard,sscgrp,hscroll,hscreg,hscpass,hscgpa,hscboard,hscgrp,tgpa,timedate,servername,application_id,applicationdate,picture,quata,mobile) VALUES ('$name','$fname','$mname','$gender','$dob','$sscroll','$sscreg','$sscpass','$sscgpa','$sscboard','$sscgrp','$hscroll','$hscreg','$hscpass','$hscgpa','$hscboard','$hscgrp','$tgpa','$timedate','$servername','$appsid','$appsdate','$picture_name','$qauta','$mobile')");
		$_SESSION['applicationid']=$appsid;
		if($insert==1){ 
		   echo '102'; die; 
		}
        else{
			echo "402"; die;
		}
	  }
	}

?>