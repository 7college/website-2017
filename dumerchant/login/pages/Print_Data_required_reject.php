    <script>
	  function allselect(source)
		{
		    checkboxes = document.getElementsByName('mailId[]');
			for(var i=0; i<checkboxes.length;i++)
			{
			  checkboxes[i].checked = source.checked;
			}
		}	
		
	  function fbs_All_Phone_No()
		 {	
		
			var data='';
			//alert(data);
			var cboxes = document.getElementsByName('mailId[]');
			for (var i=0; i<cboxes.length; i++) {
			data+=(cboxes[i].checked)?cboxes[i].value+',':'';
			}
			
				var data='action=list_view&id='+data;
				//alert(data);

			    http.open( "POST","report/print_pagess.php",true);
				http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				http.onreadystatechange = fbs_All_Phone_No_response;
				http.send(data); 
			
		 }		
		 function fbs_All_Phone_No_response()
			{
				if(http.readyState == 4)
				{ 
				   var response=http.responseText;
				   window.open(response);
				}
			}
			
	
	
	
   function fnc_save_valid_applicant(id)
	 {
		//alert(id);
		$('#accept'+id).html('<font color="red">Valid</font>');
		var data ="action=save_update_delete&id="+id;
		http.open( "POST","controller/Reject_Valid_Student_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_save_valid_applicant_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_save_valid_applicant_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  $('#accept'+response).html('<font color="red">Valid</font>');  
			
			  
			 }
		}
		
		
		
   
   
	
			
			
	</script>
    
      <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
        $sql2=mysql_query("select count(id) from student_info_fbs WHERE payment_status='1'");
        $row=mysql_fetch_row($sql2);
        $rows=$row[0];
        include('pages/pagination.php');
     ?>
	<div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Reject Applicant List
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive"   width="100%">
								<thead>
                                <tr>
                                 <td colspan="10"> <button class="btn btn-danger" onclick="fbs_All_Phone_No()"><span class="glyphicon glyphicon-plus-sign"></span> Print</button></td>
                                </tr>
                                <tr style="font-size:10px;">
                                  		<th data-orderable="true" width="15"><input type="checkbox" onClick="allselect(this)" /></th>
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true" width='100'>Apps ID</th>
                                        <th data-orderable="true">Name</th>
                                        <th data-orderable="true">Roll</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Bank Info.</th>
                                        <th>Challan No.</th>
										<th>Challan Date</th>
									    <th>Action</th>
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs WHERE payment_status='1' order by id ASC  $limit") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td><input type="checkbox"  name="mailId[]" onClick="fbs_All_Phone_No()" value="<?php echo $row['application_id']; ?>"></td>
											<td width="35"><?php echo $i; ?></td>
                                            <td width='100'>
                                            <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank"><?php echo $row['application_id']; ?> </a></td>
											<td><?php echo $row['applicant_name']; ?></td>
											<td><?php echo $row['exam_roll_no']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['bank_name']; ?><br /><?php echo $row['branch_name']; ?></td>
											<td><?php echo $row['challan_no']; ?></td>
                                    	    <td><?php echo $row['challan_date']; ?></td>
                                    	      <?php
											$sql2=mysql_query("select count(id) as tid from student_info_fbs WHERE id='".$row['id']."' AND payment_status='0'") or die(); 
											$count=mysql_fetch_assoc($sql2);
											if($count['tid']=='1'){
												echo "<td><font color='red'>Valid</font></td>";
											}
											else{
											?>
											<td id="accept<?php echo $row['id']; ?>"><button onclick="fnc_save_valid_applicant('<?php echo $row['id']; ?>')">Valid</button></td>
											<?php } ?>
									</tr>
                                    <?php $i++; }  ?>
                                    </tbody>
                                    <tr>
                                       <td colspan="9" align="right">
                                            <div id="page">
                                            <?php echo $textline1;?>  <?php echo $textline2; ?> &nbsp;&nbsp;
                                          
                                               <?php echo $paginationCtrls; ?> 
                                               <a href="<?php echo $actual_link ?>&pn=<?php echo $lastPage; ?>" style="background:#0072C6; color:#fff; font-weight:bolder;"/> Last
                                            
                                            </div>
                                            
                                       </td>
                                    </tr>
                                    
                               </table>
                          
                               
                               
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    