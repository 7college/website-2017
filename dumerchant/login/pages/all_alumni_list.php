
 <?php $active=array(1=>"admin",2=>"user");?>
<script type="text/javascript">
/*        function fnc_cancel_data(id){
		var data="action=save_update_delete&delete_id="+id;
		//alert(data); return;
		http.open( "POST","controller/cancel_applicant_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_cancel_data_response;
		http.send(data); 
	   }
    
	    function fnc_cancel_data_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  if(response==1){ alert('Data delete successfully.'); return;}
			  
			 }
		}*/
		
</script>
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> All Alumni Member List
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive" id="htmlserach"  data-page-length="10" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
                                <tr>
                                        <th  width="35">Sl</th>
                                        <th data-orderable="false">Apps ID</th>
                                        <th data-orderable="false">Name</th>
                                        <th  width="200">E-Mail</th>
                                        <th>Mobile</th>
                                        <th>Department</th>
                                        <th>Occupation</th>
                                        <th>Country</th>
                                </tr>
								</thead>
                                  <tbody id="data_load_list">
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select *,concat(txt_first_name,' ',txt_middle_name,' ',txt_last_name)as name from fbs_alumni") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA">
											<td width="35"><?php echo $i; ?></td>
                                            <td width="120"><?php echo $row['apps_id']; ?></td>
											<td width="240"><?php echo $row['name']; ?></td>
											<td width="200"><?php echo $row['txt_email']; ?></td>
											<td><?php echo $row['txt_mobile']; ?></td>
											<td><?php echo $row['txt_department']; ?></td>
											<td> <?php echo $row['txt_occupational_details']; ?></td>
											<td> <?php echo $row['txt_country']; ?></td>
										
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
    