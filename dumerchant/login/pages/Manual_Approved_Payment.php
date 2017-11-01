<?php
	require_once('../config/config.php');
	extract($_REQUEST);

?>


							 <table class="table table-striped table-bordered table-hover table-responsive" width="100%">
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs where application_id='$apps'") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<th>Application ID</th>
                                            <td >
                                            <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank"><?php echo $row['application_id']; ?> </a></td>
                                    </tr>
                                    <tr>
                                            <th>Applicant Name</th>
                                            <td><?php echo $row['applicant_name']; ?></td>
                                     </tr>
                                     <tr>
											<th>Mobile No</th>
											<td><?php echo $row['mobile']; ?></td>
                                      </tr>
                                      <tr>
											<th>Email</th>
											<td><?php echo $row['email']; ?></td>
                                     </tr>

                                    <tr>
                                           <?php
												$select=mysql_query("SELECT lid,payment_data from t_transactions where s_id='".$row['id']."'");
												$rowx=mysql_fetch_assoc($select);
											
										   ?>
                                            <th>Ssl ID</th>
                                            <td><?php echo $rowx['lid']; ?></td>
                                         </tr>
                                         <tr>
                                            <th>Payment Data</th>
                                            <td colspan="3"><?php echo $rowx['payment_data']; ?></td>
                                         </tr>
                                         <tr>
                                            <th>Last Update</th>
                                            <td><?php echo $rowx['payment_lastupdate']; ?></td>

									    </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><?php if($row['payment_status']==3){ echo "<font color='green'>Paid</font>";} else { echo "<font color='red'>Unpaid</font>";} ?></td>
										</tr>
                                        <tr>
                                         
                                        <td colspan="2">
                                            <input type="button" value="Approved"  onclick="fnc_save_Info('<?php echo $row['id']; ?>')"/></td>
                                    </tr>
                                    
                               
                                    
                                    
                                    
                                    <?php $i++; } ?>
                                
                    </table>