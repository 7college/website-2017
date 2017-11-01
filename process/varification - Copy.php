<?php
    session_start();
	include('../admin/login/config/config.php');
	extract($_POST);
	if($action=='actionquaerypages')
		{	
			$sqlcheckrow=mysql_query("SELECT * FROM  fbs_applicant_data WHERE hscroll='$hsc_roll' AND hscpass='$hsc_pass_year' AND hscboard='$board' AND sscroll='$ssc_roll'");
			$chekrows=mysql_fetch_assoc($sqlcheckrow);

			$count=mysql_num_rows($sqlcheckrow);
			if($count==1)
				{
					
						$_SESSION['id']=$chekrows['id'];
						$_SESSION['applicationid']=$chekrows['application_id'];
						echo "110"; die;	
					
				}
		
		
		else{		
			$sql=mysql_query("SELECT * FROM hscresult WHERE roll='$hsc_roll' AND passyear='$hsc_pass_year' AND board='$board' AND sscroll='$ssc_roll'");
			if(mysql_num_rows($sql)==1)
			{
			   $rows=mysql_fetch_assoc($sql);
			   $_SESSION['hscid']=$rows['id'];
			   $_SESSION['roll']=$rows['roll'];
			   $_SESSION['passyear']=$rows['passyear'];
			   $_SESSION['board']=$rows['board'];
			   echo "101"; die;
			}
			else
			{
			   echo "401"; die;
			}
		}
	}

?>