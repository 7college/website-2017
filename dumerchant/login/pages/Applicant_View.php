	    <script src="assets/js/jquery-1.10.2.js"></script>

<script type="text/javascript">

	$(document).ready(function(e) 
	{
	  $('#appsID').focus();
	});
     function fnc_dataSearch()
	 {

       if(fn_validation('appsID')==0) return;
	    var appsID=$('#appsID').val();
		var data ="action=save_update_delete&appsID="+appsID;
		http.open( "POST","controller/view_Student_Data.php",true);
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
		
		

	 
	function fnc_Approved_Info()
	 {
		 
		$('#saveProcess').html('<button class="btn btn-primary"> Loading..</button>');
		var systemId=$('#systemId').val(); 
		var data ="action=save_update_delete&systemId="+systemId;
		//alert(data); return;
		http.open( "POST","controller/Approved_Student_Controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_Approved_Info_response;
		http.send(data);
		 
     } 
	 
	 
	function fnc_Approved_Info_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  if(response==1){ 
				$("#HTML_VIEW").html('<h4 style="color:green;" align="center"><b>Data Save Succesfully.</b><h4>');
				setTimeout(function(){ window.location='index.php?data=Applicant_View'; }, 1000);;
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
                              <span class="fa fa-list-ul"></span> Approved Payment
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive">
   <table class="table table-striped table-bordered table-hover table-responsive"  align="center" style="width:700px;">
                                    <tr class="odd gradeA" style="font-size:12px;">
                                          <th>Application ID</th>
										  <td><input type="text"  class="form-control" onkeydown="fnc_dataSearch()"   id="appsID" name="appsID" /></td>
<!--										  <td><button  class="btn btn-warning"  onclick="fnc_dataSearch()"> Search </button></td>-->
										            <th>Total Approved:</th> 
                                         <th style="background:#999; color:#ff0000;  font-size:23px;">
                                           <?php 
										  $TotalDataSql=mysql_query("SELECT count(id) as totaApproved 
										  FROM student_info_fbs WHERE status='5'");
                                           $rowTotalDataSql=mysql_fetch_assoc($TotalDataSql);
										   echo $rowTotalDataSql['totaApproved'];
										  ?>
                                         </th>
                                      
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
    