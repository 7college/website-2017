


<script>
   	      function fnc_data_backup()
	      {
			$('#html_data').html('<div style="position: absolute;z-index: 10;"><font color="red">Downloading data please wait a few minutes....</font></div>');
		    var data='action=data_save_update';
			http.open( "POST","pages/dbbackup/dbbackup.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange = fnc_data_backup_response;
			http.send(data); 
		   }
		   
		   
			function fnc_data_backup_response(){
				if(http.readyState == 4)
				{ 
				  var response=http.responseText;
				  var data='pages/dbbackup/'
				  setTimeout(function(){ window.location='index.php?data=dbbackup/backup'; }, 1000);
				}
			}
				
			
	     function fnc_DeleteDb(dval)
	      {
		    var data='action=data_save_update_delte_process&dval='+dval;
			http.open( "POST","pages/dbbackup/dbbackup.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange = fnc_DeleteDb_response;
			http.send(data); 
		   }
			
			function fnc_DeleteDb_response(){
				if(http.readyState == 4)
				{ 
				  var response=http.responseText;
				  if(response==1){ alert('DB Remove Success.'); window.location='index.php?data=dbbackup/backup'; }
				
				}
			}	
			
   </script>
    
    
    <div id="page-inner" id="data">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                         <div class="panel-heading">
                            <span class="fa fa-list-ul"></span> 
                              Backup DataBase
                        </div>
                       <div class="panel-body" style="height:100px;">
                       <div id="messagebox" align="center"></div>
                             <div class="table-responsive">
                                <button class="btn btn-primary" onclick="fnc_data_backup()"><span class="glyphicon glyphicon-plus-sign"></span> For DB Backup Please click here.</button>                                        
                            
                              </div>
                              <div id="html_data"></div>
                            
                        </div>
                        <div class="panel-body">
                         <table class="table table-striped table-bordered table-hover table-responsive" width="100%" border="1" >
                         
                         <tr>
                             <th>ID</th>
                             <th>DB Name</th>
                             <th>Download</th>
                             <th>Date Time</th>
                             <th>DB Size</th>
                             <th>Action</th>
                         </tr>
                         
                         <?php
						    $i=1;
						    $Sql=mysql_query("SELECT * FROM fbs_db_backup order by id DESC");
							while($row=mysql_fetch_assoc($Sql)){
						 ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['dbName']; ?></td>
                            <td><a href="pages/dbbackup/<?php echo $row['dbName']; ?>"><button class="btn btn-primary" ><span class="glyphicon glyphicon-download"></span> Download</button></a></td>
                            <td><?php echo $row['DateTime']; ?> <?php $size= filesize('pages/dbbackup/'.$row['dbName']); ?></td>
                            <td><?php echo round($size/1024) .' &nbsp; Kilobyte (KB)'; ?></td>
                            <td><button class="btn btn-danger" onclick="fnc_DeleteDb('<?php echo $row['dbName'].'##'.$row['id'];?>')" > <span class="glyphicon glyphicon-trash"></span> Delete</button></td>
                          </tr>
                         <?php $i++; } ?>
                         </table>
                              
                        
                        </div>
                        
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
