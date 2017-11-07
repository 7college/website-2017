
<script>
function fnc_CheckData()
{
	if(fn_validation('mobile*hroll*hreg*sroll')==0) return;
    var mobile=$('#mobile').val();
    var hroll=$('#hroll').val();
    var hreg=$('#hreg').val();
    var sroll=$('#sroll').val();
	var data ="action=DataCheckThenLoad&mobile="+mobile+"&hroll="+hroll+"&hreg="+hreg+"&sroll="+sroll;
	//alert(data); return;
	http.open( "POST","process/forgotapps.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange =fnc_CheckData_response;
	http.send(data); 
 
}


function fnc_CheckData_response()
{
	if(http.readyState == 4)
	{ 
		   var response=http.responseText;

		   $('#dataLoad').html(response);
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
                      Application ID Recovery
                  </div>
				 
				<div class="panel-body">
			  	
                <div class="widget-body" id="dataLoad">
                    <table class="table table-striped table-bordered table-hover"  style='width:600px;'>
					
                    <tr>
                        <td> Mobile Number:</td>
                        <td><input type='text' class='form-control' name='mobile' placeholder="Mobile Number" id="mobile" required></td>
                    </tr>
                    <tr>
                        <td> HSC Roll:</td>
                        <td><input type='text' class='form-control' name='hroll' placeholder="HSC  Roll No." id="hroll" required></td>
                    </tr>
                    <tr>
                        <td> HSC Reg. No.:</td>
                        <td><input type='text' class='form-control' name='hreg' placeholder="HSC Reg. No." id="hreg" required></td>
                    </tr>					
                  <tr>
                        <td> SSC Roll:</td>
                        <td><input type='text' class='form-control' name='sroll' placeholder="SSC Roll No." id="sroll" required></td>
                    </tr>					
                 
               
                    <tr>
                        <td colspan='2'>
                            <button onclick="fnc_CheckData()" class='btn btn-success' name='submit_apps'>
                                Recovery
                            </button>
                        </td>
                    </tr>

                    </table>

                </div>
                
                
                
                
                
                
		   </div>
		   
		   
        </div>
    </div>
</div>

                    </div>
                </div>
            </section>