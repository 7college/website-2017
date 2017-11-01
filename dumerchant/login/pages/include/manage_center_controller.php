<?php
include("../../config/config.php");
extract($_REQUEST);
if($action=='save_update_delete'){
	
	 $entry_date=date('Y-m-d');
	 if($systemID==0){
	 $INSERT=mysql_query("INSERT INTO fbs_manage_center(center_name,capasity)
	 VALUES('$center_name','$capasity')");

	 if($INSERT==1){ echo "1"; die;}
	 } 
	 
	 else if($systemID!=0){
		 	 $UPDATE=mysql_query("UPDATE  fbs_manage_center SET center_name='$center_name',capasity='$capasity' WHERE id='$systemID'");
			  if($UPDATE==1){ echo "2"; die;}
		 }
	 
	 
	}
	
 if($action=='get_list_view'){
	     $SELECT=mysql_query("SELECT * FROM fbs_manage_center WHERE id='$uid'");
		 while($r=mysql_fetch_assoc($SELECT)){
		   echo "document.getElementById('systemID').value = '".$r["id"]."';\n";
		   echo "document.getElementById('center_name').value = '".$r["center_name"]."';\n";
		   echo "document.getElementById('capasity').value = '".$r["capasity"]."';\n";

 		 }
	 
	 }	
?>
