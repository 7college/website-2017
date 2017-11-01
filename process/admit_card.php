<?php
session_start();
include("../admin/login/config/config.php");
$SQl=mysql_query("SELECT * FROM combile_data where id='".$_SESSION['id']."'");
$row=mysql_fetch_assoc($SQl);

$sqlBaban=mysql_query("SELECT * FROM fbs_manage_center");
while($rowBhaban=mysql_fetch_assoc($sqlBaban)){
	$BhabanNameArray[$rowBhaban['id']]=$rowBhaban['center_name'];
}
$sqlRoom=mysql_query("SELECT * FROM  fbs_room_setup");
while($rowRoom=mysql_fetch_assoc($sqlRoom)){
	$RooMNameArray[$rowRoom['id']]=$rowRoom['room_no'];
	$RooMBahanNameArray[$rowRoom['id']]=$rowRoom['baban_name'];
	$RooMFloorNameArray[$rowRoom['id']]=$rowRoom['floor_no'];
}
        	
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

          <table width="100%">
         <tr>
               <td align="right" colspan='3' onclick="myFunction()" id='hide'> <img src="../images/print.jpg" style="width:25px; height:25px; margin:0px; padding:0px;" /> </td>
             </tr> 
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
               <img src="../images/logo.jpg" style="width:100px; height:100px; margin:0px; padding:0px;" />
               </td>
               <td width="60%" align="center">
						<h3 style="text-align:center;">
						
						
						Undergraduate Admission Test Summer 2017-2018.<br/>
						Islamic University, Khustia <br/>
						Admit Card
						

						</h3>
               
               </td>
               <td width="20%"> <img src="../picture/<?php echo $row['picture'];?>" style="width:118px; height:118px;" /></td>
             </tr>
       
	      </table>
          
          <br />


 <table width="100%" style="font-size:19px;">
<tr>
            
              <td colspan='4'><h3 align='center'><u>Admit Card for Admission Test 2017-18</u></h3></td>
            </tr>

</table>


	      <table width="100%" border="1" rules="all" style="font-size:19px;">
            
            
            
             <tr style="background:#CCC">
               <td> Name </td>
               <td colspan="3"> <b><?php echo $row['name'];?></b></td>
             </tr>
             
             <tr>
               <td>Application ID :</td>
               <td> <b><?php echo $row['application_id'];?></b></td>
               <td> Roll No :</td>
               <td><b><?php echo $row['exam_roll_no'] ?></b></td>
             </tr>
             <tr style="background:#CCC">
                <td> Father's Name: </td>
                <td colspan="3"> <?php echo $row['fname'];?></td>
             </tr>
             
             <tr>
                
                <td> Mother's Name: </td>
                <td> <?php echo $row['mname'];?></td>
                
                 <td> Mobile: </td>
                 <td> <?php echo $row['mobile'];?></td>
             </tr>
             
             <tr  style="background:#CCC">
               <td> Building Name: </td>
               <td> <?php echo $BhabanNameArray[$RooMBahanNameArray[$row['room_no']]];?></td>
             
               <td> Room No: </td>
               <td> <b><?php echo $RooMNameArray[$row['room_no']];?></b> </td>
             </tr>
       
       
	      </table>

	      <table width="100%">
              <tr>
                <td height="50"></td>
              </tr>
              <tr>
                 <td colspan="2"> <h3 align="center">Exam Test Date :  September 30th, 2016 (Friday) at 3.00 PM-5.00 PM. </h3></td>
              </tr>
              
              <tr>
                 <td colspan="2"> <h3 align="center">[Read the Following Instructions Carefully]</h3></td>
              </tr>
              
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"> <b>1. Bring your admit card to the test center and show it to the invigilator when asked. </b></td>
              </tr>
              
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"> <b>2. Use only black ball point pen to darken all required circles on the answer sheet. <br/> &nbsp;&nbsp;&nbsp; Use of pencil is not allowed.</b></td>
              </tr>
              
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"><b> 3. Use of any electronic devices (mobile phone, digital watch etc.) is strictly prohibited <br/> &nbsp;&nbsp;&nbsp; in the examination hall.</b> </td>
              </tr>
              
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"><b> 4. Use of calculator is not allowed.</b> </td>
              </tr>
              
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"><b> 5. Your dress-up and arragement of hair should be such that your ears are completely <br/> &nbsp;&nbsp;&nbsp; visible at all times.</b></td>
              </tr>
              
       
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"><b> 6. Applicants adopting unfair means will be expelled from the admission test.</b></td>
              </tr>  
              <tr>
                 <td colspan="2" style="font-size:16px; font-family:'Times New Roman', Times, serif;"><b> 7. 
                 You will not the allowed to enter the exam hall after 10 minutes of the start of the examination  and will <br />  &nbsp;&nbsp;&nbsp; not be allowed to leave 10 minutes before the end of the examination.                
                  </b></td>
              </tr>
             
             <tr>
                 <td colspan="2" style="font-size:18px; height:100px; font-family:'Times New Roman', Times, serif;"></td>
              </tr>   <tr>
                 <td colspan="2" style="font-size:18px; font-family:'Times New Roman', Times, serif;"><i>Print Date: <?php echo date('Y-m-d'); ?></i></td>
              </tr>
	      </table>
        </div>