

<?php
session_start();
include('../config/config.php');
include('../common/common_function.php');

		 
$DistrictSql=mysql_query("SELECT id,district_name FROM fbs_district_list");
while($DisRow=mysql_fetch_assoc($DistrictSql)){
	 $DistrictName[$DisRow['id']]=$DisRow['district_name'];
}
$UpSql=mysql_query("SELECT id,upzila_name FROM upzila_list");
while($UPRow=mysql_fetch_assoc($UpSql)){
	 $UpName[$UPRow['id']]=$UPRow['upzila_name'];
}

		extract($_REQUEST);
		ob_start();
		
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

                  <table  border="1" rules="all">
								<thead>
                                  <tr style="font-size:10px;">
                                        <th  width="35">Sl</th>
                                        <th data-orderable="true">Apps ID</th>
                                        <th data-orderable="true">Name</th>
                                        <th>Phone</th>
                                        <th>District</th>
										


                                </tr>
								</thead>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $i=1; 
                                    $sql=mysql_query("select * from student_info_fbs") or die(); 
                                    while($row=mysql_fetch_assoc($sql)){
                                    ?>
                                    <tr class="odd gradeA" style="font-size:12px;">
											<td width="35"><?php echo $i; ?></td>
                                            <td width="120"><?php echo $row['application_id']; ?> </td>
											<td><?php echo $row['applicant_name']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $DistrictName[$row['district']]; ?></td>
											
                                    </tr>
                                    <?php $i++; }  ?>
                                    </tbody>
                               </table>
               
               
               
							  
                                  
                       
                 <?php 
					$html=ob_get_contents();	
					ob_clean();	
							
					foreach (glob("*.xls") as $filename) {
						@unlink($filename);
					}
					//---------end------------//
					$name=time();
					$filename=$name.".xls";
					$create_new_doc = fopen($filename, 'w');	
					$is_created = fwrite($create_new_doc,$html);
					echo 'report/'.$filename; 
					
					
					
			 ?>
				 
                 
                 
                 
                 