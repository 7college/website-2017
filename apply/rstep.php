<?php 
	session_start();
    if(isset($_SESSION['hscid'])==""){  echo "<script>location='process/logout.php'</script>";}

	include('dumerchant/login/config/config.php');
	$sql=mysql_query("SELECT * FROM hscresult WHERE id='".db_escape($_SESSION['hscid'])."'");
	$row=mysql_fetch_assoc($sql); 
?>

<script>
	function fnc_check_result()
	{
		var sscgroup=$('#sscgroup').val();
		var ssccgpa=$('#ssccgpa').val();
		var sscreg=$('#sscreg').val();
		
		if (sscreg.length ==null || sscreg.length==""){ alert('Please enter your SSC Reg No.'); return false; }
		if (sscgroup.length ==null || sscgroup.length==""){ alert('Please enter your SSC Group.'); return false; }
		if (ssccgpa.length==null || ssccgpa.length==""){ alert('Please select your CGPA'); return false; }

	}	

</script>


 <section class="main">
                <div class="container">
                    <div class="row">
                    <div class="container">
                    <?php include("process/uppermenu.php"); ?>  
                    <div class="col-md-12" style="padding:0px; margin:0px;">
                    <div class="widget">
					
                <div class="panel panel-primary">
                    <div class="panel-heading"  style=" font-weight:bolder; color:#fff; font-size:16px;">
                                                              
							 অভিনন্দন, আপনি ভর্তি পরীক্ষায় অংশগ্রহণের জন্য পরবর্তী ধাপ  গুলো পুরন করুন।
						 
                    </div>
					
                   <div class="panel-body" id="content">
                    <form action='index.php?act=apply/vstep' method='post' onsubmit='return fnc_check_result()'/>
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
						   </tbody>
                        </table>
                        <br />
						
					  <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
						<thead>
						 <tr style='backgroud:#3276B1;'>
						     <th colspan='7'>Academic Information</th>
						  </tr>	
						</thead>
						<tbody>	
						<tr style='backgroud:#3276B1;'>
							 <th>Name of Degree</th>
							 <th>Roll No.</th>
							 <th>Reg No.</th>
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
							 <td><input type='text'  class="form-control" required id="sscreg" onpaste="return false" onkeypress="return checkaccnumber(event)" autocomplete="off" maxlength="12" name="sscreg"></td>
						     <td>
							    
							    <select id='sscgroup' required name='sscgroup' class="form-control">
								    <option value=""> >--Select--< </option>
								    <?php foreach ($sscgroup AS $keys=>$values){ ?>
									   <option value="<?php echo $values; ?>"><?php echo $values; ?></option>
									
									<?php } ?>
								</select>
							 
							 </td>
							 <td><?php echo $board[$_SESSION['sscboard']];?></td>

						     <td><?php echo $_SESSION['sscyear']?></td>
						     <td>
								<select  class="form-control" required id="ssccgpa" name="ssccgpa">
								 <option value=""> >--Select--< </option>
								  <?php for($i=0; $i<=9; $i++){ ?>
								 <option value="3.0<?php echo $i; ?>"> 1.0<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=10; $i<=99; $i++){ ?>
								 <option value="3.<?php echo $i; ?>"> 1.<?php echo $i; ?> </option>
								 <?php } ?>
								
								 <?php for($i=0; $i<=9; $i++){ ?>
								 <option value="3.0<?php echo $i; ?>"> 2.0<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=10; $i<=99; $i++){ ?>
								 <option value="3.<?php echo $i; ?>"> 2.<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=0; $i<=9; $i++){ ?>
								 <option value="3.0<?php echo $i; ?>"> 3.0<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=10; $i<=99; $i++){ ?>
								 <option value="3.<?php echo $i; ?>"> 3.<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=0; $i<=9; $i++){ ?>
								 <option value="4.0<?php echo $i; ?>"> 4.0<?php echo $i; ?> </option>
								 <?php } ?>
								 <?php for($i=10; $i<=99; $i++){ ?>
								 <option value="4.<?php echo $i; ?>"> 4.<?php echo $i; ?> </option>
								 <?php } ?>
								 <option value="5.00"> 5.00 </option>
								</select>
							 </td>
						  </tr>
                       </tbody>						  
						</table>
						
						
                        <table class="table table-striped table-hover table-bordered">
                          
                            <tr>
                                <td colspan="2"><button type="submit" class="btn btn-primary" name="btn_submit_final_data"> <span class='glyphicon glyphicon-forward'></span> Next</button></td>
                            </tr>
                        </table>
					</form>
                    </div>
                </div>
	  </div>
  </div>
  </div>
  </div>
  </div>
</section>