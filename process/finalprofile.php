<?php 
	session_start();
	include('dumerchant/login/config/config.php');
	$sql=mysql_query("SELECT * FROM combile_data WHERE id='".$_SESSION['insertid']."'");
	$row=mysql_fetch_assoc($sql); 
	
	
	$sqlDisctrict=mysql_query("SELECT * FROM fbs_district_list");
	while($rowDistrict=mysql_fetch_assoc($sqlDisctrict)){
		
		$DistName[$rowDistrict['id']]=$rowDistrict['district_name_en'];
	   	
	}
	
?>
<section class="main">
     <div class="container">
      <?php include("process/uppermenu.php"); ?>
          <div class="panel panel-default" style="margin:0px; padding:0px;">
                  <div class="panel-heading"  style=" font-weight:bolder; color:#A27126; font-size:16px;">
                                                      আবেদনকারীর ড্যাশবোর্ড 
                </div>
              <div class="panel-body">
                     
                            <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                                <tr><td><a href="process/printview_profile.php?pid=<?php echo $row['id']?>"><button type="button" class="btn btn-primary" name="btn_submit_final_data">Print View</button></a></td></tr>
                                <tr><td><b>Application ID:</b></td><td><b><?php echo $row['application_id']?></b></td><td rowspan="6"><img src="picture/<?php echo $row['picture']?>" style="height:180px; width:170px;  border:2px solid green; "/></td></tr>
                                <tr><td><b>Applicant Name:</b></td><td><?php echo $row['name']?></td></tr>
                                <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
                                <tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
                                <tr><td><b>Mobile:</b></td><td><?php echo $row['mobile']?></td></tr>
                                <tr><td><b>Gender:</b></td><td><?php  if($row['sex']=='m'){ echo "Male";} else{ echo "Female";}?></td></tr>
                            </table>
                            <br />
                       
					   <br />
      
                           <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr><td style="text-align:left; font-weight:bold;font-size:16px" colspan="6">Exam Information</th></tr>
                                <tr style=" background:#3E2B85; font-size:12px; color:#FFF;">
                                    <th>Unit</th>
                                    <th>Payment</th>
                                    <th>Admit</th>
                                    
                                    <th>Marit</th>
                                </tr>
                               </thead>
                               <tbody>
                                <tr style='text-align:center; font-size:12px;'>
                                    <th><?php echo $unit[$row['unit']]; ?></th>
                                    <th><?php if($row['payment']==1) { echo 'Paid'; } else { echo 'Unpaid'; }?></th>
                                    <th><a href='process/admit_card.php'><button>Download</button></a></th>
                                    
									<th>--</th>
                                 </tr>  
                                
                               </tbody>
                            </table> 
					   
					   
                         <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr><td style="text-align:left; font-weight:bold;font-size:16px" colspan="6">Academic Information</th></tr>
                                <tr style=" background:#3E2B85; font-size:12px; color:#FFF;">
                                    <th>Degree</th>
                                    <th>Roll</th>
                                    <th>Board</th>
                                    <th>Group</th>
                                    <th>CGPA</th>
                                    <th>Passing Year</th>
                                   
                                </tr>
                               </thead>
                               <tbody>
                                <tr style='text-align:center; font-size:12px;'>
                                    <th>SSC/Equivalent</th>
                                    <th><?php echo $row['sscroll']?></th>
                                    <th><?php echo $board[$row['sscboard']]?></th>
                                    <th><?php echo $row['sscgrp']?></th>
                                    <th><?php echo $row['sscgpa']?></th>
                                    <th><?php echo $row['sscpass']?></th>
                                 </tr>  
                                 <tr style='text-align:center; font-size:12px;'>
                                    <th>HSC/Equivalent</th>
                                    <th><?php echo $row['hscroll']?></th>
                                    <th><?php echo $board[$row['hscboard']]?></th>
                                    <th><?php echo $row['hscgrp']?></th>
                                    <th><?php echo $row['hscgpa']?></th>
                                    <th><?php echo $row['hscpass']?></th>
                                 </tr>  
                               </tbody>
                            </table>
                             <br />
                            
                           <table class="table table-striped table-hover table-bordered">
                                <thead>
                                <tr><td style="text-align:left; font-weight:bold;font-size:16px" colspan="6">Othrer's Information</th></tr>
                                <tr style=" background:#3E2B85; font-size:12px; color:#FFF;">
                                    <th>Quata</th>
                                    <th>Mobile</th>
                                    <th>District</th>
                                   
                              
                                </tr>
                               </thead>
                               <tbody>
                                <tr style='text-align:center; font-size:12px;'>
                                   
                                    <th><?php echo $quata[$row['quata']]; ?></th>
                                    <th><?php echo $row['mobile']?></th>
                                    <th><?php echo $DistName[$row['district']];?></th>
                                   
                                 </tr>  
                                
                               </tbody>
                            </table> 
                    </div>
            </div>
        </div>
</section>

<?php
extract($_POST);
if($action=='save_update_delete'){
 
    $SQL_Query= mysql_query("UPDATE add_student_info SET picture='$picture_name',quta='$quta' WHERE id='$studentId'");
    if($SQL_Query==1){
		   echo "1"; die;
		}
}

?>