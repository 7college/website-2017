     <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
		include('../../config/config.php');
		include('../../config/common_array.php');
		extract($_REQUEST);
		 $sql=mysql_query("select * from  fbs_applicant_data WHERE application_id='$appsid' or mobile='$mobileno'") or die(); 
         $row=mysql_fetch_assoc($sql);
		 $count=mysql_num_rows($sql);
		 if($count==0){
			 echo "<h1>Data Not Found.</h1>";
		 }else{
     ?>
	
                        
                     <div class="table-responsive">
                           <div class="panel-body">
                            <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                                <tr><td><b>Application ID:</b></td><td><b><?php echo $row['application_id']?></b></td><td rowspan="8" width='190'><img src="../../picture/<?php echo $row['picture']?>" style="height:180px; width:170px;  border:2px solid green; "/></td></tr>
                                <tr><td><b>Applicant's Name:</b></td><td><?php echo $row['name']?></td></tr>
                                <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
                                <tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
                                <tr><td><b>Mobile:</b></td><td><?php echo $row['mobile']?></td></tr>
                                <tr><td><b>Gender:</b></td><td><?php echo $gender[$row['gender']]; ?></td></tr>
                                <tr><td><b>Quota:</b></td><td><?php echo $quata[$row['quata']]; ?></td></tr>
                                <tr><td><b>Total GPA (HSC & SSC):</b></td><td><?php echo $tgpa=$row['hscgpa']+$row['sscgpa']?></td></tr>
                            </table>
                            <br /><br />
                       			
                          							
                       			


								
                           <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr><td style="text-align:left; font-weight:bold;font-size:16px;" colspan="7">Application Information</th></tr>
                                <tr style=" background:#3E2B85; font-size:12px; color:#FFF;">
                                    <th>Unit</th>
                                    <th width='50' style='text-align:center;'>Apply</th>
                                    <th width='90' style='text-align:center;'>Pay Slip</th>
                                    <th style='text-align:center;'>Payment Status</th>
                                    <th style='text-align:center;'>Admit Card</th>
                                    <th style='text-align:center;'>Result</th>
                                    <th style='text-align:center;'>Merit Position</th>
                                </tr>
                               </thead>
							  
                               <tbody>
                                
								 <tr style='text-align:center; font-size:12px;'>
							     <?php 
							       $sqlcheckpay1=mysql_query("SELECT appsid,payid FROM  fbs_unit_data WHERE appsid='".mysql_real_escape_string($row['application_id'])."' AND unitid='1'");
								   $countrows1=mysql_num_rows($sqlcheckpay1);
								   $rowsdata1=mysql_fetch_assoc($sqlcheckpay1);
							     ?>
                                    <th><?php echo $unit[1] ?></th>
                                    <th style='text-align:center;'>
									   <?php if($tgpa<7){ echo "N/A";} else{ ?>
									   <?php if($countrows1==1){ echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>';  } else{?> <button onclick='fnc_unit_check(<?php echo 1; ?>)'> Apply </button> <?php } ?>
									   <?php } ?>
									</th>
									<th style='text-align:center;'>
									   <?php if($countrows1==1){?>
									    <button onclick="fnc_unit_data_dnl('<?php echo $row['application_id'].'##'.'1'; ?>')"><span class="glyphicon glyphicon-download" style="font-size:25px; color:green;"> </span></button>
									   <?php } else{ ?>
									       --
									   <?php } ?>
									</th>
									
									<?php
										$sqlcheckpayd1=mysql_query("SELECT a.amount FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid and a.aid='".mysql_real_escape_string($row['application_id'])."' AND a.pid='".mysql_real_escape_string($rowsdata1['payid'])."' AND b.unitid='1'");
										$countrow1=mysql_num_rows($sqlcheckpayd1);
										
									?>
									
                                    <th style='text-align:center;'><?php if($countrow1==1) {  echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>
									
									
									<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
                                 </tr>     
								
								
								 <tr style='text-align:center; font-size:12px;'>
							     <?php 
							       $sqlcheckpay2=mysql_query("SELECT appsid,payid FROM  fbs_unit_data WHERE appsid='".mysql_real_escape_string($row['application_id'])."' AND unitid='2'");
								   $countrows2=mysql_num_rows($sqlcheckpay2);
								   $rowsdata2=mysql_fetch_assoc($sqlcheckpay2);
							     ?>
                                    <th><?php echo $unit[2] ?></th>
                                    <th style='text-align:center;'>
									  <?php if($tgpa<6.5){ echo "N/A";} else{ ?>
									  <?php if($countrows2==1){ echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>';  } else{?> <button onclick='fnc_unit_check(<?php echo 2; ?>)'> Apply </button> <?php } ?>
									  <?php } ?>
									</th>
									<th style='text-align:center;'>
									   <?php if($countrows2==1){?>
									    <button onclick="fnc_unit_data_dnl('<?php echo $row['application_id'].'##'.'2'; ?>')"><span class="glyphicon glyphicon-download" style="font-size:25px; color:green;"> </span></button>
									   <?php } else{ ?>
									       --
									   <?php } ?>
									</th>
										<?php
										$sqlcheckpayd2=mysql_query("SELECT a.amount FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid and a.aid='".mysql_real_escape_string($row['application_id'])."' AND a.pid='".mysql_real_escape_string($rowsdata2['payid'])."' AND b.unitid='2'");
										$countrow2=mysql_num_rows($sqlcheckpayd2);

										?>
									
                                    <th style='text-align:center;'><?php if($countrow2==1) {  echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>									
									<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
                                 </tr>     
								
								 <tr style='text-align:center; font-size:12px;'>
							     <?php 
							       $sqlcheckpay3=mysql_query("SELECT appsid,payid FROM  fbs_unit_data WHERE appsid='".mysql_real_escape_string($row['application_id'])."' AND unitid='3'");
								   $countrows3=mysql_num_rows($sqlcheckpay3);
								   $rowsdata3=mysql_fetch_assoc($sqlcheckpay3);
							     ?>
                                    <th><?php echo $unit[3] ?></th>
                                    <th style='text-align:center;'>
									<?php if($tgpa<6){ echo "N/A";} else{ ?>
									<?php if($countrows3==1){ echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>';  } else{?> <button onclick='fnc_unit_check(<?php echo 3; ?>)'> Apply </button> <?php } ?>
									<?php } ?>
									</th>
									<th style='text-align:center;'>
									   <?php if($countrows3==1){?>
									    <button onclick="fnc_unit_data_dnl('<?php echo $row['application_id'].'##'.'3'; ?>')"><span class="glyphicon glyphicon-download" style="font-size:25px; color:green;"> </span></button>
									   <?php } else{ ?>
									       --
									   <?php } ?>
									</th>
									
	
									<?php
										$sqlcheckpayd3=mysql_query("SELECT a.amount FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid a.aid='".mysql_real_escape_string($row['application_id'])."' AND a.pid='".mysql_real_escape_string($rowsdata3['payid'])."' AND b.unitid='3'");
										$countrow3=mysql_num_rows($sqlcheckpayd3);
										
									?>
									
                                    <th style='text-align:center;'><?php if($countrow3==1) { echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>
																		<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
									<th style='text-align:center;'>--</th>
                                 </tr>     
								 <tr>
								    <td colspan='7'>  	
									<?php if($row['degree_status']==1) {?>
									  <span style='color:red; font-size:25px; font-weight:bolder;'> আপনি   ডিগ্রী পাস  কোর্স এ  সফল ভাবে  আবেদন করেছেন । </span>
									<?php } else{?>
									আপনি   যদি   স্নাতক  এ  সুযোগ না পান তাহলে  ডিগ্রী পাস  কোর্স এ আবেদন করতে পারবেন । যদি   আবেদন করতে চান  তাহলে  Apply Button ক্লিক করেন।   <button onclick='fnc_apply_for_degree(<?php echo $row['application_id']; ?>)'> Apply </button> 
									<?php } ?>
									</td>
								 </tr>
                                
                               </tbody>
                            </table> 
					   
					   
                         <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr><td style="text-align:left; font-weight:bold;font-size:16px" colspan="6">Academic Information</th></tr>
                                <tr style=" background:#3E2B85; font-size:12px; color:#FFF;">
                                    <th>Name of Degree</th>
                                    <th>Roll</th>
                                    <th>Board</th>
                                    <th>Group</th>
                                    <th>Passing Year</th>
									<th>GPA</th>

                                   
                                </tr>
                               </thead>
                               <tbody>
                                <tr style='text-align:center; font-size:12px;'>
                                    <th>SSC or Equivalent</th>
                                    <th><?php echo $row['sscroll']?></th>
                                    <th><?php echo $board[$row['sscboard']]?></th>
                                    <th><?php echo $row['sscgrp']?></th>
                                    <th><?php echo $row['sscpass']?></th>
                                    <th><?php echo $row['sscgpa']?></th>
                                 </tr>  
                                 <tr style='text-align:center; font-size:12px;'>
                                    <th>HSC or Equivalent</th>
                                    <th><?php echo $row['hscroll']?></th>
                                    <th><?php echo $board[$row['hscboard']]?></th>
                                    <th><?php echo $row['hscgrp']?></th>
                                    <th><?php echo $row['hscpass']?></th>
									<th><?php echo $row['hscgpa']?></th>
                                 </tr>  
                               </tbody>
                            </table>
                           
                           
                    </div>
            </div>  
		 <?php } ?>
                             