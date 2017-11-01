<?php
		session_start();
		include('../config/config.php');
		include('../common/common_function.php');
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
		
		
		
    $idata=substr($id,0,-1);
	
		
		
	$sql3=mysql_query("select * from  student_info_fbs where application_id in($idata)");
	while($row=mysql_fetch_assoc($sql3)){	
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

          <table width="100%">
             <tr>
               <td width="100%" colspan="2" align="center" > <img src="../../../images/logo.jpg" style="width:90px; height:100px; margin:0px;padding-left:140px;" /> </td>

             </tr> 
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
                <img  src="../../../process/barcode.php?text=<?php  echo $row['application_id']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />

                <span style="padding-left:20px; font-size:12px; "> <b>Application ID: <?php echo $row['application_id'];?></b> </span>
                
               </td>
               <td width="60%" align="center">
                 <h3 style="font-size:14px;">
                      Department of Youth Development<br />
					  Ministry of Youth and Sports <br />
                      Name of the Post: Cashier<br />
                      <u>Applicant Copy </u>
                 </h3>
               
               </td>
               <td width="20%"> <img src="../../../picture/<?php echo $row['picture_file_data'];?>" style="width:70px; height:80px;" /></td>
             </tr>
             
          
	      </table>
	     <table width="100%" border="1" rules="all" style="font-size:12px;">
            <tr>
               <td colspan="4"> <b>Personal Information</b> </td>
             </tr>
             <tr>
               <td> Name of the Applicant: </td>
               <td > <?php echo $row['applicant_name'];?></td>
               <td>Password</td>
               <td> <?php echo $row['password'];?> </td>
             </tr>
             
             <tr>
                    <td> Father's Name: </td>
                    <td> <?php echo $row['fathers_name'];?></td>
                    <td> Mother's Name: </td>
                    <td> <?php echo $row['mothers_name'];?></td>
             </tr>
               <tr>
               <td> Mailing/Present Address : </td>
               <td colspan="3"> C/o: <?php echo $row['care1'];?>, Village/Road : <?php echo $row['road1'];?>, District : <?php echo $DistrictName[$row['district1']];?>, P.S./Upazila  : <?php echo $UpName[$row['ps1']];?>, Post Office   : <?php echo $row['po1'];?>, Post Code: <?php echo $row['pc1'];?></td>
             </tr>
			 
			 
             <tr>
               <td> Permanent Address: </td>
                 <td colspan="3"> C/o: <?php echo $row['care2'];?>, Village/Road : <?php echo $row['road2'];?>, District : <?php echo $DistrictName[$row['district2']];?>, P.S./Upazila  : <?php echo $UpName[$row['ps2']];?>, Post Office   : <?php echo $row['po2'];?>, Post Code: <?php echo $row['pc2'];?></td>
             </tr>
             
             <tr>
               <td> District: </td>
               <td> <?php echo $DistrictName[$row['district']];?></td>
             
               <td> Email: </td>
               <td> <?php echo $row['email'];?></td>
             </tr>
       
             
             <tr>
               <td> Date of Birth: </td>
               <td> <?php echo $row['date_of_birth'];?></td>
             
               <td> Blood Group: </td>
               <td> <?php echo $blood_group[$row['blood_group']];?></td>
             </tr>
             <tr>
               <td> Gender : </td>
               <td> <?php echo $row['gender'];?></td>
             
               <td> Marital Status: </td>
               <td> <?php echo $row['Meritarial_status'];?></td>
             </tr>
             <tr>
               <td> Religion : </td>
               <td> <?php echo $row['religion'];?></td>
             
               <td> Quata: </td>
               <td> <?php echo $QuataArray[$row['quata']];?></td>
             </tr>
             
             <tr>

             
               <td> Mobile: </td>
               <td> <?php echo $row['mobile'];?></td>
			   <td> NID/ Birth Certificate No.: </td>
               <td> <?php echo $row['nid'];?></td>
             </tr>
       
	      </table>

         <br/>
	     <table width="100%" border="1" rules="all" style="font-size:12px;">
            
             <tr>
               <td colspan="6"> <b>Educational Qualification</b> </td>
             </tr>
             
             <tr>
               <td> Certificate/Degree Obtained </td>
               <td> Group/ Subject </td>
               <td> Board/ University </td>
               <td> GPA/Class/<br />Division </td>
               <td> Passing Year </td>
               
             </tr>
             
             <tr>
               <td> <?php echo $DegreeEquavalent[$row['ssc_degree']];?></td>
               <td> <?php echo $row['ssc_sub'];?> </td>
               <td> <?php echo $row['ssc_board'];?> </td>
               <td> <?php 
			    if($row['ssc_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['ssc_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['ssc_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['ssc_equavalate_grade_type']==4){ echo $row['ssc_cgpa']; }
			   
			   ;?> </td>
               <td> <?php echo $row['ssc_passing_year'];?> </td>
              
             </tr>
             
             <tr>
               <td> <?php echo $DegreeEquavalent[$row['hsc_degree']];?></td>
               <td> <?php echo $row['hsc_sub'];?> </td>
               <td> <?php echo $row['hsc_board'];?> </td>
               <td> 
			   
			   
			   <?php 
			   if($row['hsc_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['hsc_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['hsc_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['hsc_equavalate_grade_type']==4){ echo $row['hsc_cgpa']; }
			   
			   ?> </td>
               <td> <?php echo $row['hsc_passing_year'];?> </td>

             </tr>
             
             <tr>
               <td> <?php echo $DegreeEquavalent[$row['ug_degree']];?></td>
               <td> <?php echo $row['ug_sub'];?> </td>
               <td> <?php echo $row['ug_board'];?> </td>
               <td> 
               <?php 
			   if($row['ug_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['ug_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['ug_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['ug_equavalate_grade_type']==4){ echo $row['ug_cgpa']; }
			   
			   ?>
               
               </td>
               <td> <?php echo $row['ug_passing_year'];?> </td>
             
             </tr>
             <?php if($row['pg_degree']!=0){ ?>
             <tr>
               <td> <?php echo $DegreeEquavalent[$row['pg_degree']];?></td>
               <td> <?php echo $row['pg_sub'];?> </td>
               <td> <?php echo $row['pg_board'];?> </td>
               <td> 
               <?php 
			   if($row['pg_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['pg_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['pg_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['pg_equavalate_grade_type']==4){ echo $row['pg_cgpa']; }
			   
			   ?>
               
               </td>
               <td> <?php echo $row['pg_passing_year'];?> </td>
           
             </tr>
             <?php }  if($row['others_degree']!=0){?>
             <tr>
               <td> <?php echo $DegreeEquavalent[$row['others_degree']];?></td>
               <td> <?php echo $row['othres_subject'];?> </td>
               <td> <?php echo $row['othres_board'];?> </td>
               <td> <?php //echo $row['others_cgpa'];?>
                <?php 
			   if($row['others_equavalate_grade_type']==1){ echo "1st Class"; }
			    else if($row['others_equavalate_grade_type']==2){ echo "2nd Class"; }
			    else if($row['others_equavalate_grade_type']==3){ echo "3nd Class"; }
			    else if($row['others_equavalate_grade_type']==4){ echo $row['others_cgpa']; }
			   
			   ?>
                </td>
               <td> <?php echo $row['othres_passing_year'];?> </td>
        
             </tr>
             <?php } ?>
             
             
          
       
	      </table> 
          <br />
          <table width="100%" border="1" rules="all" style="font-size:12px;">
            
             <tr>
               <td colspan="6"> <b>Payment Information </b> </td>
             </tr>
             
             <tr>
               <td> Bank Name </td>
			   <td> Branch Name </td>
               <td> Treasury challan No.</td>
               <td> Challan Date </td>
             </tr>
             <tr>
               <td> <?php echo $row['bank_name'];?> </td>
               
			   <td> <?php echo $row['branch_name'];?></td>
			   <td> <?php echo $row['challan_no'];?></td>
               <td> <?php echo $row['challan_date'];?></td>
             </tr>
             
            
       
	      </table>
          
          <br />
          <table width="100%">
            
             
               
             <tr>
               <td colspan="2" height="20"></td>
             </tr>
             
             
             <tr>
               <td align="left">Date : <?php echo date('d M, Y') ?></td>
               <td align="right">
			   <img src="../../../picture/<?php echo $row['signature_file_upload'];?>" style="width:160px; height:50px;" />
			   <br/>
			   (Signature of the Applicant)</td>
             </tr>
             <tr>
               <td colspan="2" height="10"></td>
             </tr>
          
             <tr>
			   <img src="../../../picture/<?php echo $row['challan_attach'];?>" style="width: 18cm; height:300px"  />
			 
			 </tr>
             
	      </table>
        </div>
        
  <?php 
	}
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
				 
                 
                 
                 
                       
        
        
        