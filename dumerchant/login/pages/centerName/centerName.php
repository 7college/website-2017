<?php include("config/common_function.php"); ?>	
<section>
    <div class="container">
      <div class="row">
       <div class="container">
       
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">
		<div class="panel panel-primary">
		<div class="panel-heading">
		<h3 class="panel-title" style="color:white;"> Center Information</h3>
		</div>
		<div class="panel-body">

					<div class="col-md-12">
					<br />
						<table class="table table-striped table-bordered table-hover table-responsive">
						   <tr>
								<th width='40'>Sl#</th>
								<th width='40'>Center<br/> Code</th>
								<th>Center Name</th>
						   </tr>
							<?php
                             $i=1;							
							 foreach($centerarray AS $key=>$val) { 
							?>                               
						   <tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $key; ?></td>
								<td><?php echo $val; ?></td>
							</tr>
							<?php $i++; } ?>
						</table>
					</div> 
                         
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>