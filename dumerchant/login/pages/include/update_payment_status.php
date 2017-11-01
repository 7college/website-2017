<?php

 
 require_once('../../config/config.php');
 extract($_REQUEST);
 
if($action=='getIdThenUpdate')
{

        
         $StudentUpdate=mysql_query("UPDATE student_info_fbs SET payment_status='3',status='3' WHERE id='$upid'");

		 $TxtUpdate=mysql_query("UPDATE t_transactions SET status='3' WHERE s_id='$upid'");


	if($StudentUpdate==1 && $TxtUpdate==1){
		
		   echo "1";
		} 
		else{
		   echo "0";
		}
 }

?>