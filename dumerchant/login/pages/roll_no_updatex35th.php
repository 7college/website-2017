<?php

   $sql=mysql_query("SELECT * FROM fbs_roll_assign");
   while($row=mysql_fetch_assoc($sql)){
	    
		   //echo $row['fkid'].'-----------'.$row['roll'].'<br/>';
		   mysql_query("update student_info_fbs  set exam_roll_no='".$row['roll']."' where application_id='".$row['fkid']."'");
	   
	   }
   


?>