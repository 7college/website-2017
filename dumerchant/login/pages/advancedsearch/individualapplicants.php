     <style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>

	<?php 
		include('../../config/config.php');
		include('../../config/common_array.php');
		extract($_REQUEST);
	
     ?>
	
                        
                       <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-responsive"   width="100%">
									<thead>
									
									<tr style="font-size:10px;">
											<th  width="35">Sl</th>
											
											<th data-orderable="true">Name</th>
											<th data-orderable="true">Father's Name</th>
											<th data-orderable="true">Mother's Name</th>
											<th data-orderable="true">Reg</th>
											<th data-orderable="true">Roll</th>
											<th data-orderable="true">Board</th>
											<th data-orderable="true">CGPA</th>
										
											
									</tr>
									</thead>
                                  <tbody>
                                    <?php
									//echo "select * from hscresult WHERE regno='$appsid' and roll='$mobileno'"; die;
                                    $i=1; 
									$sql=mysql_query("select * from hscresult WHERE regno='$reg' and roll='$roll'") or die(); 
									while($row=mysql_fetch_assoc($sql)){
									
							
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['fname']; ?></td>
											<td><?php echo $row['mname']; ?></td>
											<td><?php echo $row['regno']; ?></td>
											<td><?php echo $row['roll']; ?></td>
											<td><?php echo $board[$row['board']]; ?></td>
											<td><?php echo $row['gpa']; ?></td>
										

									</tr>
                                    <?php $i++; }  ?>
                                    </tbody>
                                    
                                    
                               </table>
                          
                               
                             