    <script src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">

     function fnc_save_Info()
	 {

        if(fn_validation('baban_name*room_no*capasity')==0) return;
		var data ="action=save_update_delete";
		data+=get_form_data('content');
		http.open( "POST","controller/Room_Setup_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_data_save_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_data_save_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  if(response==1){ alert('Data Save successfully.'); 
			  window.location='index.php?data=Room_Setup';
			  return;
			  
			  } 
			}
		}
		
		<?php 
		$SqlBhabanArray=mysql_query("SELECT * FROM  fbs_manage_center");
		while($BhRowArray=mysql_fetch_assoc($SqlBhabanArray)){
		    $array_bahana_name[$BhRowArray['id']]=$BhRowArray['center_name'];
		
		}
		
		?>
		
	
    </script>
    <div id="page-inner"  style="background:#FFFFFF;">     
            <div class="row"  style="margin:0px; padding:0px;" id="content">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span>  Room Setup
                        </div>
                    
                            <table class="table table-striped table-bordered table-hover table-responsive" style="width:500px;">
                            <tr>
                                <td> Bhaban Name</td>
                                <td> 
                                  <select type="text" name="baban_name"  id="baban_name" class="form-control" >
                                  <option value=""> >-- Select-< </option>
                                  <?php 
								    $SqlBhaban=mysql_query("SELECT * FROM  fbs_manage_center");
									while($BhRow=mysql_fetch_assoc($SqlBhaban)){
								   ?>
                                      <option value="<?php echo $BhRow['id']; ?> "> <?php echo $BhRow['center_name']; ?></option>
                                  <?php } ?>
                                </select>
                                </td>
                            </tr>
                            
                       
                            <tr>
                                <td> Room No</td>
                                <td> <input type="text" name="room_no"  id="room_no" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td> Capasity</td>
                                <td><input type="text" name="capasity" id="capasity"   class="form-control" /></td>              
                            </tr>
                             <tr>
               <td colspan="2">	<button class="btn btn-primary" onclick="fnc_save_Info()"><span class="glyphicon glyphicon-plus-sign"></span> Save</button></td>
             
                               </tr>
                            </table>
                              
                               
             </div>
             
              <table class="table table-striped table-bordered table-hover table-responsive" width="100%">
                  <tr style="height:20px;">
                    <th>Center Name</th>
                    <th>Room</th>
                    <th>Capasity</th>
                  </tr>
                  <?php
				     $sqlRes=mysql_query("SELECT * FROM  fbs_room_setup");
					 while($RowReport=mysql_fetch_assoc($sqlRes)){
				  ?>
                  <tr style="height:20px;">
                    <td><?php echo $array_bahana_name[$RowReport['baban_name']] ?></td>
                   
                    <td><?php echo $RowReport['room_no'] ?></td>
                    <td width="100"><?php echo $RowReport['capasity'] ?></td>
                  </tr>
               <?php } ?>
             </table>
             
           </div>
          </div>
        <!--End Advanced Tables -->
       </div>
    </div>
        <!-- /. ROW  -->
 </div>
    