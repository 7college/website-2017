<?php
 session_start();
 include('config/common_function.php');

?>
<script>

   function fn_data_search(){
	        if(fn_validation('collegename*subname')==0) return;

	        $('#htmlview').html('<font color="red"><b>Please wait data is now processing..</a></font>');
	        var college=$('#collegename').val();
	        var sub=$('#subname').val();
			var data ="action=viewdata&college="+college+"&sub="+sub;
			//alert(data); return;
			http.open( "POST","pages/advancedsearch/subjectwisedatatrace.php",true);
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
			  // if(response==1){ alert('Serial no. already exist'); $("#apsID").val(''); return; }
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
       
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">

								   
							<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title" style="color:white;"> <span class='glyphicon glyphicon-search'></span> College & Sub. Wise Admit Card Print </h3>
												</div>
												<div class="panel-body">
												 
												
													<table class="table table-striped table-bordered table-hover table-responsive">
														 <tr>
															<th>College Name</th>
															<th>Subject Name</th>
															<th>Action</th>
														  </tr>								 
														  <tr>
															<td>
															<select  name="collegename"  class="form-control" id="collegename" >
															   
																  
																  <?php if($_SESSION['user_type']==1){ ?>
																  <option value=""> >--select--< </option>
																  <?php foreach($collegearray as $key=>$val){ ?>
																	 
																   <option value="<?php echo $key; ?>">[<?php echo $key; ?>] <?php echo $val ?>  </option>  
																	 
																  <?php } ?>
																  <?php } else{ ?>
																  	<option value="<?php echo $_SESSION['uid']; ?>">[<?php echo $_SESSION['uid']; ?>] <?php echo $collegearray[$_SESSION['uid']] ?>  </option>  

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
															<td align="left" ><button onclick="fn_data_search()" name="submit_application" class="btn btn-primary "> <span class="glyphicon glyphicon-search" ></span> Search</button></td>
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