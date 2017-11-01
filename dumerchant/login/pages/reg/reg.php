<?php
 include('config/common_function.php');

?>
<script>

   function fn_data_search(){
	       // $('#htmlview').html('<font color="red"><b>Please wait data is now processing..</a></font>');
	        var college=$('#collegename').val();
	        var sub=$('#subname').val();
	        var regnofrom=$('#regnofrom').val();
	        var regnoto=$('#regnoto').val();
			
			
			var data ="action=viewdata&college="+college+"&sub="+sub+"&regnofrom="+regnofrom+"&regnoto="+regnoto;
			//alert(data); return;
			http.open( "POST","pages/reg/regnogenerator.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange =fn_data_search_response;
			http.send(data); 
	   
	   }
	function fn_data_search_response()
	{
		if(http.readyState == 4)
		{ 
			   var response=http.responseText;
			   alert(response);
			  // if(response==1){ alert('Serial no. already exist'); $("#apsID").val(''); return; }
		}
	}
	
	function fn_data_excel(){

		var nop=$('#nop').val();
		var data ="action=student_searchData&nop="+nop;
		//alert(data); return;
		http.open( "POST","apply/Postwisedata_print.php",true);
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
       
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">

								   
							<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title" style="color:white;"> <span class='glyphicon glyphicon-search'></span> Assign Reg No </h3>
												</div>
												<div class="panel-body">
												 
												
													<table class="table table-striped table-bordered table-hover table-responsive">
														 <tr>
															<th>College Name</th>
															<th>Subject Name</th>
															
															
														  </tr>								 
														  <tr>
															<td>
															<select  name="collegename"  class="form-control" id="collegename" >
															   
																  <option value=""> >--select--< </option>
																  <?php foreach($collegearray as $key=>$val){ ?>
																	 
																   <option value="<?php echo $key; ?>">[<?php echo $key; ?>] <?php echo $val ?>  </option>  
																	 
																  <?php } ?>
															   
															</select>
															</td>
															  <td>
															<select  name="subname"  class="form-control" id="subname" >
															   
																  <option value=""> >--select--< </option>
																  <?php foreach($subarray as $key=>$val){ ?>
																	 
																   <option value="<?php echo $key; ?>">[<?php echo $key; ?>] <?php echo $val ?>  </option>  
																	 
																  <?php } ?>
															   
															</select>
															</td>
														   </tr>
													       <tr>
														    <th>Reg From. </th>
															<th>Reg To. </th>
														   </tr>
													       <tr>
															<td>
															   <input type='text'  class="form-control" id='regnofrom' name='regnofrom'/>
															</td>
															<td>
															   <input type='text'  class="form-control" id='regnoto' name='regnoto'/>
															</td>
														  </tr>
														  <tr>
														  	<td align="left" colspan='2' ><button onclick="fn_data_search()" name="submit_application" class="btn btn-primary "> <span class="glyphicon glyphicon-search" ></span> Search</button></td>

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