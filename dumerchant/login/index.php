 <?php include("config/config.php"); ?>
 <?php //include("config/common_function.php"); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>:: Merchant Login</title>
    <!-- Favicon -->
    <link href="../../images/logo.png" rel="icon" type="image/png">
    <link rel="shortcut icon" type="image/x-icon" href="http://mis.du.ac.bd/favicon.ico">

	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	 <!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	 <!-- Morris Chart Styles-->
	 <!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	 <!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	 <!-- TABLE STYLES-->
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	 <!-- Bootstrap Js  start-->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script src="assets/js/common_function.js"></script> 
   
      
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
	$('#htmlserach').DataTable();
	$('#appsID').focus();
      
});


</script>
<!-- Custom Js -->
<script src="assets/js/custom-scripts.js"></script>
<?php require_once("common/common_function.php")?>
</head>
<body>
    <div id="wrapper">
    
        <!--/. NAV TOP  -->
        <?php require_once("home/header.php")?>
        
		<div  style="padding:0px;  max-height:600px; overflow:auto; ">
		  
		<?php
		  if(isset($_GET['data'])){
			 $page='pages/'.$_GET['data'].'.php';
			 require_once($page);
		  }else{
			     require_once("pages/advancedsearch/boardresult.php");
		  }
		?>
		</div>
    </div>  
   
</body>
</html>
