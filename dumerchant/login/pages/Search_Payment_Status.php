<script>
function fnc_appsSearch()
  {
	    var apps=$('#appsid').val();
	    var data ="action=GetSerach_Value&apps="+apps;
		//alert(data);
		http.open( "POST","pages/Manual_Approved_Payment.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_appsSearch_response;
		http.send(data); 
  }
  
  function fnc_appsSearch_response()
  {
		if(http.readyState == 4)
		{ 
		   var response=http.responseText;
		   $('#htmldata').html(response);
		}
  }
	

function fnc_save_Info(upid)
  {
	    var data ="action=getIdThenUpdate&upid="+upid;
		//alert(data);
		http.open( "POST","pages/include/update_payment_status.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_get_list_view_response;
		http.send(data); 
  }
  
  function fnc_get_list_view_response()
  {
		if(http.readyState == 4)
		{ 
		   var response=http.responseText;
		   //alert(response); return;
		   if(response==1){ 
		   alert('Update Successfully');
		   return; 
		   }
		   else if(response==0){ 
		   alert('Update Error');
		   return; 
		   
		   }
		}
  }
	


</script>
    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <div class="panel-heading">
                              <span class="fa fa-list-ul"></span> Manual Payment Approved
                        </div>
                        </br>

                         
                         
                       <div class="panel-body">
                       <div id="messagebox" align="center"></div>
                       <div class="table-responsive" >
   <table class="table table-striped table-bordered table-hover table-responsive"  width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
								<thead>
                                <tr style="font-size:12px;">
                                        <th data-orderable="true">Apps ID</th>
                                        <th data-orderable="true"><input class="form-control" type="text"  id="appsid"/></th>
                                       
                                        <th>
                                        
                                            <input  type="button"  onclick="fnc_appsSearch()" value="Search" class="btn btn-primary" /></td>
                                        </th>
                                </tr>
								</thead>
                           
                                  
                               </table>
                               
                               <div id="htmldata"></div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    