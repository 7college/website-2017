<?php
session_start();
if(isset($_SESSION['uid'])==""){  echo "<script>location='home/logout.php'</script>";}

?>  


<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="index.php" style="font-size:15px; font-weight:bolder; color:#fff;">  
                   
                        <?php if($_SESSION['user_type']==1){ ?> Admin Panel <?php } else {?>
						   College Panel
						<?php } ?>

                   
                    </a>
            
            
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li style="color:white;">Welcome to <?php echo $_SESSION['fname']; ?> &nbsp;&nbsp;&nbsp</li>
         
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="home/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        
