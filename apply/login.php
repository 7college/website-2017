<script type="text/javascript">
   function checkpayment(){
	   	if(fn_validation('appsid*phone')==0) return;
		var mobile=$('#phone').val();
		var appsid=$('#appsid').val();
		
		var data ="action=actionquaerypageslogin&mobile="+mobile+"&appsid="+appsid;
		//alert(data); return;
		http.open( "POST","process/loginapplicat.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_result_response;
		http.send(data); 
	}
	
	
	function fnc_check_result_response()
	{
		if(http.readyState == 4)
		{ 
	
			var response=http.responseText;
			if(response=='110'){
			   window.location='index.php?act=apply/fstep';
			}
			 else if(response=='101'){
				
				 alert('Invalid Application ID or Mobile No.'); return;
			}
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
                                                          লগ ইন করার জন্য নিন্মোক্ত তথ্যগুলো প্রদান করুন
                </div>
              <div class="panel-body" class="col-md-8">
                   <table class="table table-bordered table-striped" style='width:600px;'> 
                          
                          
                            <tr>
                                <td>Application ID</td>
                                <td><input name='appsid' id='appsid' required type='text' class='form-control' placeholder="Enter Application Id" /></td>
                            </tr>
                            <tr>
                                <td>Applicant`s Phone Number</td>
                                <td><input name='phone' id="phone" required type='text' class='form-control' placeholder="Enter Phone Number" /></td>
                            </tr>
							
                            <tr>
                                <td colspan="2" style="text-align:right;">
                                    <button type="button" onclick="checkpayment()" class="btn btn-primary" name="btn_check">  Login</button>
                                </td>
                            </tr>
                        </table>
                 
               </div>
  </div>
  </div>
  </div>
</section>