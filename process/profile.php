<?php 
	session_start();
	include('dumerchant/login/config/config.php');
	$sql=mysql_query("SELECT * FROM combile_data WHERE id='".$_SESSION['insertid']."'");
	$row=mysql_fetch_assoc($sql); 
?>
<script src="assets/fileupload.js"></script>
<script src="assets/common_function.js"></script>
    
<script type="text/javascript"  language="javascript" class="init">
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
			 if(data==5){
				   alert('Photo Invalid! Photo must be 300 X 350 pixel (width X height) and file size not more than 150KB.');
				   window.location='index.php?act=process/profile';
				 }
				 else{
			       $('#photo').html('<img src="picture/'+data+'" style="width:150px; height:180px; border: 2px solid gray;" />');
				   $('#picture_name').val(data);
				 }
			}
		});
		e.preventDefault();
	  });	
	
	});
	
	
	function fnc_save_quta()
	{
		
		
		
		var picture_name=$('#picture_name').val();
		var qauta=$('#qauta').val();
		var mobile=$('#mobile').val();
		var district=$('#district').val();
		var unit=$('#unit').val();
		
		if (unit==null || unit==""){ alert('Please select required Unit.'); return false; }
		if (qauta==null || qauta==""){ alert('Please select required Quota.'); return false; }
		if (mobile==null || mobile==""){ alert('Please select required Mobile Number.'); return false; }
		if (district==null || district==""){ alert('Please select required district.'); return false; }
		if (picture_name==null || picture_name==""){ alert('Please select required picture.'); return false; }
		
		
		var hid=$('#hiddenid').val();
		var data ="action=update_image_quata&picture_name="+picture_name+"&qauta="+qauta+"&mobile="+mobile+"&hid="+hid+"&district="+district+"&unit="+unit;
		//alert(data); return; 
		http.open( "POST","process/insertpage.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_save_quta_response;
		http.send(data); 
		
		
	}
	
	 
	function fnc_save_quta_response()
	{
		if(http.readyState == 4)
		{ 
		  var response=http.responseText;
		  //alert(response); return;
		  if(response==1){ 
		    window.location='index.php?act=process/finalprofile';
		   }
		 }
	}
		
	
 </script>
<section class="main">
  <div class="container">
      <?php include("process/uppermenu.php"); ?>
      
           <div class="panel panel-default" style="margin:0px; padding:0px;">
                    <div class="panel-heading"  style=" font-weight:bolder; color:#A27126; font-size:16px;">
                          ছবি , কোটার তথ্য ও অনন্যা প্রয়োজনীয় তথ্য :
                    </div>
               <div class="panel-body" id="content">
              
			   <div class="col-md-6" style="padding:0px; margin:0px;">
                        <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                            <tr><td><b>Application ID:</b></td><td><b><?php echo $row['application_id']?></b></td></tr>
                            <tr><td><b>Applicant Name:</b></td><td><?php echo $row['name']?></td></tr>
                            <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
							<tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
							<tr><td><b>Gender:</b></td><td><?php  if($row['gender']=='m'){ echo "Male";} else{ echo "Female";}?></td></tr>
							<tr><td><b>Date of Birth:</b></td><td><?php echo $row['dob']?></td></tr>
                        </table>
                        
                        <table class="table table-striped table-hover table-bordered">
                              <input type="hidden"    id="picture_name" name="picture_name" />
                              <input type="hidden" value="<?php echo $row['id']; ?>" id="hiddenid" name="hiddenid" />
                            <tr>
                                    <th>Unit </th>
                                    <td>
                                        <select id="unit" name="unit" class="form-control">
										<option value=""> >-Select Unit-< </option>
										<?php foreach($unit AS $key=>$val) {?>
                                             <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                         <?php } ?>
                                        </select>
                                    </td>
                            </tr>
                               <tr>
                                    <th>Quota: </th>
                                    <td>
                                        <select id="qauta" name="qauta" class="form-control">
										<option value=""> >--Select--< </option>
										<?php foreach($quata AS $key=>$val) {?>
                                             <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                         <?php } ?>
                                        </select>
                                    </td>
                            </tr>

                            <tr>
                                    <th>Mobile No.</th>
                                    <td>
                                        <input type="text" id="mobile" name="mobile" class="form-control" />
                                    </td>
                            </tr>
                            
                           
                            <tr>
                                    <th>District</th>
                                    <td>
                                          <select type="text" id="district" name="district" class="form-control">
                                           <option value=""> Select District Name </option>
                                         <?php 
										    $District=mysql_query("SELECT * FROM fbs_district_list");
										    while($rows=mysql_fetch_assoc($District)){
										  ?>
                                            <option value="<?php echo $rows['id']; ?>"><?php echo $rows['district_name_en']; ?></option>
                                         <?php } ?>
                                         </select>
                                    </td>
                            </tr>
                            
                            
							
                      
					    </table>
              </div>
              
			   <div class="col-md-6" style="padding:0px; margin:0px;">
                        <table class="table table-striped table-hover table-bordered" style="margin:0px;font-size:14px;">
                            <tr>
									<td style="color:red; font-weight:bolder;" colspan="2">
												 আবেদন এর জন্য আপনার মার্জিত ছবি সংগ্রহ করা হবে। এগুলো দেয়ার ক্ষেত্রে নিচের বিষয়গুলো খেয়াল রাখুনঃ <br />
												১. আবেদনকারীর ছবি দৈর্ঘ্য (লম্বায়) ৩৫০ পিক্সেল এবং প্রস্থ (চওড়া) ৩০০  পিক্সেল এর মধ্যে হতে হবে।<br />
												
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
							
                           <tr>
                             <td colspan="2"> 
                                 <button class="btn btn-primary" type="button" onclick="fnc_save_quta()"> <span class="glyphicon glyphicon-triangle-right"></span> Next Step </button>
                              </td>
                           </tr> 
							
                        </table>

                       
              </div>
           </div>
          </div>
        </div>
    </div>
</section>

<?php
extract($_POST);
if(@$action=='save_update_delete'){
 
    $SQL_Query= mysql_query("UPDATE add_student_info SET picture='$picture_name',quta='$quta' WHERE id='$studentId'");
    if($SQL_Query==1){
		   echo "1"; die;
		}
}

?>