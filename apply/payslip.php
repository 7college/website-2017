<?php
session_start();
include("../dumerchant/login/config/config.php");
include("../dumerchant/login/config/common_array.php");
extract($_POST);
ob_start();
$sqlcheckunit=mysql_query("SELECT appsid,payid,unitid FROM fbs_unit_data WHERE appsid='".db_escape($appsid)."' AND unitid='".db_escape($unitid)."'");
$rowchekcunit=mysql_fetch_assoc($sqlcheckunit);   

$sql=mysql_query("SELECT * FROM fbs_applicant_data WHERE application_id='".db_escape($rowchekcunit['appsid'])."'");
$row=mysql_fetch_assoc($sql); 
//print_r($row);
 	
?>
   <style type="text/css">
            .page {
                width: 20cm;
                min-height: 29.7cm;
                padding: 1cm;

                margin: 0 auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
                #hide img{display:none;}
            }
            </style>
            
		<script>
        function myFunction() {
        window.print();
        }
        </script>
            
         <div class="page">

         <p align="right" colspan='3' onclick="myFunction()" id='hide'> <img src="../images/print.jpg" style="width:25px; height:25px; margin:0px; padding:0px;" /> </p>
             
		
		<fieldset>
          <table width="100%">
       
             
             <tr style="margin:0px; padding:0px;">
               <td width="20%">
               <img src='../images/logob.jpg' style="width:90px; height:100px; margin:0px; padding:0px;" />
               </td>
               <td width="60%" align="center">
						<h3 style="text-align:center;">
						Undergraduate Admission Test 2017-2018<br/>
						7 Colleges affiliated with University of Dhaka <br/>
						Pay Slip (Applicant's Copy)<br/><br/>
						<span style='font-size:12px; font-weight:bolder; border:2px solid black; border-radius:5px; padding:5px;'> Unit: <?php echo $unit[$rowchekcunit['unitid']]; ?></span>
						</h3>
               
               </td>
               <td width="20%" align='right'> 
			   <img src="../picture/<?php echo $row['picture'];?>" style="width:118px; height:118px;" />
			   </td>
             </tr>
       
	      </table>
        

		<table width='100%'>
			<tr>
				<td colspan="2"  style="font-size:11px; text-align:right;">
					   <?php echo date("Y-M-d H:i:s")?>
				</td>
			</tr>
		   <tr>
		     <td width='60%' valign='top'>
				 <table width="100%" border="1" rules="all" style="font-size:15px;">
					<tr>
					   <td>
					      <table>
						     <tr>
							    <td>
								   <img  src="../process/barcode.php?text=<?php echo $rowchekcunit['payid'];?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />
								   &nbsp;&nbsp;&nbsp; <b>PID: <?php echo $rowchekcunit['payid'];?></b>
								</td>
							 </tr> 
						  </table>
					   </td>
					    <td>
					      <table>
						     <tr>
							    <td>
		  							<img  src="../process/barcode.php?text=<?php echo $rowchekcunit['appsid'];?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />
								    &nbsp;&nbsp;&nbsp; <b>AID: <?php echo $rowchekcunit['appsid'];?> </b>
								</td>
							 </tr> 
						  </table>
					   </td>
					   
					 </tr>
					 
					 <tr>
					   <td>Name: </td>
					   <td> <b><?php echo $row['name'];?></b></td>
					 </tr>
					 <tr>
						 <td>Mobile: </td>
						 <td> <b><?php echo $row['mobile'];?></b></td>
					 </tr>

				</table>
				<table style='font-size:12px;'> 
				   <tr>
					  <td colspan='2'>
					   <ol >
						 <li>Payment could only be made through any branches of <span style="color:red;">Sonali Bank Ltd. (Online Branch) </span>only within 14.11.2017. </li>
						 <li>Pay Slip <span style="color:red;">CAN NOT BE USED</span> as a replacement of admit card.  </li>
						 <li> A/C Name: DU Affiliated Colleges, Account No. 44057-03000066 </li>
					  </ol>
					  </td>
				   </tr>
				</table>
			</td>
			<td width='40%' valign='top'>
				<table width="100%" border="1" rules="all" style="font-size:15px;">
					<tr>
					   <td colspan='2' align='center' style='background:#F6F6F6;'><b>Payment Summary</b></td>
					 </tr>
					 
					 <tr>
					       <td> Admission Fee <br/>(Excluding Bank Charge) </td>
						   <td> <b>400.00 Tk.</b></td>
					 </tr>
					 <tr>
						   <td colspan='2'> <b>Four Hundred Taka Only</b></td>
					 </tr>
					 <tr>
					   <td colspan='2' align='center' style='background:#F6F6F6;'><b> For bank use only </b></td>
					 </tr>
					 
					 <tr>
					       <td> Bank </td>
						   <td> <b>Sonali Bank Ltd.</b></td>
					 </tr>
					 <tr>
					       <td> Branch </td>
						   <td> <b></b></td>
					 </tr>
					 <tr>
					       <td> Date </td>
						   <td> <b></b></td>
					 </tr>
					 <tr>
					       <td> Scroll No. </td>
						   <td> <b></b></td>
					 </tr>
					 
				</table>
			</td>
		  </tr>
	   </table>
	  	
		<table width='100%'>
			  <tr>
				 <td colspan='2' height='30'></td>
			  </tr>  
		 
			  <tr>
					 <td style="font-size:18px; font-family:'Times New Roman', Times, serif;">
					 <i>
						---------------------------------------<br/>
						Applicant's  Signature with Date
					 </i>
					 </td>
					 <td  style="font-size:18px; font-family:'Times New Roman', Times, serif;" align='right'>
					 <i>
						---------------------------------------<br/>
						Bank officer's Signature with Seal
					 </i>
					 </td>
			  </tr>  
		</table>
	 </fieldset> 
	  <br/>
	  
	 
		<fieldset>
          <table width="100%">
       
             
             <tr style="margin:0px; padding:0px;">
               <td width="20%">
               <img src='../images/logob.jpg' style="width:90px; height:100px; margin:0px; padding:0px;" />
               </td>
               <td width="60%" align="center">
						<h3 style="text-align:center;">
						Undergraduate Admission Test 2017-2018<br/>
						7 Colleges affiliated with University of Dhaka <br/>
						Pay Slip (Bank Copy)<br/><br/>
						<span style='font-size:12px; font-weight:bolder; border:2px solid black; border-radius:5px; padding:5px;'> Unit: <?php echo $unit[$rowchekcunit['unitid']]; ?></span>
						</h3>
               
               </td>
               <td width="20%" align='right'> 
			   <img src="../picture/<?php echo $row['picture'];?>" style="width:118px; height:118px;" />
			   </td>
             </tr>
       
	      </table>
        

		<table width='100%'>
			<tr>
				<td colspan="2"  style="font-size:11px; text-align:right;">
					   <?php echo date("Y-M-d H:i:s")?>
				</td>
			</tr>
		   <tr>
		     <td width='60%' valign='top'>
				 <table width="100%" border="1" rules="all" style="font-size:15px;">
					<tr>
					   <td>
					      <table>
						     <tr>
							    <td>
								   <img  src="../process/barcode.php?text=<?php echo $rowchekcunit['payid'];?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />
								   &nbsp;&nbsp;&nbsp; <b>PID: <?php echo $rowchekcunit['payid'];?></b>
								</td>
							 </tr> 
						  </table>
					   </td>
					    <td>
					      <table>
						     <tr>
							    <td>
		  							<img  src="../process/barcode.php?text=<?php echo $rowchekcunit['appsid'];?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />
								    &nbsp;&nbsp;&nbsp; <b>AID: <?php echo $rowchekcunit['appsid'];?> </b>
								</td>
							 </tr> 
						  </table>
					   </td>
					   
					 </tr>
					 
					 <tr>
					   <td>Name: </td>
					   <td> <b><?php echo $row['name'];?></b></td>
					 </tr>
					 <tr>
						 <td>Mobile: </td>
						 <td> <b><?php echo $row['mobile'];?></b></td>
					 </tr>
				</table>
				<table style='font-size:12px;'> 
				   <tr>
				      <td colspan='2'>
					   <ol >
					     <li>Payment could only be made through any branches of <span style="color:red;">Sonali Bank Ltd. (Online Branch) </span>only within 14.11.2017. </li>
					     <li>Pay Slip <span style="color:red;">CAN NOT BE USED</span> as a replacement of admit card.  </li>
					     <li> A/C Name: DU Affiliated Colleges, Account No. 44057-03000066 </li>
					  </ol>
					  </td>
				   </tr>
				</table>

			</td>
			<td width='40%' valign='top'>
				<table width="100%" border="1" rules="all" style="font-size:15px;">
					<tr>
					   <td colspan='2' align='center' style='background:#F6F6F6;'><b>Payment Summary</b></td>
					 </tr>
					 
					 <tr>
					       <td> Admission Fee <br/>(Excluding Bank Charge) </td>
						   <td> <b>400.00 Tk.</b></td>
					 </tr>
					 <tr>
						   <td colspan='2'> <b>Four Hundred Taka Only</b></td>
					 </tr>
					 <tr>
					   <td colspan='2' align='center' style='background:#F6F6F6;'><b> For bank use only </b></td>
					 </tr>
					 
					 <tr>
					       <td> Bank </td>
						   <td> <b>Sonali Bank Ltd.</b></td>
					 </tr>
					 <tr>
					       <td> Branch </td>
						   <td> <b></b></td>
					 </tr>
					 <tr>
					       <td> Date </td>
						   <td> <b></b></td>
					 </tr>
					 <tr>
					       <td> Scroll No. </td>
						   <td> <b></b></td>
					 </tr>
					 
				</table>
			</td>
		  </tr>
	   </table>
	  	
		<table width='100%'>
			  <tr>
				 <td colspan='2' height='30'></td>
			  </tr>  
		 
			  <tr>
					 <td style="font-size:18px; font-family:'Times New Roman', Times, serif;">
					 <i>
						---------------------------------------<br/>
						Applicant's  Signature with Date
					 </i>
					 </td>
					 <td  style="font-size:18px; font-family:'Times New Roman', Times, serif;" align='right'>
					 <i>
						---------------------------------------<br/>
						Bank officer's Signature with Seal
					 </i>
					 </td>
			  </tr>  
		</table>
	 </fieldset> 
		
        </div>
		         
			<?php 
                $html=ob_get_contents();	
                ob_clean();	
              /*  foreach (glob("*.html") as $filename) 
				{
                    //@unlink($filename);
                }
			*/
                $name=rand(10,2000).time();
                $filename=$name.".html";
                $create_new_doc = fopen($filename, 'w');	
                $is_created = fwrite($create_new_doc,$html);
                echo 'apply/pay/'.$filename; 
            ?>   