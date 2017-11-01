    
	<?php 
		include('../../config/config.php');
		//include('../../config/common_function.php');
		extract($_REQUEST);
		
		for($i=$regnofrom; $i<=$regnoto; $i++){
	      	$dureg=$college.'13'.$sub.str_pad($i,5,"0",STR_PAD_LEFT);
			//echo "INSERT INTO dureggenerator(regno,collgeid,subjectid)VALUES('$dureg','$college','$sub')";
			mysql_query("INSERT INTO dureggenerator(regno,collgeid,subjectid)VALUES('$dureg','$college','$sub')");
		}
		
     ?>
	
                      
                          
                               
                             