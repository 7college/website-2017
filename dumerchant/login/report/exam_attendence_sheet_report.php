
<?php
	session_start();
	include('../config/config.php');
	include('../config/common_function.php');

	extract($_REQUEST);
	ob_start();
	
	 $sqlBaban=mysql_query("SELECT * FROM fbs_manage_center");
	while($rowBhaban=mysql_fetch_assoc($sqlBaban)){
		$BhabanNameArray[$rowBhaban['id']]=$rowBhaban['center_name'];
	}
	$sqlRoom=mysql_query("SELECT * FROM  fbs_room_setup");
	while($rowRoom=mysql_fetch_assoc($sqlRoom)){
		$RooMNameArray[$rowRoom['id']]=$rowRoom['room_no'];
		$RooMBahanNameArray[$rowRoom['id']]=$rowRoom['baban_name'];
	}
	
$sql3=mysql_query("select * from  student_info_fbs where  room_no='$room_no'");
$dataMinROW=mysql_fetch_assoc($sql3);
mysql_query ("set character_set_results='utf8'");	
	echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">';
     echo '<meta charset="utf-8">';
?>			
<style type="text/css">

    .page {
    width: 21cm;
    min-height: 29.7cm;
    padding: 1cm;
    margin: 1cm auto;
    border-radius: 5px;
    background: white;
    }
    .subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 256mm;
    outline: 2cm #FFEAEA solid;
    }
    
    @page {
    size: A4;
    margin: 0;
    }
    @media print {
    .page {
    margin: 0;
    border: initial;
    border-radius: initial;
    width: initial;
    min-height: initial;
    box-shadow: initial;
    background: initial;
    page-break-after: always;
    }
    }
    </style>

                 
                 <div class="page">  
                    
							<table width="100%" align="center">
							<tr>
							  <td colspan="5" align="center">
                              <b>
								<?php echo $CompanyNameen[1]; ?><br />
                                <?php echo $CompanyNameen[2]; ?><br />
								Center Name# :  
								<?php  echo $BhabanNameArray[$RooMBahanNameArray[$dataMinROW['room_no']]] ?>/ Room No. #: 
								<?php  echo $RooMNameArray[$dataMinROW['room_no']] ?>
								
                                 
                                <br />
								<u><b>Name of the Post: <?php  echo $PostArray[$dataMinROW['nop']] ?> </b></u>
                           
							  </td>
							</tr>
							</table>
                             <table  width="100%" border="1"  align="center"  bordercolor="#000000" rules="all">
                                <tr style="font-size:16px; font-weight:bolder;">
                                    <th  width="15">Sl</th>
                                    <th>Photo</th>
                                    <th  align="center" width="120">Application ID</th>
                                    <th align="center">Name of the Student</th>
                                    <th align="center" width="120">Signature</th>
                                </tr>

                                    <?php
                                    $i=1; 
		 		
	                               $sql=mysql_query("select * from  student_info_fbs where room_no='$room_no'");
	
                                    while($row_main=mysql_fetch_assoc($sql)){   
									                              
                                    ?>
                                    <tbody>
                                    <tr class="odd gradeA" style="font-size:14px;">
											<td width="30" style="font-weight:bolder; height:30px; text-align:center;"><?php echo $i; ?></td>
                                            <td align="center"> <img src="../../../picture/<?php echo $row_main['picture_file_data'];?>" style="width:60px; height:60px;" /></td>
                                            <td width="120" align="center" style="font-weight:bolder;"><?php echo $row_main['application_id']; ?></td>
                                            <td  style="font-weight:bolder; padding-left:10px; text-transform:uppercase;"><?php echo $row_main['applicant_name']; ?> </td>
		
											<td align="center"  width="120">&nbsp;</td>
                                     
                                    </tr>
                                    </tbody>
									 <?php
									    $count=mysql_num_rows($sql);
										if($i!=0 && $i%12==0){echo '</table><br/>'; ?>
										     
                                                
                                  <table width="100%">
                                                      
                                     <tr>
                                        <td colspan="5" height="40"></td>
                                     </tr>   
                             
                                     <tr>
  
                                        <td colspan="3"  align="left">
                                           <table border="1" rules="all">
                                           
                                              <tr>
                                                <td>
                                                   Total Present :
                                                </td>
                                                <td width="100"></td>
                                                
                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                   Total Absent :
                                                </td>
                                                <td width="100"></td>

                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                   Total :
                                                </td>
                                                <td width="100"></td>

                                              </tr>
                                           </table>
                                            
                                        </td>    
                                        
                                         <td colspan="2" align="right">
                                           <table>
                                           
                                              <tr>
                                                 <td>
                                                   ..........................................
                                                </td>
                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                    Signature of the Invigilator
                                                </td>
                                              </tr>
                                           
                                           </table>
                                            
                                        </td>	 

                                     </tr>   
                                </table>
										<?php 
										}
							
						               if($count != $i && $i%12==0){    echo "</div><div class='page'>";?>
                                        
                          
							<table width="100%" align="center">
							<tr>
							  <td colspan="5" align="center">
                              <b>
								<span style="font-size:20px;">Department of Youth Development</span>                      
                                <br />Center Name# : 
								<?php  echo $BhabanNameArray[$RooMBahanNameArray[$dataMinROW['room_no']]] ?>
   			                    <br/>
                               Room No. #: 
								<?php  echo $RooMNameArray[$dataMinROW['room_no']] ?>
                                <br />
								<u><b>Name of the Post: Casiher </b></u>
                           
							  </td>
							</tr>
							</table>
                           
										<?php	echo '<table width="100%" border="1"  align="center"  bordercolor="#000000" rules="all">'; ?>
                                        <tr style="font-size:16px; font-weight:bolder;">
                                            <th  width="15">Sl</th>
                                            <th  align="center" width="90">Photo</th>
                                            <th  align="center" width="120">Application ID</th>
                                            <th align="center">Name of the Student</th>
                                            <th align="center" width="120">Signature</th>
                                        </tr>
										<?php
											}									  
									 $i++; }
									 
									 ?>
                                     
                               </table>
                   
                               <table width="100%">
                                                      
                                     <tr>
                                        <td colspan="5" height="40"></td>
                                     </tr>   
                             
                                     <tr>
  
                                        <td colspan="3"  align="left">
                                           <table border="1" rules="all">
                                           
                                              <tr>
                                                <td>
                                                   Total Present :
                                                </td>
                                                <td width="100"></td>
                                                
                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                   Total Absent :
                                                </td>
                                                <td width="100"></td>

                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                   Total :
                                                </td>
                                                <td width="100"></td>

                                              </tr>
                                           </table>
                                            
                                        </td>    
                                        
                                         <td colspan="2" align="right">
                                           <table>
                                           
                                              <tr>
                                                 <td>
                                                   ..........................................
                                                </td>
                                              </tr>
                                           
                                              <tr>
                                                <td>
                                                    Signature of the Invigilator
                                                </td>
                                              </tr>
                                           
                                           </table>
                                            
                                        </td>	 

                                     </tr>   
                                </table>
									
										  
                       </div>
							  
                                  
                       
                 <?php 
					$html=ob_get_contents();	
					ob_clean();	
							
					foreach (glob("*.html") as $filename) {
						@unlink($filename);
					}
					//---------end------------//
					$name=time();
					$filename=$name.".html";
					$create_new_doc = fopen($filename, 'w');	
					$is_created = fwrite($create_new_doc,$html);
					echo 'report/'.$filename; 
					
					
					
			 ?>
				 
                 
                 
                 
                 