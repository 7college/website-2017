    <?php
 session_start();
 include('config/common_function.php');

?>
	
	
        <div id="page-inner">
                      <div class="row" id="content">
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    New Registration
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                            <?php
							   if(isset($_GET['sk'])){
								   
								   if($_GET['sk']==1){
									   
									   echo "<h1 align='center'>Save Successfully</h1>";
									   
								   }
								   else{
									   
									   echo "<h1 align='center'>Update Successfully</h1>";
								   }
							   }
							?>
                            
          <form action='controller/save_new_registration.php' method='post'>                  
			<div class="col-md-12"   style="background:#FFF;">
				<div class="col-md-12" id="success_massage" align="center" style='color:red; font-size:16px; font-weight:bolder;'></div>
   
   
                 <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Examinee Name <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="examnee"  name="examnee">
                        <br /><div id="error"></div>
					</div>
				 </div>
				 
				   <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Father's Name <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="fname"  name="fname">
                        <br /><div id="error"></div>
					</div>
				 </div>
                 
				<div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Mother's Name <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="mname" name="mname">
					</div>
				 </div>
                 <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">College Name <span id="mendatory">*</span></label>
						<select class="form-control"  id="college" name="college">
						  <option value>>--Select--< </option>
						  <?php foreach($collegearray AS $keys=>$value){ ?>
						  <option value='<?php echo $keys; ?>'> <?php echo $value; ?> </option>
						  <?php } ?>
						</select>
					</div>
				 </div>
                 
                 
                
                 
			     <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Subject Name<span id="mendatory">*</span></label>
						<select class="form-control"  id="subject" name="subject">
						  <option value>>--Select--< </option>
						  <?php foreach($subarray AS $keys=>$value){ ?>
						  <option value='<?php echo $keys; ?>'> <?php echo $value; ?> </option>
						  <?php } ?>
						</select>
					</div>
				 </div>	
                 
                 
                 
                 		     
                 
                 <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">NU Reg <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="nureg"  name="nureg">
                        <br /><div id="error"></div>
					</div>
				 </div>
                 <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">DU Reg <span id="mendatory">*</span></label>
						<input class="form-control" type="text" id="dureg"  name="dureg">
                        
					</div>
				 </div>
				 
				 
				  <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Roll No. <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="roll"  name="roll">
                        
					</div>
				 </div>
                 
                   <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Session <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="session"  name="session">
                        
					</div>
				 </div>
				 
				   <div class="col-md-12">
					<div class="form-group">
						<label id="txt_data">Paper Code <span id="mendatory">*</span></label>
						<input class="form-control"   type="text" id="papercode"  name="papercode">
                       
					</div>
				 </div>
				  <div class="col-md-12">
					<div class="form-group">
						<label id="center">Student Type <span id="mendatory">*</span></label>
						<select class="form-control"  id="stype" name="stype">
						<option value>>--Select--< </option>
						  <?php foreach($stype AS $key=>$val){ ?>
						  <option value='<?php echo $key; ?>'> <?php echo $val; ?> </option>
						  <?php } ?>
						</select>
                     </div>
				 </div>
             
                 <div class="col-md-12">
					<div class="form-group">
						<label id="center">Center Name <span id="mendatory">*</span></label>
						<select class="form-control"  id="center" name="center">
						<option value>>--Select--< </option>
						  <?php foreach($centerarray AS $key=>$val){ ?>
						  <option value='<?php echo $key; ?>'> <?php echo $val; ?> </option>
						  <?php } ?>
						</select>
                     </div>
				 </div>
                 
                 
                 
                 
                 
                 
                 <div class="col-md-12">
					<div class="form-group">
						 <button type="submit" class="btn btn-primary" name='submitdata'><span class="glyphicon glyphicon-ok-sign"></span> Submit</button>
					</div>
				 </div>
               
             </form>  
               
               
               
                 
                 
	</div>
 </div>
</div>
</div>
</div>

</div>
</div>