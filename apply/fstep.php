<?php 
	session_start();
	if(isset($_SESSION['applicationid'])==""){  echo "<script>location='process/logout.php'</script>";}

	include('dumerchant/login/config/config.php');
	$sql=mysql_query("SELECT * FROM fbs_applicant_data WHERE application_id='".db_escape($_SESSION['applicationid'])."'");
	$row=mysql_fetch_assoc($sql); 

?>
<script>
   function fnc_unit_check(uid)
   {
	   	var con=confirm('Are you sure select this unit?');
		if(con==true){
		var appsid=$('#appsid').val();
		var pid=$('#pid').val();
		var uid=uid;
		var data ="action=save_unit_data&appsid="+appsid+"&pid="+pid+"&uid="+uid;
		http.open( "POST","process/insertunitdata.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_unit_check_response;
		http.send(data); 
		}
	}
	function fnc_unit_check_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			if(response==104){
			window.location='index.php?act=apply/fstep';
			}
			else if(response==404){
				alert('Sorry! Data Save Error, Please try again.');
			    window.location='index.php?act=apply/fstep';
 			}
		 }
	}
 function fnc_apply_for_degree(val){
        var con=confirm('Are you sure apply for degree?');
		if(con==true){
		
		var data ="action=save_degree_data&appsid="+val;
		http.open( "POST","process/insertunitdata.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_apply_for_degree_response;
		http.send(data); 
		}
	 
 }

 function fnc_apply_for_degree_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			if(response==105){
			window.location='index.php?act=apply/fstep';
			}
			else if(response==404){
				alert('Sorry! Data Save Error, Please try again.');
			    window.location='index.php?act=apply/fstep';
 			}
	   }	
	}
	
  function fnc_unit_data_dnl(valdata){
	  
	   //alert('Today after 5:00 PM you will get the pay slip.'); return;
	   var dataval=valdata.split('##');
		var data ="action=save_unit_payslip&appsid="+dataval[0]+"&unitid="+dataval[1];
		http.open( "POST","apply/pay/payslip.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_unit_data_dnl_response;
		http.send(data);
	  
  }	
  
   function fnc_unit_data_dnl_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
		    window.open(response,'_blank');

		
	   }	
	}
	
</script>	
<section class="main">
                <div class="container">
                    <div class="row">
                    <div class="container">
                    <?php include("process/uppermenu.php"); ?>  
                    <div class="col-md-12" style="padding:0px; margin:0px;">
                    <div class="widget">
          <div class="panel panel-primary" style="margin:0px; padding:0px;">
                  <div class="panel-heading"  style=" font-weight:bolder; color:#fff; font-size:16px;">
                    Applicant's Dashboard 
                  </div>
				 
				<div class="panel-body">
			  	
                 <div class="widget-header">
                    <div style="font-size:25px;text-align:center;color:#A27126;"> 
                    
                            <div class="alert alert-warning warning_big" style="text-align:left;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong><i class="fa fa-exclamation-triangle fa-lg fa-2x" aria-hidden="true"></i> UNIT সিলেকশন এবং টাকা জমা দেয়ার    নিয়মাবলী :</strong><br/><br/>
                            <ul style="text-align:left; font-size:15px;" >
                                <li> যে  UNIT এ  আবেদন করতে চান তার পাশের Apply  Button  ক্লিক করুন ।  যদি  N/A থাকে তাহলে আপনি আবেদনের জন্য যোগ্য নয় ।</li>
                                <li>পেমেন্ট স্লিপের অপশন থেকে  PAY SLIP DOWNLOAD করে নিন । </li>
                                <li> Sonali Bank Limited (Online  Branch ) যে কোন শাখা থেকে ১৪/১১/২০১৭   তারিখের  মধ্যে টাকা জমা দেয়া যাবে।</li>
								<li>টাকা জমা দেয়ার ৪৮ ঘন্টার  মধ্যে  Payment Status আপডেট হবে ।</li>
								<li>পেমেন্ট স্লিপ প্রিন্ট করার ব্যবস্থা  থাকতে হবে।</li>
                            </ul>
                            
                            </div>                    
                    </div>
                </div>       
               </div>    
				  
				  
				  
              <div class="panel-body">
			  
			           
                     
                            <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                                <tr><td><b>Application ID:</b></td><td><b><?php echo $row['application_id']?></b></td><td rowspan="8" width='190'><img src="picture/<?php echo $row['picture']?>" style="height:180px; width:170px;  border:2px solid green; "/></td></tr>
                                <tr><td><b>Applicant's Name:</b></td><td><?php echo $row['name']?></td></tr>
                                <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
                                <tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
                                <tr><td><b>Mobile:</b></td><td><?php echo $row['mobile']?></td></tr>
                                <tr><td><b>Gender:</b></td><td><?php echo $gender[$row['gender']]; ?></td></tr>
                                <tr><td><b>Quota:</b></td><td><?php echo $quata[$row['quata']]; ?></td></tr>
                                <tr><td><b>Total GPA (HSC & SSC):</b></td><td><?php echo $tgpa=$row['hscgpa']+$row['sscgpa']?></td></tr>
                            </table>
                            <br /><br />
                       			
                           <input type='hidden' value="<?php echo $row['application_id']; ?>" name='appsid' id='appsid'/>								
                           <input type='hidden' value="<?php echo time(); ?>" name='pid' id='pid'/>								
                       			

<div class="widget-header">
		<div style="font-size:25px;text-align:center;color:#A27126;"> 
		
				<div class="alert alert-danger warning_big" style="text-align:left;">
			   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<b>
				<ul style="text-align:left; font-size:15px;" >
					<li>আপনি পেমেন্ট করতে যথাযথভাবে সমর্থ হলে পেমেন্ট স্ট্যাটাস বক্সে সবুজ টিক চিহ্ন দেখা যাবে।</li>
					<li>Admit Card এর উত্তোলনের তারিখ আগামী ২০/১১/২০১৭ তারিখের মধ্যে ওয়েবসাইটের নোটিশ বোর্ডের মাধ্যমে জানিয়ে দেয়া হবে।</i>
					<li>যেকোন একটি স্নাতক ইউনিটে আবেদনের পর ডিগ্রী পাস কোর্সের আবেদন গ্রহনযোগ্য হবে।</li>
					<li>যারা স্নাতক সমমান কোর্সে সুযোগ পাবে না ডিগ্রী পাস কোর্সের আবেদনের প্রেক্ষিতে যোগ্য প্রার্থীকে ভর্তির সুযোগ প্রদান করা হবে।</li>
				</ul>
				</b>
				</div>                    
		</div>
	</div> 
								
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
									
                                    <th style='text-align:center;'><?php if($countrow1>0) {  echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>
									
									
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
									
                                    <th style='text-align:center;'><?php if($countrow2>0) {  echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>									
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
									   // echo "SELECT a.amount FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid a.aid='".mysql_real_escape_string($row['application_id'])."' AND a.pid='".mysql_real_escape_string($rowsdata3['payid'])."' AND b.unitid='3'";
										$sqlcheckpayd3=mysql_query("SELECT a.amount FROM  fbs_payment a,fbs_unit_data b  WHERE a.aid=b.appsid and a.pid=b.payid and a.aid='".mysql_real_escape_string($row['application_id'])."' AND a.pid='".mysql_real_escape_string($rowsdata3['payid'])."' AND b.unitid='3'");
										$countrow3=mysql_num_rows($sqlcheckpayd3);
										
									?>
									
                                    <th style='text-align:center;'><?php if($countrow3>0) { echo '<span class="glyphicon glyphicon-ok-sign" style="font-size:25px; color:green;"> </span>'; } else { echo 'Unpaid'; }?></th>
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
        </div>
        </div>
        </div>
        </div>
</section>

