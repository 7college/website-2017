<?php
 require_once('../config/config.php');
 require_once('../config/common_function.php');
 extract($_REQUEST);
 if($action=='save_update_delete')
 {
	 
	 if($type=='1'){
	 $SQL=mysql_query("SELECT * FROM student_info_fbs WHERE application_id='$appsID'");
	 }
	 
	 if($type=='2'){
	 $SQL=mysql_query("SELECT * FROM student_info_fbs WHERE mobile='$appsID'");
	 }
	 
	 
	 
	 $row=mysql_fetch_assoc($SQL);
	 $count=mysql_num_rows($SQL);
	 if($count==0){
		    echo '<h4 style="color:red;font-weight:bolder;" align="center">Data Not Found, Your application ID wrong.<h4>';
		 }
		 
		 else
		 {
			 
		 
			 
	?>
	       
		 <table width="100%">
             <tr>
               <td width="100%" colspan="3" align="center"> <img src="../../images/logo.jpg" style="width:90px; height:90px; margin:0px; padding:0px;" /> </td>
             </tr> 
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
               <img  src="../../process/barcode.php?text=<?php  echo $row['application_id']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />

                <span style="padding-left:20px; font-size:12px; "> <b>Apps ID: <?php echo $row['application_id'];?></b> 
                
                 <h4 style="padding-left:20px;"> <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank" style="font-weight:bolder; color:#FF0000;">[View Profile]</a></h4>
                </span>
                
               </td>
               <td width="60%" align="center">
                  <h4 style='font-weight:bolder;'>
                     <?php echo $CompanyName[1]; ?><br />
                     <?php echo $CompanyName[2]; ?><br />

					  <span style='font-size:14px;'>
                      <u> আবেদন কপি </u>
					 </span>
                 </h4>
               
               </td>
               <td width="20%"> <img src="../../picture/<?php echo $row['picture_file_data'];?>" style="width:110px; height:120px;" /></td>
             </tr>
          
	      </table>
          <br />



	    <table width="100%"  id="content" class="table table-striped table-bordered table-hover table-responsive">
             <input type="hidden" class="form-control"  value="<?php echo $row['id'];?>" name="systemId" id="systemId" />
            
             
             <tr>
               <td> Name of the Applicant: </td>
               <td colspan="3"> <?php echo $row['applicant_name'];?></td>
             </tr>
             <tr>
                <td> Father's Name: </td>
                <td> <?php echo $row['fathers_name'];?></td>
                <td> Mother's Name: </td>
                <td> <?php echo $row['mothers_name'];?></td>
             </tr>
        
             
            
             
             <tr>
                <td> Date of Birth: </td>
                <td> <?php echo $row['date_of_birth'];?></td>
                <td> Mobile: </td>
                <td> <?php echo $row['mobile'];?></td>
             </tr>
          
             
            
             
            
             
             <tr>
               <td> Quata.</td>
               <td><?php echo $QuetaArraybn[$row['quata']];?></td>
               <td> Status </td>
               <td> <?php if($row['payment_status']==1){ echo "Valid"; }else{ echo "invalid"; } ?> </td>
             </tr>
             
             <tr>
               <td colspan="4"  id="saveProcess">	<button class="btn btn-primary" onclick="fnc_Approved_Info_Active('<?php echo $row['id']; ?>')"><span class="glyphicon glyphicon-plus-sign"></span> Active</button>
               	<button class="btn btn-danger" onclick="fnc_Approved_Info_reject('<?php echo $row['id']; ?>')"><span class="glyphicon glyphicon-plus-sign"></span> Reject</button></td>
             
             </tr>
	      </table>  
		   
		   
	<?php	   
		 }
	   
 }
	
?>