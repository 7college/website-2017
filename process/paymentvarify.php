<?php
	session_start();
	include('../dumerchant/login/config/config.php');
	include('../dumerchant/login/config/common_array.php');
	extract($_POST);
	if($action=='payment_varification'){
	$sqlcheckrow=mysql_query("SELECT * FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid and  a.pid='".db_escape($pid)."' AND a.aid='".db_escape($appsid)."' AND b.unitid='".db_escape($unit)."'");
	$chekrows=mysql_fetch_assoc($sqlcheckrow);
	$count=mysql_num_rows($sqlcheckrow);
	
	
	  if($count==1){
	?>
	  
	    <div class="alert alert-success alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Congratulation!</strong> Your Payment Status Paid.
		</div>
		
 <?php
	  }
      else { ?>
		<div class="alert alert-danger alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  <strong>Sorry!</strong> Invalid Payment Status
		</div>
<?php	  
	}
	}
?>