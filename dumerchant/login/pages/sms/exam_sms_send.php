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
                             SEND SMS
                        </div>
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-responsive" width="100%" >
      
                               
									<tr>
										<td colspan='6'width="100%">
											<div class="control-group">
											<label class="control-label"> Message </label>
												<div class="controls">
													<textarea id="message" name="message" rows="3" class="span6 " style="width:70%" required></textarea>
                                                  
                                                    
                                                    
												</div>                  
											</div>
										</td>
									</tr>
								    <tr>
										<td colspan='6'width="100%">
											<div class="control-group">
											<label class="control-label"> Phone No </label>
												<div class="controls">
													<textarea id="phone" name="phone" rows="5" class="span6 " style="width:100%" required> <?php $sql=mysql_query("SELECT count(a.id) as tid FROM extra_data a,student_info_fbs b WHERE a.email=b.exam_roll_no");
													   while($result=mysql_fetch_assoc($sql)){
														  echo $result['tid'].',';   
													   }
													?></textarea>
												</div>                  
											</div>
										</td>
									</tr>
                                   <tr>
						
									 <td colspan='3'><button class="btn btn-primary" onclick="fnc_sytem()"><span class="glyphicon glyphicon-plus-sign"></span> Send SMS</button></td>
									 <td colspan='1'><button class="btn btn-warning" onclick="clear_fns()"><span class="glyphicon glyphicon-plus-sign"></span> Clear</button></td>
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
