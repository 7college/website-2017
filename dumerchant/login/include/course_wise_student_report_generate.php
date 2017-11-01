
    <?php
	   session_start();
	   include('../config/config.php');
	   
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
			$student_name_array_batch[$student_array['student_id']]=$student_array['student_batch'];
			$student_name_array_email[$student_array['student_id']]=$student_array['student_email'];
			$student_name_array_phone[$student_array['student_id']]=$student_array['student_phone'];
			
		}

	 extract($_REQUEST);
	 if($action='data_save_update')	 {   
	?>
                            <table class="table table-striped table-bordered table-hover table-responsive" width="100%" >
                              <?php
							    //echo "select * from fbs_faculty_info where id='$faculty'"; die;
							    $sql_details=mysql_query("select * from fbs_faculty_info where id='$txt_faculty_id'");
								$row_faculty=mysql_fetch_assoc($sql_details);
							
							  
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
           

                                  <tr style="font-size:10px;">
                                        <th  width="15">Sl</th>
                                        <th data-orderable="false"  align="left">#ID</th>
                                        <th data-orderable="false" align="left">Name of student</th>
                                        <th data-orderable="false" align="center">Batch</th>
                                        <th data-orderable="false" align="left">Email</th>
                                        <th data-orderable="false" align="left">Phone No</th>
                
                                 </tr>








                                 <tbody id="">
                                    <?php
									//echo "select *,b.id as tbid from fbs_assign_course a,fbs_tabulation_sheet b where a.id=b.mst_id and a.semester_id=$txt_semister_id and a.faculty_id=$txt_faculty_id and a.course_id=$txt_course_id"; die;
                                    $i=1; 
                                    $sql=mysql_query("select *,b.id as tbid from fbs_assign_course a,fbs_tabulation_sheet b where a.custom_course_id=b.course_code and a.semester_id=$txt_semister_id and a.faculty_id=$txt_faculty_id and a.course_id=$txt_course_id") or die(); 
                                    while($row_main=mysql_fetch_assoc($sql)){
                                    ?>
                         
                                            <tr class="odd gradeA" style="font-size:14px;">
											<td width="15"><?php echo $i; ?></td>
											<td style="font-weight:bolder;" width="110"><?php echo $row_main['student_id']; ?> </td>
											<td  style="font-weight:bolder;" width="250"><?php echo $student_name_array[$row_main['student_id']] ?></td>
											<td  style="font-weight:bolder;" width="250"><?php echo $student_name_array_batch[$row_main['student_id']] ?></td>
											<td  style="font-weight:bolder;" width="250" align="left"><?php echo $student_name_array_email[$row_main['student_id']] ?></td>
											<td  style="font-weight:bolder;" width="250" align="left"><?php echo $student_name_array_phone[$row_main['student_id']] ?></td>
                                          </tr> 
                                          
                                    <?php $i++; }  die;?>
                     </tbody>
                     </table>
                           
  <?php } ?>