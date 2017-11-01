	<script type="text/javascript">
     function fnc_save_Info()
	 {

        if(fn_validation('center_name*capasity')==0) return;
		var center_name=$('#center_name').val();
		var capasity=$('#capasity').val();
		var systemID=$('#systemID').val();
		var data ="action=save_update_delete&center_name="+center_name+"&capasity="+capasity+'&systemID='+systemID;
		http.open( "POST","pages/include/manage_center_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_data_save_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_data_save_response()
	{
		if(http.readyState == 4)
		{ 
		  var response=http.responseText;
		  //alert(response); return;
		  if(response==1){ 
		  alert('Data Save Successfully.');
		  } 
		  if(response==2){ 
		  alert('Update Save Successfully.');
		  } 
		  window.location='index.php?data=Manage_Center';
		  return;
		  } 
   }
	
		
 function fnc_get_list_view(uid)
  {
	    var data ="action=get_list_view&uid="+uid;
		http.open( "POST","pages/include/manage_center_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_get_list_view_response;
		http.send(data); 
  }
  
  function fnc_get_list_view_response()
  {
		if(http.readyState == 4)
		{ 
		   var response=http.responseText;
		   eval(response);
		}
  }
	
    </script>
    <div id="page-inner"  style="background:#FFFFFF;">     
            <div class="row"  style="margin:0px; padding:0px;" id="content">

                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span>  Add New Center
                        </div>
                          <div class="col-md-12">
                          <br />
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <tr>
                                    <td>Center Name</td>
                                    <input type="hidden" name="systemID"  value="0" id="systemID" class="form-control"/>
                                    <td><input type="text" name="center_name"  id="center_name" class="form-control"/></td>
                                     <td>Capasity</td>
                                    <td><input type="text" name="capasity" id="capasity" class="form-control" /></td>              
                                    <td><button class="btn btn-primary" onclick="fnc_save_Info()"><span class="glyphicon glyphicon-plus-sign"></span> Save</button></td>
                                </tr>
                            </table>
                           </div> 
                          <div class="col-md-12">  
                    <table class="table table-striped table-bordered table-hover table-responsive" id="htmlserach"  data-page-length="50" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
								<tr style="font-size:12px;"> 
									<th width="35">Sl</th>
                                    <th>Center Name</th>																		
									<th>Capasity</th>																		
									<th>Status</th>																		
								</tr>
							</thead>
							<tbody>
                                <?php
								$i=1;
								$SQL= mysql_query("SELECT * FROM  fbs_manage_center  order by id DESC");
								while($ROW= mysql_fetch_assoc($SQL)){
								?>
								<tr style="font-size:12px;" onclick="fnc_get_list_view('<?php echo $ROW['id']?>')">
									<td><?php echo $i ?></td>
									<td><?php echo $ROW['center_name'] ?></td>
									<td width="100"><?php echo $ROW['capasity'] ?></td>
									<td width="100"><?php  if($ROW['status']==1){ echo "Active"; } ?></td>
								</tr>
                                <?php $i++; } ?>
							</tbody>
							</table>  
                        </div>
        <!--End Advanced Tables -->
       </div>
    </div>
        <!-- /. ROW  -->
 </div>
    