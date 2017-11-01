    <script src="assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript">

     function fnc_save_Info()
	 {

        if(fn_validation('baban_name*floor_name*room_no*capasity')==0) return;
		var data ="action=save_update_delete";
		data+=get_form_data('content');
		http.open( "POST","controller/default_seat.php",true);
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
			  if(response==1){ alert('Setting Change Successfully successfully.'); 
			  window.location='index.php?data=Default_roomSetup';
			  
			  return;
			  
			  } 
			}
		}
		
	 function fnc_room()
	 {
       var baban_name= $('#baban_name').val();
       var floor_name= $('#floor_name').val();
		var data ="action=reload_room_no&baban_name="+baban_name+"&floor_name="+floor_name;
		http.open( "POST","controller/reload_page.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_room_response;
		http.send(data); 
		 
     }
	 
	 
	   function fnc_room_response()
		{
			if(http.readyState ==4)
			{ 
			  var response=http.responseText;
			  
			  $('#room').html(response);
			}
		}


     function fnc_capacity()
	 {
		var baban_name= $('#baban_name').val();
		var floor_name= $('#floor_name').val();
		var room_no= $('#room_no').val();
		var data ="action=reload_capacity&baban_name="+baban_name+"&floor_name="+floor_name+'&room_no='+room_no;
		http.open( "POST","controller/reload_page.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_capacity_response;
		http.send(data); 
		 
     }
	 
	 
	   function fnc_capacity_response()
		{
			if(http.readyState ==4)
			{ 
			  var response=http.responseText;
			  
			  $('#capasity').val(response);
			}
		}
		
			
	
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
                                  <?php foreach ($bhabanNo as $key=>$val){ ?>
                                      <option value="<?php echo $key; ?> "> <?php echo $val; ?></option>
                                  <?php } ?>
                                </select>
                                </td>
                            </tr>
                            
                        <tr>
                                <td> Floor Name</td>
                                <td> 
                                
                                <select type="text" name="floor_name" onchange="fnc_room()"  id="floor_name" class="form-control" >
                                  <option value=""> >-- Select-< </option>
                                  <?php foreach ($floor_no as $key=>$val){ ?>
                                  <option value="<?php echo $key; ?> "> <?php echo $val; ?></option>
                                  <?php } ?>
                                </select>
                                
                                </td>
                            </tr>
                            <tr>
                                <td> Room No</td>
                                <td  id="room"> <input type="text" name="room_no"  id="room_no" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td> Capasity</td>
                                <td><input type="text" name="capasity" id="capasity" class="form-control" /></td>              
                            </tr>
                             <tr>
               <td colspan="2">	<button class="btn btn-primary" onclick="fnc_save_Info()"><span class="glyphicon glyphicon-plus-sign"></span> Save</button></td>
             
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
    