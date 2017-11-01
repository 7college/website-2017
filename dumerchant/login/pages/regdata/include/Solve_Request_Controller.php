<?php
include('../../../config/config.php');
extract($_REQUEST);

if($action=='Status_Change'){
	
	$update=mysql_query("UPDATE fbs_services SET status='1' WHERE appid='$id'");
	if($update==1){
		echo "1"; die;
	}
	
}



?>

