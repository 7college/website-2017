
     <script src="assets/js/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="calender/jquery-ui.js"></script>
    <script type="text/javascript">
		$(document).ready(function(e) 
		{
		$(".datepicker").datepicker({
		  dateFormat: "yy-mm-dd"
		});		
		});

     function fnc_save_user_info()
	 {

        var dateId=$('#dateId').val();
		
		var data ="action=save_update_delete&dateId="+dateId;
	//alert(data);
		http.open( "POST","controller/date_setting_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_save_user_info_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_save_user_info_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
			  alert(response);
			  if(response==1)
			  {
				 alert('Date Change');  
			  }
			}
		}
		
		
		
    </script>

<div id="page-inner">     
<div class="row"  style="margin:0px; padding:0px;">

<div class="col-md-6"  id="content">
	<div class="panel panel-default">
			<div class="panel-heading">
			  <span class="fa fa-list-ul"></span> 
			    Date Setup
			</div>
			<div class="col-md-12"   style="background:#FFF;">
				<div class="col-md-12" id="success_massage" align="center" style='color:red; font-size:16px; font-weight:bolder;'> </div>
               
              
				 <div class="col-md-12">
				      <h6 style="color:#006699;"> <span style="color:red;">[ * Mark fields are mandatory.]</span> </h6>
				 </div>
                 
				<div class="col-md-12">
					<div class="form-group">
						<label> Date <span id="mendatory">*</span></label>
						<input class="form-control datepicker"  type="text" id="dateId" name="dateId">
					</div>
				 </div>
			     
                
				 <div class="col-md-12">
					<div class="form-group">
                         
						 <button class="btn btn-primary" onclick="fnc_save_user_info()"><span class="glyphicon glyphicon-plus-sign"></span> Submit</button>
					</div>
				 </div>
				</div>
			</div>
	</div>
 </div>
</div>



