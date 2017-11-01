     <?php
		session_start();
		include('../config/config.php');
        extract($_REQUEST);
		if($action=='load_cousre_name_id'){
			//echo $action; die;
			$sql= "select student_name,student_id,student_batch,student_email,student_phone from fbs_student_info where student_id='$system_id'"; 
		            $sqlRES=mysql_query($sql);	
			        $r=mysql_fetch_assoc($sqlRES);
					//echo $r["student_name"];die;
				
					echo "document.getElementById('txt_student_name').value = '".$r["student_name"]."';\n"; 
					echo "document.getElementById('txt_student_id').value = '".$r["student_id"]."';\n";
					echo "document.getElementById('txt_student_batch').value = '".$r["student_batch"]."';\n";
					echo "document.getElementById('txt_student_email').value = '".$r["student_email"]."';\n";
					echo "document.getElementById('txt_student_phone').value = '".$r["student_phone"]."';\n";
			
		}
	  ?>