<?php include("login/config/common_array.php");?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    
	<meta charset="utf-8">
    <title><?php echo $CompanyName[1]; ?></title>
    <!-- Favicon -->
    <link href="../images/logo.png" rel="icon" type="image/png">
	<meta name="author" content="World IT Solution">
	<meta name="copyright" content="Copyright © 2016 World iT Solution.com">
	<meta name="rating" content="general">
	<meta name="distribution" content="global">
	<meta name="robots" content="index, follow">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/ezzeload.css" rel="stylesheet">
    <link href="css/portal.css" rel="stylesheet">
    
    <script>
	     function validate_data(){
		   var txt_user_name= document.getElementById('txt_user_name').value;
		   var txt_password= document.getElementById('txt_password').value;
		   
		   if(txt_user_name=="" || txt_user_name<1){ alert('Please enter your user ID'); return false; }
		   if(txt_password=="" || txt_password<1){ alert('Please enter your Password'); return false; }
		 }
	
	</script>
  </head>
  <body>
	<div id="wrap">
			<!-- Fixed navbar -->
			<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			  <div class="container">
				<div class="navbar-header">
				  <a class="navbar-brand" href=""> <?php echo $CompanyName[1]; ?></a>
				</div>
			  </div>
			</div>
			<div class="clrGap">&nbsp;</div>
			<div class="container mybody">
			<div class="portal well">
				<h2>Admin Login</h2>
				<div class="vform" >
				<p>Enter user and password to gain access.</p>
				<form action="login_sequre.php" method="post" accept-charset="utf-8" role="form" onSubmit="return validate_data()"><div style="display:none" >
                <input name="ezzeloadv8csrftoken" value="c8ff01f6788ae5d09ab457a3fc8d8a3c" type="hidden">
                </div>				  
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control input-sm" id="txt_user_name" name="txt_user_name" placeholder="Enter your username" type="text">
				  </div>
				   <div class="form-group">
					<label for="password">Password</label>
					<input class="form-control input-sm" id="txt_password" name="txt_password" placeholder="Enter your password" type="password">
				  </div>
				 
				 <p class="help-block form_error" style="font-size:11px;margin-top:2px;"></p>
				  <button type="submit" class="btn btn-primary btn-sm"> Login</button>
				</form>
				</div>
				<div class="clear">&nbsp;</div>
			</div>

	</div>
	</div><!--/end Wrap-->
	<div id="footer">
	<p>Copyright@ 2017, All right reserved.</p>
	</div>
  
</body></html>