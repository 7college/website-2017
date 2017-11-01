<?php include("config/common_function.php"); ?>	
<section>
    <div class="container">
      <div class="row">
       <div class="container">
       
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title" style="color:white;"> Course Information</h3>
		</div>
		<div class="panel-body">

					<div class="col-md-12">
					<br />
						<table class="table table-striped table-bordered table-hover table-responsive">
						   <tr>
								<th width='40'>Sl#</th>
								<th width='40'>Course<br/> Code</th>
								<th>Course Name</th>
								<th>Subject Name</th>
								<th>Status</th>
						   </tr>
							<?php
                                $i=1;							
								$sqlcourseArray=mysql_query("SELECT * FROM fbs_course");
								while($rowCourseArray=mysql_fetch_assoc($sqlcourseArray)){
							?>                               
						   <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $rowCourseArray['coursecode']; ?></td>
								<td><?php echo $rowCourseArray['coursename']; ?></td>
								<td><?php echo $subarray[$rowCourseArray['subject_code']]; ?></td>
								<td><?php echo $version[$rowCourseArray['course_status']]; ?></td>
							</tr>
							<?php $i++; } ?>
						</table>
					</div> 
                         
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>