<?php
    session_start();
	include('../admin/login/config/config.php');
	extract($_POST);
	if($action=='forgotappsdata'){
		//echo "SELECT * FROM combile_data WHERE mobile='$mobile' AND sscroll='$ssc' AND hscroll='$hsc' AND unit='$unit'"; die;
		//echo $action; die;
		//echo "SELECT * FROM combile_data WHERE mobile='$mobile' AND application_id='$appsid' AND unit='$unit'"; die;
      $sql=mysql_query("SELECT * FROM combile_data WHERE mobile='$mobile' AND sscroll='$ssc' AND hscroll='$hsc' AND unit='$unit'");
	  $row=mysql_fetch_assoc($sql); 
   	 $count=mysql_num_rows($sql);
	  if($count==1){
	?>
	  
			<table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
					<tr><th colspan="4"  style="background:#DCEAF9;">Query Result</th></tr>
					<tr>
						<th>Name</th><td colspan='3'><?php echo $row['name']?></td>
						
				    </tr>
					<tr>
					   <th>Application ID</th><td style='color:red;' colspan='3'><?php echo $row['application_id']?></td>
					</tr>
					<tr>
						<th>Payment Status</th><td colspan='3'><?php if($row['payment']==1){ echo "<font color='green'>Paid</font>";} else { echo "<font color='red'>Unpaid</font>";} ?></td>
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