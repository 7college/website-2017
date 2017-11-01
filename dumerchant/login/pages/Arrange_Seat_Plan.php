		<?php include('../common/common_function.php'); 
        $sqlBaban=mysql_query("SELECT * FROM fbs_manage_center");
        while($rowBhaban=mysql_fetch_assoc($sqlBaban)){
			$BhabanNameArray[$rowBhaban['id']]=$rowBhaban['center_name'];
		}
        $sqlRoom=mysql_query("SELECT * FROM  fbs_room_setup");
        while($rowRoom=mysql_fetch_assoc($sqlRoom)){
			$RooMNameArray[$rowRoom['id']]=$rowRoom['room_no'];
			$RooMBahanNameArray[$rowRoom['id']]=$rowRoom['baban_name'];
			$RooMFloorNameArray[$rowRoom['id']]=$rowRoom['floor_no'];
		}
       ?>
	<script type="text/javascript">

     function fnc_dataSearch()
	 {

        if(fn_validation('centerName*room_no*roll_from*roll_from')==0) return;
	    var center_name=$('#room_no').val();
	    var roll_from=$('#roll_from').val();
	    var roll_to=$('#roll_to').val();
		var data ="action=save_update_delete&center_name="+center_name+'&roll_from='+roll_from+'&roll_to='+roll_to;
		//alert(data);
		http.open( "POST","pages/include/arrange_seat_plan_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_dataSearch_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_dataSearch_response()
	{
		if(http.readyState == 4)
		{ 
		   var response=http.responseText;
			if(response==1)
			{ 
			   alert('Center Assign Successfully.');
			   window.location='index.php?data=Arrange_Seat_Plan';
			   return;
			} 
			
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
                              <span class="fa fa-list-ul"></span> Seat Allocation
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                       <div class="col-md-12">
                             <table class="table table-striped table-bordered table-hover table-responsive"  align="center" width="100%" >
                                   
								   <tr>
										<th>Center</th>
										<th>Room </th>
										<th> Roll From</th>
										<th> Roll to</th>
										<th> Action</th>
								   </tr>
								   
								   <tr class="odd gradeA" style="font-size:12px;">
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
										  <td>
										  <span id='roomId'>
                                          <select class="form-control"   id="room_no" name="room_no">
                                             <option value=""> >--select--< </option>
										
										  </span>
                                          </td>
                                           
                                           
                                           <td>  <input type="text" name="roll_from"    id="roll_from" class="form-control" /></td>
                                          
                                          
                                          <td>  <input type="text" name="roll_to"  id="roll_to" class="form-control" /></td>
                                          
										  <td><button  class="btn btn-warning"  onclick="fnc_dataSearch()"> Assign </button></td>
                                    </tr>
                               </table>
                               
                            </div>
                              <div class="col-md-12">  
                    <table class="table table-striped table-bordered table-hover table-responsive" id="htmlserach"  data-page-length="50" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
								<tr style="font-size:12px;"> 
									<th width="35">Sl</th>
                                    <th>Center Name</th>																		
									<th>Roll From</th>																		
									<th>Roll to</th>																		
									<th>Capasity</th>																		
								</tr>
							</thead>
							<tbody>
                                <?php
								$i=1;
								$SQL= mysql_query("SELECT * FROM  fbs_seat_plan  order by id DESC");
								while($ROW= mysql_fetch_assoc($SQL)){
								?>
								<tr style="font-size:12px;">
									<td><?php echo $i ?></td>
									<td><?php echo $BhabanNameArray[$RooMBahanNameArray[$ROW['center_name']]] ?> --> <?php echo $RooMNameArray[$ROW['center_name']] ?></td>
									<td width="100"><?php echo $ROW['roll_from'] ?></td>
									<td width="100"><?php echo $ROW['roll_to'] ?></td>
									<?php
									  $SQl333=mysql_query("Select * from student_info_fbs WHERE room_no='".$ROW['center_name']."'");
									  $count=mysql_num_rows($SQl333);
									?>
									
									<td width="80" align='center'><?php echo $count; ?><?php $total+=$count; ?></td>
								</tr>
                                <?php $i++; } ?>
                                
                                
							</tbody>
                                <tr>
                                   <th colspan="5" style="text-align:right; padding-right:60px;">  Assign total Seat: &nbsp;<?php echo number_format($total);?></th>
                                </tr>
							</table>  
                           </div>
                               
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    