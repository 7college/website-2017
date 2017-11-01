<?php
 session_start();
 include('../config/config.php');
 extract($_REQUEST);
 
 //print_r($_REQUEST); die;
 if(isset($_POST['submitdata']))
 {
	 $SqlInsert="INSERT INTO fbs_course_reg (collegecode,nureg,dureg,examroll,sessionid,stname,fname,mname,ctype,subcode,coursecode,centercode,exam_year)VALUES ('$college','$nureg','$dureg','$roll','$session','$examnee','$fname','$mname','$stype','$subject','$papercode','$center','2016')";
	
    //echo $SqlInsert; die;
	$SQL=mysql_query($SqlInsert);
	
	if($SQL){
		      header('Location:../index.php?data=regdata/registration&sk=1');
		} 
		else{
		      header('Location:../index.php?data=regdata/registration&sk=2');
		}
 }

?>