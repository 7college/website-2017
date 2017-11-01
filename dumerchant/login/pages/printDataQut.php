<?php
 include('../config/config.php');
 include('../config/common_function.php');
 
$DistrictSql=mysql_query("SELECT id,district_name FROM fbs_district_list");
while($DisRow=mysql_fetch_assoc($DistrictSql)){
	 $DistrictName[$DisRow['id']]=$DisRow['district_name'];
}
$UpSql=mysql_query("SELECT id,upzila_name FROM upzila_list");
while($UPRow=mysql_fetch_assoc($UpSql)){
	 $UpName[$UPRow['id']]=$UPRow['upzila_name'];
}




?>
   <style type="text/css">
            .page {
                width: 20cm;
                min-height: 29.7cm;
                padding: 0;

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


	     <table width="100%" border="1" rules="all" style="font-size:12px;">
           
             <tr>
                <th>Sl</th>
                <th> ID</th>
                <th>Personal Info.</th>
                <th>Mobile</th>
                <th>Permanent Address</th>
                <th>Present Address</th>
                <th>District</th>
                <th>Queta</th>
             
             </tr>
           <?php
		        $i=1;
				$SQl=mysql_query("SELECT * FROM student_info_fbs where quata='".$_GET['pid']."' and payment_status='0' order by district ASC");
				while($row=mysql_fetch_assoc($SQl)){
		   ?>
             <tr style="font-size:10px;">
               <td align="center"> <?php echo  $i;?></td>
               <td> <?php echo $row['application_id'];?></td>
               <td> 
               Name: <?php echo $row['applicant_name'];?><br />
               F.Name: <?php echo $row['fathers_name'];?><br />
               M.Name: <?php echo $row['mothers_name'];?>
               
               </td>
               <td> <?php echo $row['mobile'];?></td>
               <td width="300"> C/o: <?php echo $row['care1'];?>, Village/Road : <?php echo $row['road1'];?>, District : <?php echo $DistrictName[$row['district1']];?>, P.S./Upazila  : <?php echo $UpName[$row['ps1']];?>, Post Office   : <?php echo $row['po1'];?>, Post Code: <?php echo $row['pc1'];?></td>
                 <td width="300"> C/o: <?php echo $row['care2'];?>, Village/Road : <?php echo $row['road2'];?>, District : <?php echo $DistrictName[$row['district2']];?>, P.S./Upazila  : <?php echo $UpName[$row['ps2']];?>, Post Office   : <?php echo $row['po2'];?>, Post Code: <?php echo $row['pc2'];?></td>
               <td> <?php echo $DistrictName[$row['district']];?></td> 
               <td> <?php echo $QuataArray[$row['quata']];?></td>
             </tr>
             
             <?php $i++; } ?>
             
          
       
	      </table> 
        
      </div>
      
        
        
        
        