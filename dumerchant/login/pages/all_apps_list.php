
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> All Applicant List
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive" id="htmlserach"  data-page-length="50" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
                                <tr style="font-size:12px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true">Apps ID</th>
                                        <th data-orderable="true">Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th width="50">Accademic Year</th>
                                        <th width="50">Exprince Year</th>
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs WHERE status='0'") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
                                            <td width="120">
                                            <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank"><?php echo $row['application_id']; ?> </a></td>
											<td><?php echo $row['applicant_name']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['total_year']; ?></td>
											<td><?php echo $row['total_year_exprience']; ?></td>
                                    </tr>
                                    <?php $i++; }  die;?>
                                    </tbody>
                               </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    