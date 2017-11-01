
 <?php $active=array(1=>"admin",2=>"user");?>

    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> All Active User
                        </div>
                        </br>
                     <!-- Setbutton -->
				<div class="panel-headingx"  style="padding-left:20px;">
							<a href='index.php?data=add_new_user'>
                            <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Add New</button></a>
						
							
						</div>
                         <!-- Setbutton -->
                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover" id="htmlserach"  data-page-length="10" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
									<tr style='font-size:12px;'>
										
												<th  width="35">Sl</th>
												<th data-orderable="false">User Id</th>
												<th>Name of the user</th>
												<th>Email</th>
												<th>Phone</th>
												<th data-orderable="false">User Type</th>
												<th data-orderable="false">Status</th>
												<th>Action</th>
									</tr>
								</thead>
                                  <tbody id="data_load_list">
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from fbs_user") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style='font-size:12px;'>
									
											<td width="35"><?php echo $i; ?></td>
											<td width="90"><?php echo $row['user_name']; ?></td>
											<td><?php echo $row['full_name']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td> <?php echo $row['phone']; ?></td>
											<td><?php  if($row['user_type']==1){ echo 'Admin';}else { echo 'User';}; ?></td>
											<td><?php  if($row['status']==1){ echo 'Active';}else { echo 'InActive';}; ?></td>
											<td><button type="button" onClick="fnc_delete_data()" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button></td>
										
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
    