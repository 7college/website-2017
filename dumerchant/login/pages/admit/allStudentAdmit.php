	<style>#page a { text-decoration:none;cursor:pointer;color:#fff;padding:5px; background:#0072C6;}	</style>
    <?php 
        $sql2=mysql_query("select count(id) from fbs_course_reg");
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
                              <span class="fa fa-list-ul"></span> Admit Card
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover table-responsive" width="100%" >
								<thead>
                                <tr style="font-size:12px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true">Nu Reg.</th>
										<th data-orderable="true">Du Reg.</th>
                                        <th data-orderable="true">Name</th>
                                        <th data-orderable="true">F.Name</th>
                                        <th data-orderable="true">M.Name</th>
                                       
                                       
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from fbs_course_reg $limit") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
                                            <td width="120">
                                            <a href='pages/admit/admit_card_view.php?pid=<?php echo $row['dureg']; ?>' target="_blank"><?php echo $row['dureg']; ?> </a></td>
											<td><?php echo $row['nureg']; ?></td>
											<td><?php echo $row['stname']; ?></td>
											<td><?php echo $row['fname']; ?></td>
											<td><?php echo $row['mname']; ?></td>
											
										
                                    </tr>
                                    <?php $i++; }  ?>
                                     </tbody>
                                      <tr>
                                       <td colspan="7" align="right">
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
    