<?php 
session_start();
include('dumerchant/login/config/common_array.php');
?>
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <title>Admission Test: 2017-18</title>
        <!-- Favicon -->
        <link href="images/logo.png" rel="icon" type="image/png">
        <!-- Essential styles -->
        
		<link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css"> 
        <link rel="stylesheet" href="assets/style1.css" type="text/css">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <script src="assets/jquery.js"></script>
        <script src="assets/jquery.validate.js"></script>
        <script src="assets/common_function.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        

    </head>
    <body>
	<div class="wrapper">
		<?php include("header.php"); ?>	
		
		<?php
		  if(isset($_GET['act'])){
			  $page=$_GET['act'].'.php';
			  include($page);
		  }
		  else{
			  if($_SESSION['id']!=''){
				  include('process/finalprofile.php');
			  }
			  else{
			   include('apply/verify.php');
			  }
		  }
		?>
		
	</div>

   <?php include("footer.php") ?>

</body>
 </html>