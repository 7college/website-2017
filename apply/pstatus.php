<script type="text/javascript">
   function checkpayment(){
	   	if(fn_validation('pid*appsid*unit')==0) return;
		var pid=$('#pid').val();
		var appsid=$('#appsid').val();
		var unit=$('#unit').val();
		
		var data ="action=payment_varification&pid="+pid+"&appsid="+appsid+"&unit="+unit;
		//alert(data); return;
		http.open( "POST","process/paymentvarify.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_result_response;
		http.send(data); 
	}
	
	
	function fnc_check_result_response()
	{
		if(http.readyState == 4)
		{ 
	      
			var response=http.responseText;
			  //alert(response); return;
			$('#htmldata').html(response);
		 }
	}	 

</script>
 <section class="main">
                <div class="container">
                    <div class="row">
                    <div class="container">
                    <?php include("process/uppermenu.php"); ?>  
                    <div class="col-md-12" style="padding:0px; margin:0px;">
                    <div class="widget">              
             <div class="panel panel-primary" style="margin:0px; padding:0px;">
                 <div class="panel-heading"  style=" font-weight:bolder; color:#fff; font-size:16px;">
                    Payment Status
                </div>
              <div class="panel-body" class="col-md-8">
			  <div id='htmldata'></div>
                   <table class="table table-bordered table-striped" style='width:600px;'> 
                          
                            <tr>
                                <td>Payment ID (PID)</td>
                                <td><input name='pid' id="pid" required type='text' class='form-control' placeholder="Enter your Payment ID" /></td>
                            </tr>
                            <tr>
                                <td>Application ID (AID)</td>
                                <td><input name='appsid' id='appsid' required type='text' class='form-control' placeholder="Enter your Application Id" /></td>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>
                                     <select id="unit" name="unit" class="form-control">
										<option value=""> >-Select Unit-< </option>
										<?php foreach($unit AS $key=>$val) {?>
                                             <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                                         <?php } ?>
                                     </select>
                                </td>
                            </tr>
							
                            <tr>
                                <td colspan="2" style="text-align:right;">
                                    <button type="button" onclick="checkpayment()" class="btn btn-primary" name="btn_check"> Verify </button>
                                </td>
                            </tr>
                        </table>
						
						<br/>
						
                 
                </div>
  </div>
  </div>
  </div>
</section>