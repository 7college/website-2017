
      
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
		$(document).ready(function(e) 
		{
		$( ".datepicker" ).datepicker({
		  dateFormat: "yy-mm-dd"
		});		
		});

	
     function fnc_save_user_info()
	 {

       if(fn_validation('user_full_name*txt_email*txt_phone*user_id*student_password*confirm_student_password*user_type')==0) return;
		var data ="action=save_update_delete";
		data+=get_form_data('content');
		http.open( "POST","controller/user_info_controller.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_save_user_info_response;
		http.send(data); 
		 
     }
	 
	 
	function fnc_save_user_info_response()
		{
			if(http.readyState == 4)
			{ 
			  //var response=http.responseText;
			  //alert(response); return;
			 $('#success_massage').html('Data save loading...');
			  var response=http.responseText;
			  if(response==1)
			  {
					
				setTimeout(function(){$('#success_massage').html('<font color="green">Data Save successfully.</font>') }, 1000);

				$('#content').find('input,select,textarea').val("");
				$('#error').html('');
			  }
			  if(response==2)
			  {
			    $('#success_massage').html('Data Update successfully');
				$('#content').find('input,select,textarea').val("");
				$('#error').html('');
			  }
			  
			 }
		}
		
		
		
		
		function match_password(confirm_value)
		{
			//alert(confirm_value); return;
			var txt_password=$('#student_password').val();
			//alert(txt_password);
			if(txt_password!=confirm_value)
			{
				 $('#error').html('Sorry, Password does not match.'); 
				 return false;
			}
			else { 
			$('#error').html('Thanks, Password match.');
			}
		}
		
		function fnc_save_faculty_info_refresh(){
			$('#content').find('input,select,textarea').val("");
		}

    </script>

<div id="page-inner">     
<div class="row"  style="margin:0px; padding:0px;">

<div class="col-md-6"  id="content">
	<div class="panel panel-default">
			<div class="panel-heading">
			  <span class="fa fa-list-ul"></span> 
			   Add New User
			</div>
			<div class="col-md-12"   style="background:#FFF;">
				<div class="col-md-12" id="success_massage" align="center" style='color:red; font-size:16px; font-weight:bolder;'> </div>
               
              
				 <div class="col-md-12">
				      <h6 style="color:#006699;"> <span style="color:red;">[ * Mark fields are mandatory.]</span> </h6>
				 </div>
                 
				<div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Name of the user <span id="mendatory">*</span></label>
						<input class="form-control" placeholder="Enter  full name"  autocomplete="off"  type="text" id="user_full_name" name="user_full_name">
					</div>
				 </div>
			     <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Email <span id="mendatory">*</span></label>
						<input class="form-control" placeholder="" autocomplete="off" type="text" id="txt_email"  name="txt_email">
					</div>
				 </div>
                 
			     <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Phone No <span id="mendatory">*</span></label>
						<input class="form-control" placeholder="" autocomplete="off" type="text" id="txt_phone"  name="txt_phone">
					</div>
				 </div>
                 
			     <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">User ID <span id="mendatory">*</span></label>
						<input class="form-control" placeholder="user ID/custom ID" autocomplete="off" type="text" id="user_id"  name="user_id">
					</div>
				 </div>
		
                  
                  <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Password <span id="mendatory">*</span></label>
						<input class="form-control" type="Password"  id="student_password" autocomplete="off" value="<?php echo $row['password']; ?>" name="student_password">
					</div>
				 </div> 
                  <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Confirm Password <span id="mendatory">*</span></label>
						<input class="form-control" type="Password"  onkeyup="match_password(this.value)"  autocomplete="off" value="<?php echo $row['password']; ?>" id="confirm_student_password" name="confirm_student_password">
					</div>
				 </div> 
                 
                  <div class="col-md-12"><div class="form-group" id="error"></div></div>
                 
                 <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">User Type</label>
						<select class="form-control"  type="text" id="user_type" name="user_type">
                          <option value="1">Admin</option>
                          <option value="2">User</option>
                        </select>
					</div>
				 </div>
                 
                 
                
				 <div class="col-md-12">
					<div class="form-group">
                         
						 <button class="btn btn-primary" onclick="fnc_save_user_info()"><span class="glyphicon glyphicon-plus-sign"></span> Submit</button>
					
						 <button class="btn btn-warning" onclick="fnc_save_faculty_info_refresh()"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
					</div>
				 </div>
				</div>
			</div>
	</div>
 </div>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="calender/jquery-ui.js"></script>

<script src="plugins/ckeditor/ckeditor.js"></script>
<script src="plugins/ckeditor/adapters/jquery.js"></script>
<script src="assets/js/fileupload.js"></script><br />
 <script>
		$(document).ready(function(e) {
		$("#upload_image").change( function( e ){
			$.ajax({
				url:'file_upload/upload_process.php',
				type: 'POST',
				data: new FormData( this ),
				processData: false,
				contentType: false,
				success: function(data) 
				{
				
			      $('#txt_image').html('<img src="images/send.gif" style="width:180px; height:10px;"/>');
				  var response=data.split('###');
				  if(response[0]==1)
				  {    
				   setTimeout(function(){$('#txt_image').html("<img src='file_upload/"+response[1]+"' style='height:180px; width:190px;'/>") }, 3000);   
				   $('#txt_picture').val(response[1]);
				   //$('#txt_image').html();
				   //alert(data); 
				  }
				}
			});
			 e.preventDefault();
		  });
		});
	</script>
	