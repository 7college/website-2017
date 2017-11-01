<?php
    session_start();
	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='save_unit_data'){
		$sqlcheckrow=mysql_query("SELECT * FROM  fbs_unit_data WHERE appsid='".db_escape($appsid)."'  AND unitid='".db_escape($uid)."'");
		$count=mysql_num_rows($sqlcheckrow);
		if($count==1){
			 echo '104'; die;
		}
        else{		
			$insert=mysql_query("INSERT INTO fbs_unit_data(appsid,payid,unitid) VALUES ('$appsid','$pid','$uid');");
			if($insert==1){ 
			   echo '104'; die; 
			}
			else{
				echo "404"; die;
			}
		}
	}
	if($action=='save_degree_data'){
		
		$insert=mysql_query("UPDATE fbs_applicant_data SET degree_status='1' WHERE application_id='$appsid'");
		
		if($insert==1){ 
		   echo '105'; die; 
		}
        else{
			echo "404"; die;
		}
	}
	
	
	
?>