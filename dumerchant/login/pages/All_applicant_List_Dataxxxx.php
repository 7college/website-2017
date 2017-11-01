      <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
        $sql2=mysql_query("select count(id) from student_info_fbs WHERE payment_status='0'");
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
                              <span class="fa fa-list-ul"></span> Verified Applicant List
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive"   width="100%">
								<thead>
                                <tr style="font-size:10px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true" width='100'>Apps ID</th>
                                        <th data-orderable="true">Name</th>
                                        <th data-orderable="true">Roll</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Bank Info.</th>
                                        <th>Challan No.</th>
										<th>Challan Date</th>
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs WHERE payment_status='0' order by id ASC  $limit") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
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
    