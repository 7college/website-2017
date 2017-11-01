<?php 
session_start();
include('../admin/login/config/config.php');
include('../process/common_array.php');
$sql=mysql_query("SELECT * FROM combile_data WHERE id='".$_GET['pid']."'");
$row=mysql_fetch_assoc($sql); 


$sqlDisctrict=mysql_query("SELECT * FROM fbs_district_list");
while($rowDistrict=mysql_fetch_assoc($sqlDisctrict)){

$DistName[$rowDistrict['id']]=$rowDistrict['district_name_en'];

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
    <p align="right" onclick="myFunction()" id='hide'> <img src="../images/print.jpg" style="width:25px; height:25px; margin:0px; padding:0px;" /></p>
    
             <br />  
			    <table width="100%">
                <tr style="margin:0px; padding:0px;">
				<td width="20%"> <img src='../images/logo.jpg' style="width:100px; height:100px; margin:0px; padding:0px;" /></td>
				
				
					<td width="60%" align="center">
						<h3 style="text-align:center;">

					     Undergraduate Admission Test Summer 2017-2018.<br/>
						 Islamic University, Khustia <br/>
						 Student Information

						</h3>

					</td>
               <td width="20%"> </td>
             </tr>
	
	      </table>
	
    
    <table border="1" rules="all" width="100%">
        <tr><td><b>Application ID:</b></td><td><b><?php echo $row['application_id']?></b></td><td rowspan="6" align="right" width="170"><img src="../picture/<?php echo $row['picture']?>" style="height:180px; width:170px;  border:2px solid green; "/></td></tr>
        <tr><td><b>Applicant Name:</b></td><td><?php echo $row['name']?></td></tr>
        <tr><td><b>Father`s Name:</b></td><td><?php echo $row['fname']?></td></tr>
        <tr><td><b>Mother`s Name:</b></td><td><?php echo $row['mname']?></td></tr>
        <tr><td><b>Mobile:</b></td><td><?php echo $row['mobile']?></td></tr>
        <tr><td><b>Gender:</b></td><td><?php  if($row['sex']=='m'){ echo "Male";} else{ echo "Female";}?></td></tr>
    </table>
    <br />

    <table border="1" rules="all" width="100%" style="text-align:left;">
        <thead>
        <tr><td style=" font-weight:bold;font-size:16px" colspan="6">Academic Information</th></tr>
        <tr>
            <th>Degree</th>
            <th>Roll</th>
            <th>Board</th>
            <th>Group</th>
            <th>CGPA</th>
            <th>Passing Year</th>
           
        </tr>
       </thead>
       <tbody>
            <td>SSC/Equivalent</td>
            <td><?php echo $row['sscroll']?></td>
            <td><?php echo $board[$row['sscboard']]?></td>
            <td><?php echo $row['sscgrp']?></td>
            <td><?php echo $row['sscgpa']?></td>
            <td><?php echo $row['sscpass']?></td>
         </tr>  
         <tr>
            <td>HSC/Equivalent</td>
            <td><?php echo $row['hscroll']?></td>
            <td><?php echo $board[$row['hscboard']]?></td>
            <td><?php echo $row['hscgrp']?></td>
            <td><?php echo $row['hscgpa']?></td>
            <td><?php echo $row['hscpass']?></td>
         </tr>  
       </tbody>
    </table>
     <br />
    
    <table border="1" rules="all" width="100%" style="text-align:left;">
        <thead>
        <tr><td style=" font-weight:bold;font-size:16px" colspan="6">Othrer's Information</th></tr>
        <tr>
            <th>Quata</th>
            <th>Mobile</th>
            <th>District</th>
            <th>Unit</th>
			<th>Payment</th>
      
        </tr>
       </thead>
       <tbody>
        <tr>
           
            <td><?php echo $quata[$row['quata']]; ?></td>
            <td><?php echo $row['mobile']?></td>
            <td><?php echo $DistName[$row['district']];?></td>
            <td><?php echo $unit[$row['unit']]; ?></td>
			<td><?php if($row['payment']==1) { echo 'Paid'; } else { echo 'Unpaid'; }?></td>
         </tr>  
        
       </tbody>
    </table>
  
</div>