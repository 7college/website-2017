<?php 
	session_start();
	if(isset($_SESSION['hscid'])==""){  echo "<script>location='process/logout.php'</script>";}
	include('dumerchant/login/config/config.php');
	//include('dumerchant/login/config/common_array.php');
	$sql=mysql_query("SELECT * FROM hscresult WHERE id='".db_escape($_SESSION['hscid'])."'");
	$row=mysql_fetch_assoc($sql); 

?>

<script src="assets/fileupload.js"></script>
<script src="assets/common_function.js"></script>
<script src="assets/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="calender/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) 
	{
	$(".datepicker").datepicker({
		dateFormat: 'yy-mm-dd',
		changeYear: true,
		changeMonth: true,
		yearRange: "1950:2017",
	});		
	});


   function fnc_check_and_save()
   {
	    var picture_name=$('#picture_name').val();
		var qauta=$('#qauta').val();
		var mobile=$('#mobile').val();
		var dob=$('#dob').val();
		
		if (qauta.length ==null || qauta.length==""){ alert('Please select required Quota.'); return false; }
		if (mobile.length ==null || mobile.length =="" || mobile.length!=11){ alert('Please enter 11 digit Mobile Number.'); return false; }
		if (dob.length ==null || dob.length ==""){ alert('Please select your Date of Birth.'); return false; }
		if (picture_name.length==null || picture_name.length==""){ alert('Please brows required picture.'); return false; }
		
		var data ="action=saveallvarifieddata";
		data+=get_form_data('content');
		http.open( "POST","process/insertvarifydata.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_and_save_response;
		http.send(data); 
	}
	function fnc_check_and_save_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			if(response==102){
			window.location='index.php?act=apply/fstep';
			}
			else if(response==402){
				alert('Sorry! Data Save Error, Please try again.');
				window.location='index.php?act=apply/verify';
			}
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
                                                           ছবি , কোটার তথ্য ও  মোবাইল নম্বর  :
                    </div>
               <div class="panel-body" id="content">
              
			           <input type="hidden" name="name" id="name" value="<?php echo $row['name']?>" />
                        <input type="hidden" name="fname" id="fname" value="<?php echo $row['fname']?>" />
                        <input type="hidden" name="mname" id="mname" value="<?php echo $row['mname']?>" />
                        <input type="hidden" name="gender" id="gender" value="<?php echo $row['sex']?>" />
						
                        <input type="hidden" name="sscroll" id="sscroll" value="<?php echo $_SESSION['sscroll'];?>" />
                        <input type="hidden" name="sscreg" id="sscreg" value="<?php echo $_SESSION['sscreg'];?>" />
                        <input type="hidden" name="sscpass" id="sscpass" value="<?php echo $_SESSION['sscyear']?>" />
                        <input type="hidden" name="sscgpa" id="sscgpa" value="<?php echo $_SESSION['ssccgpa']?>" />
                        <input type="hidden" name="sscboard" id="sscboard" value="<?php echo $_SESSION['sscboard'];?>" />
                        <input type="hidden" name="sscgrp" id="sscgrp" value="<?php echo $_SESSION['sscgroup']?>" />
						
                        <input type="hidden" name="hscroll" id="hscroll" value="<?php echo $row['roll']?>" />
                        <input type="hidden" name="hscreg" id="hscreg" value="<?php echo $row['regno']?>" />
                        <input type="hidden" name="hscpass" id="hscpass" value="<?php echo $row['passyear']?>" />
                        <input type="hidden" name="hscgpa" id="hscgpa" value="<?php echo $row['gpa']?>" />
                        <input type="hidden" name="hscboard" id="hscboard" value="<?php echo $row['board']?>" />
                        <input type="hidden" name="hscgrp" id="hscgrp" value="<?php echo $row['hscgroup']?>" />
                        <input type="hidden" name="tgpa" id="tgpa" value="<?php echo $_SESSION['ssccgpa']+$row['gpa']; ?>" />
						
						
                        <input type="hidden" name="timedate" id="timedate" value="<?php echo date("Y-m-d H:i:s")?>" />
                        <input type="hidden" name="servername" id="servername" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
              
			  
			  
			   <div class="col-md-6" style="padding:0px; margin:0px;">
                        <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                            <tr><td><b>Applicant's Name:</b></td><td><?php echo $row['name']?></td></tr>
                            <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
							<tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
							<tr><td><b>Gender:</b></td><td><?php echo $gender[$row['sex']]; ?></td></tr>
							
                        </table>
                        
                        <table class="table table-striped table-hover table-bordered">
                              <input type="hidden"    id="picture_name" name="picture_name" />
                              <input type="hidden" value="<?php echo $row['id']; ?>" id="hiddenid" name="hiddenid" />
                         
                               <tr>
                                    <th>Quota: </th>
                                    <td>
                                        <select id="qauta" name="qauta" class="form-control">
										<?php foreach($quata AS $keys=>$val) {?>
                                             <option value="<?php echo $keys; ?>"><?php echo $val; ?></option>
                                         <?php } ?>
                                        </select>
                                    </td>
                            </tr>

                            <tr>
                                    <th>Mobile No.</th>
                                    <td>
                                        <input type="text" id="mobile" onpaste="return false" onkeypress="return checkaccnumber(event)" autocomplete="off" maxlength="11" name="mobile" class="form-control" />
                                    </td>
                            </tr>
							  <tr>
                                    <th>Date of Birth</th>
                                    <td>
                                        <input type="text" id="dob"  name="dob" class="form-control datepicker" />
                                    </td>
                            </tr>
                            <tr>
                             <td colspan='2'> 
                                 <button class="btn btn-primary" type="button" onclick="fnc_check_and_save()"> <span class='glyphicon glyphicon-send'></span> Submit Application </button>
                              </td>
                           </tr> 
                           
					    </table>
              </div>
              
			   <div class="col-md-6" style="padding:0px; margin:0px;">
                        <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                            <tr>
									<td style="color:red; font-weight:bolder;" colspan="2">
												 আবেদন এর জন্য আপনার মার্জিত ছবি সংগ্রহ করা হবে। ছবি  দেয়ার ক্ষেত্রে নিচের বিষয়গুলোর  প্রতি খেয়াল রাখুনঃ <br />
												১. আবেদনকারীর ছবি দৈর্ঘ্য (লম্বায়) ৩০০ পিক্সেল এবং প্রস্থ (চওড়া) ৩০০  পিক্সেল এর মধ্যে হতে হবে।<br />
												
												২. ছবির ফাইল অবশ্যই .jpg ফরম্যাটে থাকতে হবে।<br />
												
												৩. ছবিটির ফাইলের সাইজ ১৫০ KB এর মধ্যে হতে হবে।<br />
									</td>
                            </tr>
                           <tr>
                             <th>ছবি আপলোড</th>
                             <th>
                                 <form id="image_uploder">
                                    <input type="file"    id="picture_file" name="picture_file" />
                                 </form> 
                            </th>
                           </tr> 
							
                           <tr>
                             <td colspan="2"> 
                                 <div id="photo"  style="height:180px; width:180px;">
                                   <img src="images/nimage.jpg" style="height:180px; width:170px;  border:2px solid #F00; " /> 
                                </div>
                              </td>
                           </tr> 
							
                        
                        </table>
                      
                       
              </div>
			  	
           </div>
          </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>

<script>
	$(document).ready(function(e) {
	 $('#image_uploder').change( function( e ){
		$('#photo').html('<img src="images/ajax_loader.gif" />');
		$.ajax({
			url: 'picture/photo_uploder.php',
			type: 'POST',
			data: new FormData( this ),
			processData: false,
			contentType: false,
			success: function(data) 
			{
				if(data==6){
					alert('দুঃখিত ! আপনার ছবির  ফরম্যাট টি  গ্রহণযোগ্য নয়. ছবির ফাইল অবশ্যই .jpg ফরম্যাটে থাকতে হবে,   ');
					window.location='index.php?act=apply/sfstep';
				}
				else if(data==5){
				alert('দুঃখিত ! আবেদনকারীর ছবি দৈর্ঘ্য (লম্বায়) ৩০০ পিক্সেল এবং প্রস্থ (চওড়া) ৩০০ পিক্সেল এবং ছবিটির  সাইজ  ১৫০  কেবি এর মধ্যে হতে হবে। ');
				window.location='index.php?act=apply/sfstep';
				} 
				 else{
				   $('#photo').html('<img src="picture/'+data+'" style="width:150px; height:180px; border: 2px solid green;" />');
				   $('#picture_name').val(data);
				 }
			}
		});
		e.preventDefault();
	  });	

	});
</script>


