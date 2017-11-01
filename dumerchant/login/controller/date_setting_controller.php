<?php
 session_start();
 include('../config/config.php');
 extract($_REQUEST);
 $SqlInsert=mysql_query("INSERT INTO  fbs_default_date(date_data) VALUES ('$dateId')");

 if($SqlInsert==1){ echo "1"; die;}

?>