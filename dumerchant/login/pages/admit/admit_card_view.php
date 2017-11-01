<?php
session_start();
include('../../config/config.php');
include('../../config/common_function.php');
$sqlcourseArray=mysql_query("SELECT * FROM fbs_course");
while($rowCourseArray=mysql_fetch_assoc($sqlcourseArray)){
	
	$coursenamearray[$rowCourseArray['coursecode']]=$rowCourseArray['coursename'];
	
}
	
	
	
$SQl=mysql_query("SELECT * FROM fbs_course_reg where dureg='".$_GET['pid']."'");
$row=mysql_fetch_assoc($SQl);


echo '<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">';
     echo '<meta charset="utf-8">';
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
       <p align='right' id='hide'><img src='../../images/print.png' onclick='myFunction()' style='width:50px; height:50px;'></p>

		<table width="90%" align='center'>
			 <tr>
				 
			   <td width='20%' style='border:1px solid gray; font-size:12px; text-align:center; height:160px; width:160px;'> Please attach a passport size photograph attasted by Principle of the College</td>

				 
				    
				 
				 <td align='center' width='50%'> <img src="../../images/logo.jpg" style="width:90px; height:90px;" /><br/> 
				  <span style='font-size:16px; font-weight:bolder;'> University of Dhaka </span><br/>
				  <span style='font-size:13px; font-weight:bolder;'> Honours 3<sup>rd</sup> Year Examination - 2016 <br/> (New and Old Syllabus) </span><br/><br/>
				  <span style='font-size:13px; font-weight:bolder; border:2px solid black; border-radius:5px; padding:5px;'> Admit Card</span><br/><br/>
				  </td>
                <td width='20%' valign='top' style='text-align:right; padding:0px; margin:0px;'>
				<div align='right' style='font-weight:bolder; width:160px; border:1px solid black;  border-radius:4px; padding:3px;'>
				       <table style="text-align:center;">
					      <tr>
						     <td><b>Exam Roll No.</b></td>
						  </tr>
					      <tr>
						     <td><img  src="../../config/barcode.php?text=<?php echo $row['examroll']; ?>" style="height:5mm; margin:0px; padding:0px; width:40mm;" /></td>
						  </tr>
					      <tr>
						     <td><b><?php echo $row['examroll']; ?></b></td>
						  </tr>
					  </table>
				</div>
			   </td>			 
			 
			 </tr>
		</table>
		
		<table width='90%' align='center' style="font-size:16px; font-weight:bolder;">
			 <tr style="margin:0px; padding:0px;">
			   <td align='right'>
					<div style='font-weight:bolder; width:200px; border:1px solid black; border-radius:5px; padding:5px;'>
					  <table style='text-align:center;'>
					      <tr>
						     <td><b>Registration Number</b></td>
						  </tr>
					      <tr>
						     <td><img  src="../../config/barcode.php?text=<?php  echo $row['dureg']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /></td>
						  </tr>
					      <tr>
						     <td><b><?php echo $row['dureg'];?></b></td>
						  </tr>
					  </table>
					
				   </div>
			    </td>
			 </tr>
			 <tr>
			  <td align='left' colspan='2'>
				<span style="padding-left:0px; font-size:15px; "> 
				
				<b>Reference: <?php echo $row['nureg'];?></b><br/> 
				
				</span>
			   </td>
			 </tr>
		</table>
        
		<div style="margin-left:150px;  opacity: 0.2; z-index:5; font-size:35px; position:absolute;"><img src="../../images/logo3.jpg" style="width:400px; height:420px;" /> </div> 
		<table rules='all' border='1' align='center' width='90%' style="font-size:14px; font-weight:bolder;">
	
		   <tr>
		      <td width='180'>Name of Examinee</td>
			  <td style='text-transform: uppercase;'><?php echo $row['stname']; ?></td>
		   </tr>
		   <tr>
		      <td>Father's Name</td>
			  <td style='text-transform: uppercase;'><?php echo $row['fname']; ?></td>
		   </tr>
		
		   <tr>
		      <td>Mother's Name</td>
			  <td style='text-transform: uppercase;'> <?php echo $row['mname']; ?></td>
		   </tr>
		
		</table>
		<br/>
		<table rules='all' border='1' align='center' width='90%' style="font-size:14px; font-weight:bolder;">
		   <tr>
		      <td width='180'>College Code & Name</td>
			  <td style='text-transform: uppercase;'>[<?php echo $row['collegecode']; ?>]  <?php echo $collegearray[$row['collegecode']]; ?></td>
		   </tr>
		   
		   <tr>
		      <td width='180'>Subject Code & Title</td>
			  <td style='text-transform: uppercase;'>[<?php echo $row['subcode']; ?>] <?php echo $subarray[$row['subcode']]; ?></td>
		   </tr>
		   <tr>
		      <td>Exam Center Name</td>
			  <td style='text-transform: uppercase;'>[<?php echo $row['centercode']; ?>] <?php echo $centerarray[$row['centercode']]; ?></td>
		   </tr>
		
		</table>
		<br/>
		
		


	      <table width="90%" align='center' border="1" rules="all" style="font-size:14px; font-weight:bolder;">
			<tr>
				   <th>Course Code </th>
				   <th>Course Title </th>
			</tr>
			<?php 
			$course=explode('#',$row['coursecode']);
			foreach($course AS $val){?>
				<tr>
				   <td width='140' align='center'><?php echo $val; ?> </td>
				   <td><?php echo $coursenamearray[$val]; ?> </td>
				</tr>
			<?php } ?>
	      </table>
          
		   <br/>
		   <br/>
		   
            
          <table width='90%' align='center'>
	      
              <tr>
				   <td> <img src='../../images/qrcode.jpg' style='width:100px; border:1px solid gray; height:100px;'/> </td>
				   <td align="right" style="text-align:center; width:250px;">
				    <img src="../../images/controller_en.jpg"style='width:200px; height:50px;'/><br/>
				   <b> Md. Bahalul Haque Chowdhury<br/>
					Controller of Examinations<br/>
				    University of Dhaka</b>
					
				   </td>
             </tr>
			 <tr>
			    <td colspan='2'>Note: Use of any electronic devices (mobile phone, digital watch or similar device) is strictly prohibited in the examination hall.</td>
			 </tr>
	      </table>
        </div>