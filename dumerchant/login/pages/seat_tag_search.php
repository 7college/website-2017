    <?php include('../common/common_function.php'); ?>

   
    <script src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">

     function fnc_dataSearch()
	 {

        //if(fn_validation('room_no')==0) return;
	    var room_no=$('#room_no').val();
		var data ="action=save_update_delete&room_no="+room_no;
		http.open( "POST","report/seat_tag.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_dataSearch_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_dataSearch_response()
	{
		if(http.readyState == 4)
		{ 
	           var response=http.responseText;
			   window.open(response);
		}
	}
	
	 function fnc_dataSearch_load_room()
	 {

       //if(fn_validation('room_no')==0) return;
	    var centerName=$('#centerName').val();
		var data ="action=save_update_delete&centerName="+centerName;
		http.open( "POST","include/Load_Room_Data.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_dataSearch_load_room_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_dataSearch_load_room_response()
	{
		if(http.readyState == 4)
		{ 
	           var response=http.responseText;
			  // alert(response);
			   $('#roomId').html(response);
		}
	}
	
	
	
	
    </script>
    <div id="page-inner"  style="background:#FFFFFF;">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Generate Seat Label  
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover table-responsive"  align="center" width="100%" >
                                    <tr class="odd gradeA" style="font-size:12px;">
                                  
                                          
                                           <th>Center Name</th>
                                            <td>
                                            <select id="centerName" class="form-control" onchange='fnc_dataSearch_load_room()' name="centerName">
                                                  <option value=""> >-- Select-< </option>
													<?php 
                                                    $SqlCenter=mysql_query("SELECT * FROM  fbs_manage_center");
                                                    while($RowCenter=mysql_fetch_assoc($SqlCenter)){
                                                    ?>
                                                    <option value="<?php echo $RowCenter['id']; ?> "> <?php echo $RowCenter['center_name']; ?></option>
                                                    <?php } ?>
                                            </select>
                                            </td>
                                            <th>Room No.</th>
                                            <td>
											<span id="roomId">
												<select id="room_no" class="form-control" name="room_no">
													  <option value=""> >-- Select-< </option>
													
												</select>
											 </span>
                                            </td>
                                          
										  <td><button  class="btn btn-warning"  onclick="fnc_dataSearch()"> Search </button></td>
	
                                      
                                    </tr>
                               </table>
                               <div id="HTML_VIEW" align="center"></div>
                               
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    