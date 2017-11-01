
 <?php $active=array(1=>"admin",2=>"user");?>

    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Active Even & Notice list
                        </div>
                        </br>
                     <!-- Setbutton -->
				<div class="panel-headingx"  style="padding-left:20px;">
							<a href='index.php?data=add_notice_event'>
                            <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                            Add New</button></a>
						
							<button type="button" onClick="fnc_delete_data()" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</div>
                         <!-- Setbutton -->
                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover" id="htmlserach"  data-page-length="10" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
									<tr>
										<th data-orderable="false" width="35">
										<input type="checkbox" onClick="allselect(this)">
										</th>
												<th  width="35">Sl</th>
												<th data-orderable="false">Title</th>
												<th>Description</th>
												<th width="100">File</th>
												
									</tr>
								</thead>
                                  <tbody id="data_load_list">
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from fbs_news_event") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA">
											<td width="35"><input type="checkbox" name="mailId[]" value="<?php echo $row['id']; ?>"></td>
											<td width="35"><?php echo $i; ?></td>
											<td><?php echo $row['event_title']; ?></td>
											<td><?php echo $row['event_description']; ?></td>
											<td  width="90"><?php echo $row['event_file']; ?></td>
											
										
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
    