<?php
    session_start();
	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='actionquaerypageslogin')
		{	
	
			$sqlcheckrow=mysql_query("SELECT * FROM  fbs_applicant_data WHERE application_id='".db_escape($appsid)."' AND mobile='".db_escape($mobile)."'");
			$chekrows=mysql_fetch_assoc($sqlcheckrow);

			$count=mysql_num_rows($sqlcheckrow);
			
			if($count>0)
				{
					
						$_SESSION['id']=$chekrows['id'];
						$_SESSION['applicationid']=$chekrows['application_id'];
						echo "110"; die;	
					
				}
			 else{
				 
				    echo "101"; die;
				 
			 }
		
		
	}

?>