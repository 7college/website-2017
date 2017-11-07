<script>
function fnc_check_and_next()
{
 window.location='index.php?act=apply/sfstep';
}
</script>
<?php 
	session_start();
	if(isset($_SESSION['hscid'])==""){  echo "<script>location='process/logout.php'</script>";}
	include('dumerchant/login/config/config.php');
	extract($_POST);
	$sql=mysql_query("SELECT * FROM hscresult WHERE id='".db_escape($_SESSION['hscid'])."'");
	$row=mysql_fetch_assoc($sql); 
	//print_r($_POST); die;
	$_SESSION['sscgroup']=$sscgroup;
	$_SESSION['ssccgpa']=$ssccgpa;
	$_SESSION['sscreg']=$sscreg;
	
?>


 <section class="main">
                <div class="container">
                    <div class="row">
                    <div class="container">
                    <?php include("process/uppermenu.php"); ?>  
                    <div class="col-md-12" style="padding:0px; margin:0px;">
                    <div class="widget">
					
                <div class="panel panel-primary">
				
				
                    <div class="panel-heading"  style=" font-weight:bolder; color:#fff; font-size:16px;">
                       
					   আবেদনকারীর অবস্থান
					   
                    </div>
					
					
                   <div class="panel-body" id="content">
						<?php  $tgpa=$row['gpa']+$_SESSION['ssccgpa']; 
						 if($tgpa>6){ 
						 ?>	 
								<div class="alert alert-success alert-dismissable">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>অভিনন্দন !</strong>   আপনি ভর্তি পরীক্ষায় অংশগ্রহণের জন্য উপযুক্ত।
                                 <br/>
								 নিন্মোক্ত তথ্যগুলো যাচাইয়ের পর পরবর্তী ধাপে যাওয়ার জন্য অগ্রসর হোন।
								</div>
                   								
							
						<?php } else{ ?>
								<div class="alert alert-danger alert-dismissable">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong>দুঃখিত !</strong> আপনি ভর্তি পরীক্ষায় অংশগ্রহণের জন্য উপযুক্ত নয় । ন্যুনতম জি পি এ ৬.০০ এর নিচে প্রাপ্ত প্রার্থীরা আবেদনের জন্য গ্রহনযোগ্য নয়।

								</div>
						<?php } ?>
                        <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
						   <thead>	
							<tr style='backgroud:#3276B1;'>
							   <th colspan='2'>Personal Information</th>
							</tr>
						   </thead>
						   <tbody>
                            <tr><td><b>Applicant's Name</b></td><td><?php echo $row['name'];?></td></tr>
                            <tr><td><b>Father's Name</b></td><td><?php echo $row['fname'];?></td></tr>
							<tr><td><b>Mother's Name</b></td><td><?php echo $row['mname'];?></td></tr>
							<tr><td><b>Gender</b></td><td><?php echo $gender[$row['sex']];?></td></tr>
							<tr><td><b>Total GPA</b></td><td><?php echo $tgpa;?></td></tr>
						   </tbody>
                        </table>
                        <br />
						
					  <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
						<thead>
						 <tr style='backgroud:#3276B1;'>
						     <th colspan='6'>Academic Information</th>
						  </tr>	
						</thead>
						<tbody>	
						<tr style='backgroud:#3276B1;'>
							 <th>Name of Degree</th>
							 <th>Roll No.</th>
							 <th>Reg NO.</th>
							 <th>Group</th>
							 <th>Board</th>
							 <th>Passing Year</th>
							 <th>GPA (Including 4th Subject)</th>
						</tr>							
						  <tr>
						     <td>HSC or Equivalent</td>
						     <td><?php echo $row['roll']?></td>
						     <td><?php echo $row['regno']?></td>
						     <td><?php echo $row['hscgroup']?></td>
							 <td><?php echo $board[$row['board']]?></td>
						     <td><?php echo $row['passyear']?></td>
						     <td><?php echo $row['gpa']?></td>
						  </tr>	
						  <tr>
						     <td>SSC or Equivalent</td>
						     <td><?php echo $_SESSION['sscroll']?></td>
						     <td><?php echo $_SESSION['sscreg']?></td>			 
						     <td><?php echo $_SESSION['sscgroup']; ?></td>
							 <td><?php echo $board[$_SESSION['sscboard']];?></td>

						   	 <td><?php echo $_SESSION['sscyear'];?></td>
						     <td><?php echo $_SESSION['ssccgpa']?></td>
						  </tr>
                       </tbody>						  
						</table>
						
						<?php if($tgpa>6){ ?>
   
                        <table class="table table-striped table-hover table-bordered">
                          
                            <tr>
                                <td colspan="2"><button type="button" class="btn btn-primary" onclick="fnc_check_and_next()" name="btn_submit_final_data"> <span class='glyphicon glyphicon-forward'></span> Next</button></td>
                            </tr>
                        </table>
						<?php } ?>
                    </div>
                </div>
	  </div>
  </div>
  </div>
  </div>
  </div>
</section>