<script>
   	      function fnc_show_attendence()
	      {
			var txt_faculty_id= document.getElementById('txt_faculty_id').value;
			var txt_course_id= document.getElementById('txt_course_id').value;
			var txt_semister_id= document.getElementById('txt_semister_id').value;
		    var data='action=data_save_update&txt_faculty_id='+txt_faculty_id+'&txt_course_id='+txt_course_id+'&txt_semister_id='+txt_semister_id;
			http.open( "POST","pages/sms/include/attendence_sheet_genarate.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange = fnc_show_attendence_response;
			http.send(data); 
		   }
		   
		   
			function fnc_show_attendence_response(){
			if(http.readyState == 4)
			{ 
			  $('#html_data').html('<img src="images/load.gif" style="width:500px; height:20px;"/>');
			  var response=http.responseText;
			  setTimeout(function(){$('#html_data').html(response) }, 1000);
			}
			}
				
						
				function fbs_All_Phone_No()
				 {	
					//if(fn_validation('userGroup')==0) return;
					//var userGroup=$('#userGroup').val();
					
					//alert('xx');
					var data='';
					var cboxes = document.getElementsByName('mailId[]');
					for (var i=0; i<cboxes.length; i++) {
					data+=(cboxes[i].checked)?cboxes[i].value+',':'';
					}
					//alert(data);
					$('#phone').val(data);
					
				 }	
		
			function fnc_reload_course()
			{
				var faculty=$('#txt_faculty_id').val();
				var semester=$('#txt_semister_id').val();
				if(semester!="")
				{
				var data='action=load_cousre_name_id&&faculty='+faculty+'&semester='+semester;
				}
				http.open( "POST","include/load_course_list.php",true);
				http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				http.onreadystatechange = fnc_reload_course_response;
				http.send(data); 
			}	
		
			function fnc_reload_course_response()
			{
				if(http.readyState == 4)
				{ 
				  var response=http.responseText;
				  $('#load_cours_data').html(response)
				}
			}
		
			   
	   
	 	function allselect(source)
		{
		    checkboxes = document.getElementsByName('mailId[]');
			for(var i=0; i<checkboxes.length;i++)
			{
			  checkboxes[i].checked = source.checked;
			}
		}
	   function clear_fns(source)
		{
		    fnc_show_attendence()
		}
		
		
		
	function fnc_sytem(){
		if(fn_validation("phone*message")==0)return;	
		var phone=$('#phone').val();
		var message=$('#message').val();	
		
		//alert(phone);
		var data='action=list_view&message='+message+'&phone='+phone;
		http.open( "POST","pages/sms/include/GroupSmS_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange = fnc_sytem_response;
		http.send(data); 
		
	}	

	function fnc_sytem_response(){
		if(http.readyState == 4){
			//alert(http.responseText); return;
			$('#html_data').html('<img src="images/load.gif" style="width:500px; height:20px;"/>');
			var response=http.responseText;
			setTimeout(function(){$('#html_data').html(response) }, 1000);
		}
	}
   </script>
    
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                         <div class="panel-heading">
                            <span class="fa fa-list-ul"></span> 
                           Course Wise Group SMS
                        </div>
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-responsive" width="100%" border="1"  id="data_load_list">
                                <tr>
                                   <td colspan="18">
                                      <table>
                                         <td width="230">
                                                <select class="form-control" style="width:300px;"  onchange="fnc_reload_course()" id="txt_faculty_id" name="txt_faculty_id">
													<?php if($_SESSION['user_type']==1 || $_SESSION['user_type']==3|| $_SESSION['user_type']==3){ ?>
                                                    <option value=""> >--Select--< </option>
                                                    <?php } ?>
                                                    <?php 
													    if($_SESSION['user_type']==1 || $_SESSION['user_type']==3){
                                                        $sql2="select * from  fbs_faculty_info";
														}else {
                                                        $sql2="select * from  fbs_faculty_info where id='".$_SESSION['id']."'";
															}
                                                        $User_result=mysql_query($sql2);
                                                        while($userId=mysql_fetch_assoc($User_result)){ 
                                                        ?>
                                                        <option value="<?php echo $userId['id'] ?>"><?php echo $userId['faculty_name'] ?> (<?php echo $userId['faculty_id'] ?>)</option>
                                                    <?php } ?>
                                                </select>                                         
                                              </td>
                                              <td width="10"></td>
           
                                         <td width="230">
                                            <select class="form-control"  id="txt_semister_id" onchange="fnc_reload_course()" name="txt_semister_id">
                                              <option value=""> >--Select--< </option>

                                                <?php  
												 if($_SESSION['user_type']==1 || $_SESSION['user_type']==3){
                                                    $smstr_Result=mysql_query("select * from fbs_semester order by id desc");                                          
													}else{
                                                    $smstr_Result=mysql_query("select * from fbs_semester order by id desc limit 1");                                          
														}
                                                    while($smstr_row=mysql_fetch_assoc($smstr_Result)){ 
                                                    ?>
                                                    <option value="<?php echo $smstr_row['id'] ?>"><?php echo $smstr_row['semester_title'] ?></option>
                                                <?php } ?>
                                            </select>
                                         </td> 
                                         <td width="10"></td>
            
                                         <td id="load_cours_data" width="230">
                                            <select class="form-control"  style="width:200px;" id="txt_course_id" name="txt_course_id">
                                                <option value=""> >--Select--< </option>
                                                <?php  
                                                    $course_Result=mysql_query("select * from  fbs_course");
                                                    while($crs_row=mysql_fetch_assoc($course_Result)){ 
                                                    ?>
                                                    <option value="<?php echo $crs_row['id'] ?>"><?php echo $crs_row['course_title'] ?>(<?php echo $crs_row['course_code'] ?>)</option>
                                                <?php } ?>
                                            </select>
                                         </td>
                                              <td width="10"></td>
                                        <td>
                                           <button class="btn btn-warning" onclick="fnc_show_attendence()"><span class="glyphicon glyphicon-plus-sign"></span> Generate Report</button>                                        
                                        </td>
                                            
                                        </table>
                                   </th>
                                 </tr>
                               </table>
                                   <div id="html_data" align="center"></div> 
                              </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
