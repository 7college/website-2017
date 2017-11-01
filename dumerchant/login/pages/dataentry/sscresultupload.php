<br/>
<section>
    <div class="container">
      <div class="row">
       <div class="container">
       
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title" style="color:white;"> CSV Data Upload</h3>
		</div>
		<div class="panel-body">


    
    
			
            
           <?php
		    if(isset($_GET['sk'])){ 
		      if($_GET['sk']==1){
		   ?>
             <div  style="color:#030;text-align:left; font-size:18px; font-weight:bolder;">
			  Upload Succesfully.
			</div>
           <?php } else {  ?>
             <div style="color:#FF0000; text-align:center; font-size:18px; font-weight:bolder;">
		 
			  Upload UnSuccesfully. 
			</div>
		   
		  <?php  } }?>
            
                  <form action="controller/sscresultsubmission.php" method="post" enctype="multipart/form-data">
                     <div class="col-md-4">
                        <div class="form-group">
                            <label id="txt_data">CSV <span id="mendatory">*</span></label>
                            <input class="form-control"  required="required" type="file" id="file"  name="file">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                             <button class="btn btn-primary"  type="submit" name="csv"><span class="glyphicon glyphicon-plus-sign"></span> Upload </button>
                        </div>
                     </div>
                     
                  </form>   
                

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

