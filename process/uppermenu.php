<?php session_start(); ?>

<style>
nav ul li a: hover { color:#006633; }
</style>

<nav class="navbar navbar-inverse" style="background:#2F1B72; border:none;">
    <div class="container-fluid">

    <ul class="nav navbar-nav">
        <?php if($_SESSION['applicationid']!=''){ ?>
		<li class="x"><a href="index.php?act=apply/fstep" style='font-weight:bolder; color:white; margin-top:8px;'>Home</a></li>
        <?php } else{?>
		<li class="x"><a href="index.php" style='font-weight:bolder; color:white; margin-top:8px;'>Home</a></li>
		<?php } ?>
		<li><a href="index.php?act=apply/notice" style='font-weight:bolder;color:white;  margin-top:8px;'> Notice </a></li>
         <?php if($_SESSION['applicationid']!=''){ ?>
		   <li><a href="process/logout.php" style='font-weight:bolder;color:white;  margin-top:8px;'>Logout</a></li>
		 <?php } else { ?>
		   <li><a href="index.php?act=apply/verify"style='font-weight:bolder;color:white;  margin-top:8px;'> Login</a></li>
		 <?php } ?>
    </ul>
  </div>
</nav>