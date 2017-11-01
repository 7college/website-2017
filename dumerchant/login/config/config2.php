<?php
  $host="localhost";
  $user="colleged_admit";
  //$user="root";
  $password="UToZc~=vQ$(f";
 // $password="";
  $db="colleged_admission";
  //$db="admission";
 
  $conn=mysql_connect($host,$user,$password);
  if($conn){
     mysql_select_db($db,$conn);
	// echo "done";
  }else{
    echo "Data connection field".mysql_error(); die;
  }
?>