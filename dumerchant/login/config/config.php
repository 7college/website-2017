<?php
  $host="localhost";
  $user="root";
  //$user="root";
  $password="";
 // $password="";
  $db="admission";
  //$db="admission";
 
  $conn=mysql_connect($host,$user,$password);
  if($conn){
     mysql_select_db($db,$conn);
	// echo "done";
  }else{
    echo "Data connection field".mysql_error(); die;
  }
?>