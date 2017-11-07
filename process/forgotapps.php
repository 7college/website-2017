<?php
  	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='DataCheckThenLoad'){
		
		$sql=mysql_query("SELECT * FROM fbs_applicant_data WHERE mobile='".db_escape($mobile)."' AND hscreg='".db_escape($hreg)."' AND hscroll='".db_escape($hroll)."' AND sscroll='".db_escape($sroll)."'");
		$row=mysql_fetch_assoc($sql); 
		$count=mysql_num_rows($sql);
		
		
	  if($count==1){
	?>
	  
			<table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
					<tr><th colspan="4"  style="background:#DCEAF9;">Query Result</th></tr>
					<tr>
					   <th>Application ID</th><td style='color:red; font-size:20px;' colspan='3'><?php echo $row['application_id'];?></td>
					</tr>
					<tr>
						<th>Name</th><td colspan='3'><?php echo $row['name'];?></td>
				    </tr>
					<tr>
						<th>Father's Name</th><td colspan='3'><?php echo $row['fname'];?></td>
				    </tr>
					
					<tr>
						<th>Mother's Name</th><td colspan='3'><?php echo $row['mname'];?></td>
				    </tr>
					
					
				
			</table>
		
 <?php
	  }
      else { ?>
            <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
					<tr><th colspan="4"  style=" color:red;">Sorry data not found.</th></tr>
				
			</table>
<?php	  
	}
	}
?>