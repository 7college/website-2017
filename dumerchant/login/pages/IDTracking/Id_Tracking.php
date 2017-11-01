<script type="text/javascript">

     function fnc_dataSearch()
	 {
        if(fn_validation('appsID')==0) return;
	    var appsID=$('#appsID').val();
	    var type=$('#type').val();

		var data ="action=save_update_delete&appsID="+appsID+"&type="+type;
		http.open( "POST","controller/Individual_Applicant_Tracking.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_dataSearch_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_dataSearch_response()
		{
			if(http.readyState == 4)
			{ 
			 $('#HTML_VIEW').html('<h4 style="color:red;" align="center">Data searching please wait....<h4>');
			  var response=http.responseText;
				$("#HTML_VIEW").html('<h4 style="color:red;" align="center">Data found Succesfully....<h4>');
				setTimeout(function(){$('#HTML_VIEW').html(response) }, 1000);
			 
			}
		}
		
		

	 
	function fnc_Approved_Info_Active(appId)
	 {
		 
		$('#saveProcess').html('<button class="btn btn-primary"> Loading..</button>');
		var data ="action=save_update_appId&appId="+appId;
		http.open( "POST","controller/Approved_Student_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_Approved_Info_Active_response;
		http.send(data);
		 
     } 
	 
	 
	function fnc_Approved_Info_Active_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  if(response==1){ 
				$("#HTML_VIEW").html('<h4 style="color:green;" align="center"><b>Data Approved Successfully.</b><h4>');
				setTimeout(function(){ fnc_dataSearch(); }, 1000);;
			  }
			  if(response==0){ alert('Sorry! Save Error.'); fnc_dataSearch()}
			}
		}


	function fnc_Approved_Info_reject(appId)
	 {
		 
		$('#saveProcess').html('<button class="btn btn-primary"> Loading..</button>');
		var data ="action=save_update_reject&appId="+appId;
		http.open( "POST","controller/Approved_Student_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_Approved_Info_reject_response;
		http.send(data);
		 
     } 
	 
	 
	function fnc_Approved_Info_reject_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  if(response==3){ 
				$("#HTML_VIEW").html('<h4 style="color:green;" align="center"><b>Data Reject Successfully.</b><h4>');
				setTimeout(function(){fnc_dataSearch(); }, 1000);;
			  }
			  if(response==0){ alert('Sorry! Save Error.'); fnc_dataSearch()}
			}
		}

		
    </script>
    <div id="page-inner"  style="background:#FFFFFF;">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Tracking Transaction ID
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive"  align="center" style="width:700px;">
                                    <tr class="odd gradeA" style="font-size:12px;">
										  <td><input type="text"  class="form-control"   id="appsID" name="appsID" /></td>
										  <td>
                                             <select class="form-control"   id="type" name="type" >
                                              <option value="1">Apps ID</option>
                                              <option value="2">Phone No.</option>
                                            </select>
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
    