<div id="page-inner">     
<div class="row"  style="margin:0px; padding:0px;">

<div class="col-md-12"  id="content" style="background:#FFF;">
	<div class="panel panel-default">
    
    
			<div class="panel-heading">
			  <span class="fa fa-list-ul"></span> 
			   Roll Assign (CSV)
			</div>
            
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
            
                  <form action="controller/Pass_roll_Assign_Controller.php" method="post" enctype="multipart/form-data">
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

