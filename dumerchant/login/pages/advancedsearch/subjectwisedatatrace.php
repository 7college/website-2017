     <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
		include('../../config/config.php');
		include('../../config/common_function.php');
		extract($_REQUEST);
		//print_r($_REQUEST);
		//$sql2=mysql_query("select count(id) from fbs_course_reg WHERE collegecode='$college' and subcode='$sub'");
		//$row=mysql_fetch_row($sql2);
		//$rows=$row[0];
		//include('../pagination.php');
     ?>
	
                        
                       <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-responsive"   width="100%">
									<thead>
									<tr>
									   <th colspan='9'><a  target='_blank' href='report/admit_view.php?cid=<?php echo $college; ?>&sid=<?php echo $sub;?>'><button  class="btn btn-danger" ><span class="glyphicon glyphicon-print"></span> Print Preview</button></a></th>
									</tr>
									<input type='hidden' id='cid' name='cid' value="<?php echo $college; ?>"/>
									<input type='hidden' id='sid' name='sid' value="<?php echo $sub; ?>"/>
									<tr>
									  <th colspan='9' style='background:#F6F6F6;'>
									       All Student Data From College: <?php echo $collegearray[$college]; ?>[<?php echo $college; ?>] / Subject: <?php echo $subarray[$sub]; ?>[<?php echo $sub; ?>]
										   / Total Student:
											<?php										   
											$sql2=mysql_query("select * from fbs_course_reg WHERE collegecode='$college' and subcode='$sub' order by id ASC  $limit") or die(); 
											$count=mysql_num_rows($sql2);
											echo $count;
										   ?>
									  </th>
									</tr>
									<tr style="font-size:10px;">
											<th  width="35">Sl</th>
											<th data-orderable="true" width='100'>DU ID</th>
											<th data-orderable="true" width='100'>Exam Roll</th>
											<th data-orderable="true" width='100'>NU ID</th>
											<th data-orderable="true">Name</th>
											<th data-orderable="true">Father's Name</th>
											<th data-orderable="true">Mother's Name</th>
											<th data-orderable="true">Session</th>
											<th data-orderable="true">S.Type</th>
											
									</tr>
									</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from fbs_course_reg WHERE collegecode='$college' and subcode='$sub' order by id ASC  $limit") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
											<td><a href='pages/admit/admit_card_view.php?pid=<?php echo $row['dureg']; ?>' target="_blank"><?php echo $row['dureg']; ?></a></td>
											<td><?php echo $row['examroll']; ?></td>
											<td><?php echo $row['nureg']; ?></td>
											<td><?php echo $row['stname']; ?></td>
											<td><?php echo $row['fname']; ?></td>
											<td><?php echo $row['mname']; ?></td>
											<td><?php echo $row['sessionid']; ?></td>
											<td><?php  if($row['ctype']==1 || $row['ctype']==2 || $row['ctype']==3){ echo $stype[$row['ctype']];} else { echo $row['ctype']; }  ?></td>
									</tr>
                                    <?php $i++; }  ?>
                                    </tbody>
                                    
                                    
                               </table>
                          
                               
                             