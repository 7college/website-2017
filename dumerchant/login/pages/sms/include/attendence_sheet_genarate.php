    <?php
	   session_start();
	   include('../../../config/config.php');
	   
			$sql_semester=mysql_query("select * from fbs_semester") or die(); 
		while($smstr_array=mysql_fetch_array($sql_semester)){
			$semester_array[$smstr_array['id']]=$smstr_array['semester_title'];
		}
		
		$sql_faculty=mysql_query("select * from fbs_faculty_info") or die(); 
		while($faculty_array=mysql_fetch_array($sql_faculty)){
			$faculty_name_array[$faculty_array['id']]=$faculty_array['faculty_name'];
			$faculty_name_arrays[$faculty_array['id']]=$faculty_array['faculty_id'];
		}
		
		$sql_course=mysql_query("select * from  fbs_course") or die(); 
		while($course_array=mysql_fetch_array($sql_course)){
			$course_name_array[$course_array['id']]=$course_array['course_title'];
			$course_name_arrays[$course_array['id']]=$course_array['course_code'];
		}
		$sql_student=mysql_query("select * from  fbs_student_info") or die(); 
		while($student_array=mysql_fetch_array($sql_student)){
			$student_name_array[$student_array['student_id']]=$student_array['student_name'];
			$student_name_arrays[$student_array['student_id']]=$student_array['student_id'];
			$student_phone_arrays[$student_array['student_id']]=$student_array['student_phone'];
			$student_name_array_batch[$student_array['student_id']]=$student_array['student_batch'];
			
		}

	 extract($_REQUEST);
	 if($action='data_save_update')	 {   
	?>
                            <table class="table table-striped table-bordered table-hover table-responsive" width="100%" >
                              <?php
							    //echo "select * from fbs_faculty_info where id='$faculty'"; die;
							    $sql_details=mysql_query("select * from fbs_faculty_info where id='$txt_faculty_id'");
								$row_faculty=mysql_fetch_assoc($sql_details);
							
							  //echo $txt_course_id; die;
							  ?>
                              
							       
                                <tr>
                                   <th colspan="18">Department of Management Information Systems</th>
                                 </tr>
                               
                                <tr>
                                   <td colspan="18"><b>Faculty name:</b> <?php echo $row_faculty['faculty_name']?></td>
                                 </tr>
                                 <tr>
                                   <td colspan="18"><b>Course name:</b> <?php echo $course_name_array[$txt_course_id];?> -(<?php echo $course_name_arrays[$txt_course_id]; ?>)</td>
                                 </tr>
                               
                               
									<tr>
										<td colspan='6'width="100%">
											<div class="control-group">
											<label class="control-label"> Message </label>
												<div class="controls">
													<textarea id="message" name="message" rows="3" class="span6 " style="width:70%" required></textarea>
												</div>                  
											</div>
										</td>
									</tr>
								    <tr>
										<td colspan='6'width="100%">
											<div class="control-group">
											<label class="control-label"> Phone No </label>
												<div class="controls">
													<textarea id="phone" name="phone" rows="5" class="span6 " style="width:100%" required></textarea>
												</div>                  
											</div>
										</td>
									</tr>
                                   <tr>
						
									 <td colspan='3'><button class="btn btn-primary" onclick="fnc_sytem()"><span class="glyphicon glyphicon-plus-sign"></span> Send SMS</button></td>
									 <td colspan='1'><button class="btn btn-warning" onclick="clear_fns()"><span class="glyphicon glyphicon-plus-sign"></span> Clear</button></td>
								   </tr>
							   


                                  <tr style="font-size:10px;">
                                        
										<th data-orderable="true" width="15"><input type="checkbox" onClick="allselect(this),fbs_All_Phone_No()" /></th>
										<th  width="15">Sl</th>
                                        <th data-orderable="false" width="50" align="left">#ID</th>
                                        <th data-orderable="false" align="left">Name of student</th>
										<th data-orderable="false" align="left">Contact No</th>
										<th data-orderable="false" align="left">Batch</th>
                                      
                                 </tr>








                                 <tbody id="">
                                    <?php
									//echo "select *,b.id as tbid from fbs_tabulation_sheet b where  b.semester='$txt_semister_id' AND b.course_code='$txt_course_id'" ; die;
                                    $i=1; 
                                    $sql=mysql_query("select *, b.student_id as stID from fbs_tabulation_sheet a,fbs_student_info b where a.student_id=b.student_id and b.student_phone!=0 and a.semester='$txt_semister_id' AND a.course_code='$txt_course_id'") or die(); 
                                    while($row_main=mysql_fetch_assoc($sql)){
                                    ?>
                         
											<tr class="odd gradeA" style="font-size:10px;">
											    <td><input type="checkbox"  name="mailId[]" onClick="fbs_All_Phone_No()" value="<?php echo $row_main['student_phone'] ?>"></td>
												<td width="15"><?php echo $i; ?></td>
												<td style="font-weight:bolder;" width="110"><?php echo $row_main['stID']; ?> </td>
												<td  style="font-weight:bolder;" width="250"><?php echo $row_main['student_name'] ?></td>
												<td  style="font-weight:bolder;" width="250"><?php echo $row_main['student_phone'] ?></td>
												<td  style="font-weight:bolder;" width="250"><?php echo $row_main['student_batch'] ?></td>				
											</tr> 
                                          
                                    <?php $i++; }  die;?>
                     </tbody>
                     </table>
                           
  <?php } ?>