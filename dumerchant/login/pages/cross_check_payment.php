
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Missiong Payment Status
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive" id="htmlserach"  data-page-length="50" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
                                <tr style="font-size:12px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true">Transection ID</th>
                                        <th data-orderable="true">T.Mode</th>
                                        <th data-orderable="true">Amount</th>
                                </tr>
								</thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from t_transactions a,fbs_fall_transetion b where a.lid=b.pid") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
											<td width=""><?php echo $row['pid']; ?></td>
											<td width=""><?php echo $row['bank_name']; ?></td>
											<td width=""><?php echo $row['amount']; ?></td>
                                      
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
    