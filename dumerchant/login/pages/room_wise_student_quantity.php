<?php
session_start();
include('../config/config.php');
include('../common/common_function.php');


$SQl=mysql_query("SELECT `hallName` , `floorNao` , `room_no` , count( id ) AS Quantity
FROM `student_info_fbs` where status='1'
GROUP BY `room_no` ");


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
            }
            </style>
            
        <div class="page">
         <table width="100%" align="center">
           <tr>
              <td colspan="4">
                <h3 align="center">Faculty Of Business Studies<br />MBA (Evening) Program<br />University of Dhaka</h3>
              </td>
           </tr>
         </table>
	     <table width="100%" border="1" rules="all">
            <thead>
             <tr>
               <th> Baban Name </th>
               <th> Floor No</th>
               <th> Room No </th>
               <th> Qty </th>
             </tr>
            </thead>
            <tbody>
             <?php
			    while($row=mysql_fetch_assoc($SQl)){
			 ?>
             <tr>
               <td> <?php echo $bhabanNo[$row['hallName']]; ?> </td>
               <td> <?php echo  $floor_no[$row['floorNao']]; ?></td>
               <td> Room No: <?php echo $row['room_no']; ?> </td>
               <td align="right"><b> <?php echo $row['Quantity']; ?>  <?php $total+=$row['Quantity']; ?></b></td>
             </tr>
             <?php } ?>
             <tr>
               <td colspan="4" align="right"><b>Total : <?php echo $total;?></b></td>
             </tr>
            </tbody>
           </table>             
    </div>