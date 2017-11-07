<?php
 session_start();
 include('config/common_function.php');

?>
<script>

   function fn_data_search(){

	        $('#htmlview').html('<font color="red"><b>Please wait data is now processing..</a></font>');
	        var appsid=$('#appsid').val();
	        var mobileno=$('#mobileno').val();
			var data ="action=viewdata&appsid="+appsid+"&mobileno="+mobileno;
			http.open( "POST","pages/advancedsearch/applicantwise_search.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange =fn_data_search_response;
			http.send(data); 
	   
	   }
	function fn_data_search_response()
	{
		if(http.readyState == 4)
		{ 
			   var response=http.responseText;
			   $('#htmlview').html(response);
		}
	}
	
   function fn_data_searchxx(){

	        $('#htmlview').html('<font color="red"><b>Please wait data is now processing..</a></font>');
	        var reg=$('#reg').val();
	        var roll=$('#roll').val();
			var data ="action=viewdata&reg="+reg+"&roll="+roll;
			http.open( "POST","pages/advancedsearch/individualapplicants.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange =fn_data_searchxx_response;
			http.send(data); 
	   
	   }
	function fn_data_searchxx_response()
	{
		if(http.readyState == 4)
		{ 
			   var response=http.responseText;
			   $('#htmlview').html(response);
		}
	}
	
	
	
	function fn_data_html(){

		var cid=$('#cid').val();
		var sid=$('#sid').val();
		var data ="action=print_action&cid="+cid+"&sid="+sid;
		//alert(data); return;
		http.open( "POST","report/admit_view.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fn_data_excel_response;
		http.send(data); 
	}
	
	function fn_data_excel_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
		      window.open(response);
			}
	}
	
</script>

<style>
  input[type='text'],input[type='file']  { border:1px solid #CCCCCC;}
  #mendotory{ color:red;}
</style>
<br/>
<section>
    <div class="container">
      <div class="row">
       <div class="container">
       
       <div class="col-md-12" style="padding:0px; margin:0px;  max-height:600px; overflow:auto; ">
         <div class="widget">

								   
							<div class="panel panel-primary" style="padding:0px; margin:0px;  max-height:600px; overflow:auto; ">
												<div class="panel-heading">
													<h3 class="panel-title" style="color:white;"> <span class='glyphicon glyphicon-search'></span> Search Applicants Details</h3>
												</div>
												<div class="panel-body">
												 
												
													<table class="table table-striped table-bordered table-hover table-responsive">
														 <tr>
															<th>Application ID</th>
															<th>Mobile No</th>
															<th>Action</th>
														  </tr>								 
														  <tr>
															<td>
															   <input type='text'  name="appsid"  class="form-control" id="appsid" >
			
															</td>
															  <td>
																<input type='text'  name="mobileno"  class="form-control" id="mobileno" >

															</td>
															<td align="left" ><button onclick="fn_data_search()" name="submit_application" class="btn btn-primary "> <span class="glyphicon glyphicon-search" ></span> Search</button></td>
														  </tr>
														  
														  
													 </table>
													 
													<table class="table table-striped table-bordered table-hover table-responsive">
														 <tr>
															<th>HSC Reg.</th>
															<th>HSC Roll</th>
															<th>Action</th>
														  </tr>								 
														  <tr>
															<td>
															   <input type='text'  name="reg"  class="form-control" id="reg" >
			
															</td>
															  <td>
																<input type='text'  name="roll"  class="form-control" id="roll" >

															</td>
															<td align="left" ><button onclick="fn_data_searchxx()" name="submit_application" class="btn btn-primary "> <span class="glyphicon glyphicon-search" ></span> Search</button></td>
														  </tr>
														  
														  
													 </table>
													 <div id="htmlview" align="center"></div>
												
												</div>
													
													
							</div>                    
						
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>