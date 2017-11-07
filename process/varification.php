<?php
    session_start();
	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='actionquaerypages')
		{	
	
			$sqlcheckrow=mysql_query("SELECT * FROM  fbs_applicant_data WHERE hscroll='".db_escape($hsc_roll)."' AND hscreg='".db_escape($hsc_reg)."' AND hscpass='2017' AND hscboard='".db_escape($board)."'");
			$chekrows=mysql_fetch_assoc($sqlcheckrow);

			$count=mysql_num_rows($sqlcheckrow);
			
			if($count>0)
				{
					
						echo "110"; die;	
					
				}
		
		
		else{
            //echo "SELECT * FROM hscresult WHERE roll='".db_escape($db_escape)."' AND passyear='2017' AND board='".db_escape($board)."'"; die;			
			$sql=mysql_query("SELECT * FROM hscresult WHERE roll='".db_escape($hsc_roll)."' AND regno='".db_escape($hsc_reg)."' AND passyear='2017' AND board='".db_escape($board)."'");
			$rows=mysql_fetch_assoc($sql);
			//print_r($rows); return;
			if(mysql_num_rows($sql)>0)
			{
			   $_SESSION['hscid']=$rows['id'];
			   $_SESSION['roll']=$rows['roll'];
			   $_SESSION['passyear']=$rows['passyear'];
			   $_SESSION['board']=$rows['board'];
			   $_SESSION['sscroll']=$ssc_roll;
			   $_SESSION['sscyear']=$ssc_pass_year;
			   $_SESSION['sscboard']=$sscboard;
			   echo "101"; die;
			}
			else
			{
			   echo "401"; die;
			}
		}
	}

?>