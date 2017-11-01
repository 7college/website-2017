<script type="text/javascript">

     function fnc_dataSearch()
	 {
	    var type=$('#type').val();
		var data ="action=save_update_delete&type="+type;
		http.open( "POST","pages/AdvancedSearch/All_applicant_List_Data.php",true);
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


	
		
    </script>
    <div id="page-inner"  style="background:#FFFFFF;">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Advanced Search
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive"  align="center" style="width:700px;">
                                    <tr class="odd gradeA" style="font-size:12px;">
										  <td>
                                             <select class="form-control"   id="type" name="type" >
                                              <?php 
											  
											  $QuataArray=array(0=>'Not Applicable',1=>'Freedom Fighter',2=>'Orphan',3=>'Physically Challenged',4=>'Tribal',5=>'Anser-VDP');

											  foreach ($QuataArray as $key=>$val){ ?>
                                              <option value="<?php echo $key; ?>"> <?php echo $val; ?></option>
                                              <?php } ?>
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
    