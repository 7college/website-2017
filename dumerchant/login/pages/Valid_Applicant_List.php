    <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
        $sql2=mysql_query("select count(id) from student_info_fbs where payment_status='1'");
        $row=mysql_fetch_row($sql2);
        $rows=$row[0];
        include('pages/pagination.php');
     ?>
   
   <script>
   function fnc_save_valid_applicant(id)
	 {
		//alert(id);
		$('#accept'+id).html('<font color="red">Reject</font>');
		var data ="action=save_update_delete&id="+id;
		http.open( "POST","controller/Accept_Valid_Student_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_save_valid_applicant_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_save_valid_applicant_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  $('#accept'+response).html('<font color="red">Reject</font>');  
			
			  
			 }
		}
		
		
		
   
   
   </script>
   <?php include('pages/pagination.php'); ?>
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="glyphicon glyphicon-th"></span> All Valid Applicant Data List
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-responsive" width="100%">
								<thead>
                                <tr style="font-size:10px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true" width='100'>Apps ID</th>
                                        <th data-orderable="true">Name</th>
                                        <th data-orderable="true">F.Name</th>
                                        <th data-orderable="true">M.Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
										<th>P.Status</th>										
										<th>Apply Date</th>
										
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs where payment_status='1' order by id ASC $limit") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
                                            <td width='100'>
                                            <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank"><?php echo $row['application_id']; ?> </a></td>
											<td><?php echo $row['applicant_name']; ?></td>
											<td><?php echo $row['fathers_name']; ?></td>
											<td><?php echo $row['mothers_name']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
											<td><?php echo $row['email']; ?></td>
										    <td><?php if($row['payment_status']==1){ echo "Paid"; } else { echo "Unpaid"; }?></td>
                                    	    <td><?php echo $row['appsDate']; ?></td>

									</tr>
                                    <?php $i++; }?>
								</tbody>
                                     <tr>
                                       <td colspan="10" align="right">
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
    