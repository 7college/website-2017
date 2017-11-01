
  
        
        <div id="page-inner">
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Add New Event & Notice
                                </div>
                                <div class="panel-body">
          <div class="row">
                                    
              
		<?php if(isset($_GET['sk'])){ 
		     if($_GET['sk']==1){
		
		?>                      
                                    
                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-left:30px;margin-right:30px;">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Success!</strong> Save successfully
                    </div>
                    
          <?php } } ?>

        <form action="controller/notice_event_controller.php" enctype="multipart/form-data" method="post">             
			<div class="col-md-12"   style="background:#FFF;">
				<div class="col-md-12" id="success_massage" align="center" style='color:green; font-size:16px; font-weight:bolder;'></div>
				<div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Event title <span id="mendatory">*</span></label>
						<input class="form-control"  type="text" id="txt_event_title" name="txt_event_title">
					</div>

	   	         <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Description</label>
						<textarea class="form-control ckeditor" type="text" id="txt_description" name="txt_description"> </textarea>
					</div>
				 </div>
	   	         <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Upload upload</label>
			             <input type="file" name="txt_file" class="form-control"  id="txt_file" />
					</div>
				 </div>
				  
                
				 <div class="col-md-12">
					<div class="form-group">
                         
						 <button class="btn btn-primary"  type="submit" name="save_event"><span class="glyphicon glyphicon-plus-sign"></span> Submit</button>
					
						 <button class="btn btn-warning" onclick="fnc_save_faculty_info_refresh()"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
					</div>
				 </div>
				</div>
			</div>
            </form>
	</div>
 </div>
</div>
</div></div>
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
	