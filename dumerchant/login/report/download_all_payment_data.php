
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<?php
		session_start();
		include('../config/config.php');
		include('../common/common_function.php');
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
                                        <th width="80">SSC</th>
                                        <th width="80">HSC</th>
                                        <th width="80">Degree</th>
                                        <th width="80">Masters</th>
                                        <th width="80">Others</th>
                                        <th width="80">Image</th>
                                        <th width="80">Payment Info</th>

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
                                            <td width="120">
                                            <a href='pages/html_preview.php?apps=<?php echo $row['application_id']; ?>' target="_blank"><?php echo $row['application_id']; ?> </a></td>
											<td><?php echo $row['applicant_name']; ?></td>
											<td><?php echo $row['mobile']; ?></td>
                                            <td><?php echo $row['district']; ?></td>

											<td>Cgpa:<?php if($row['ssc_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['ssc_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['ssc_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['ssc_equavalate_grade_type']==4){ echo $row['ssc_cgpa']; } ?><br /><br />Sub:<?php echo $row['ssc_sub']; ?><br /><br />Board:<?php echo $row['ssc_board']; ?></td>
											<td>Cgpa:<?php if($row['hsc_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['hsc_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['hsc_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['hsc_equavalate_grade_type']==4){ echo $row['hsc_cgpa']; } ?><br /><br />Sub:<?php echo $row['hsc_sub']; ?><br /><br />Board:<?php echo $row['hsc_board']; ?></td>
											<td>Cgpa:<?php if($row['ug_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['ug_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['ug_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['ug_equavalate_grade_type']==4){ echo $row['ug_cgpa']; } ?><br /><br />Sub:<?php echo $row['ug_sub']; ?><br /><br />Board:<?php echo $row['ug_board']; ?></td>
											<td>Cgpa:<?php  if($row['pg_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['pg_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['pg_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['pg_equavalate_grade_type']==4){ echo $row['pg_cgpa']; }
			    ?><br /><br />Sub:<?php echo $row['pg_sub']; ?><br /><br />Board:<?php echo $row['pg_board']; ?></td>
											<td>Cgpa:<?php if($row['others_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['others_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['others_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['others_equavalate_grade_type']==4){ echo $row['others_cgpa']; }
			    ?><br /><br />Sub:<?php echo $row['othres_subject']; ?><br /><br />Board:<?php echo $row['othres_board']; ?></td>
											
										
											<td><img src="../../../picture/<?php echo $row['picture_file_data']; ?>" style="width:110px; height:120px;" /></td>
                                           <td>Challan No. <?php echo $row['challan_no']; ?> <br/>Challan Date. <?php echo $row['challan_date']; ?></td>

                                    </tr>
                                    <?php $i++; }  ?>
                                    </tbody>
                               </table>
               
               
               
							  
                                  
                       
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
				 
                 
                 
                 
                 