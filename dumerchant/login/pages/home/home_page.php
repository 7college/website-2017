          <?php //include('config/common_function.php'); ?> 

		   <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Dashboard <small> Administrative Panel</small>
                        </h2>
                    </div>
                </div>
               
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Admin Summary 
                            </div> 
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="50">Sl.</th>
                                                <th>Title</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        
                                          <tr>
                                                <td>1</td>
                                                <td> Total Print Admit  </td>
                                                <td>  <?php
												         $SQLtDataPayStatusppp=mysql_query("SELECT count(id) as paytotal FROM  student_info_fbs where payment_status='3' and PrintStatus='1'");
														  $rowtDataPayxxxx=mysql_fetch_assoc($SQLtDataPayStatusppp);
														  echo $rowtDataPayxxxx['paytotal'];
												      ?> </td>
                                            </tr>
                                            
                                              <tr>
                                                <td>2</td>
                                                <td> Total No of Student</td>
                                                <td> <?php
												         $SQLtData=mysql_query("SELECT count(id) as ttotal FROM  student_info_fbs");
														  $rowtData=mysql_fetch_assoc($SQLtData);
														  echo $rowtData['ttotal'];
												      ?>
												 </td>
                                            </tr>
                                            
                                          
                                           
                                          
                                               
                                         
                                            

                                        </tbody>
                                    </table>
																		
                                   
									
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
       