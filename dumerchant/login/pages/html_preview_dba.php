<title>Application Form</title>
<?php
session_start();
$host="localhost";
 // $user="fbs_website";
  $user="fbdu_dba";
  //$password="";
  $password="AFrhJt).,WEl";
  //$db="fbdu_web";
  $db="fbdu_dba";
  
  $conn=mysql_connect($host,$user,$password);
  if($conn){
     mysql_select_db($db,$conn);
	// echo "done";
  }else{
    echo "Data connection field".mysql_error(); die;
  }
include('../common/common_function.php');

$SQl=mysql_query("SELECT * FROM student_info_fbs where application_id='".$_GET['apps']."'");
$row=mysql_fetch_assoc($SQl)

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
			    img#hide{display:none;}


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
               <td width="100%" colspan="2" align="center" > <img src="../../../images/logo2.jpg" style="width:90px; height:90px; margin:0px;padding-left:140px;" /> </td>
                              <td width="100%" align="right" onclick="myFunction()" id='hide'> <img src="../../../images/print.jpg" style="width:40px; height:40px; margin:0px; padding:0px;" /> </td>

             </tr> 
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
               <img  src="../../../controller/barcode.php?text=<?php  echo $row['application_id']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />

                <span style="padding-left:20px; font-size:12px; "> <b>DBA Login ID: <?php echo $row['application_id'];?></b> </span>
                
               </td>
               <td width="60%" align="center">
                 <h3>
                      Doctor of Business Administration (DBA)<br />
                      Faculty of Business Studies<br />
                      University of Dhaka<br />
                      <u>Application Form (Office Copy)</u>
                 </h3>
               
               </td>
                             <td width="20%"> <img src="../../../../dba/picture/<?php echo $row['picture_file_data'];?>" style="width:110px; height:120px;" /></td>

                </tr>
          
	      </table>
          
          <br />
          
          <br />


<table width="100%" border="1" rules="all" style="font-size:14px;">
            
             <tr>
               <td> Name of the Applicant: </td>
               <td colspan="3"> <?php echo $row['applicant_name'];?></td>
             </tr>
             
             <tr>
                    <td> Father's Name: </td>
                    <td> <?php echo $row['fathers_name'];?></td>
                    <td> Mother's Name: </td>
                    <td> <?php echo $row['mothers_name'];?></td>
             </tr>
            
             <tr>
               <td> Permanent Address: </td>
               <td colspan="3"> <?php echo str_replace("shanta","'",$row['permanent_addres']);?></td>
             </tr>
             
             <tr>
               <td> Present Address: </td>
               <td colspan="3"> <?php echo str_replace("shanta","'",$row['present_address']);?></td>
             </tr>
             
             <tr>
               <td> Occupation: </td>
               <td> <?php echo $row['occupational'];?></td>
             
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

             
               <td> Mobile: </td>
               <td> <?php echo $row['mobile'];?></td>
             </tr>
       
	      </table>

         <br/>
	     <table width="100%" border="1" rules="all" style="font-size:14px;">
            
             <tr>
               <td colspan="6"> <b>Educational Qualification</b> </td>
             </tr>
             
             <tr>
               <td> Certificate/Degree Obtained </td>
               <td> Group/ Subject </td>
               <td> Board/ University </td>
               <td> GPA/Class/<br />Division </td>
               <td> Passing Year </td>
               <td> Course Duration </td>
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
               <td> <?php echo $row['ssc_duration'];?> Years </td>
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
               <td> <?php echo $row['hsc_duration'];?> Years </td>
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
               <td> <?php echo $row['ug_duration'];?> Years </td>
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
               <td> <?php echo $row['pg_duration'];?> Years </td>
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
               <td> <?php echo $row['othres_duration'];?> Years </td>
             </tr>
             <?php } ?>
             <tr>
               <td colspan="5"> Total Years of Schooling (Use the brochure to fill in the column) </td>
               <td>   <?php echo $row['Total_School'];?> Years </td>
             </tr>
             
          
       
	      </table> 
          <br />
          <table width="100%" border="1" rules="all" style="font-size:14px;">
            
             <tr>
               <td colspan="6"> <b>Professional Experience </b> </td>
             </tr>
             
             <tr>
               <td colspan="2"> Organization </td>
               <td> Position Held</td>
               <td> Area of Exprience</td>
               <td> Period   from</td>
               <td> Period   to</td>
             </tr>
             <?php if($row['org_1']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['org_1'];?></td>
               <td> <?php echo $row['ph_1'];?> </td>
               <td> <?php echo $row['exp_1'];?> </td>
               <td> <?php echo $row['from_1'];?> </td>
               <td> <?php echo $row['to_1'];?> </td>
             </tr>
             <?php } if($row['org_2']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['org_2'];?></td>
               <td> <?php echo $row['ph_2'];?> </td>
               <td> <?php echo $row['exp_2'];?> </td>
               <td> <?php echo $row['from_2'];?> </td>
               <td> <?php echo $row['to_2'];?> </td>
             </tr>
             <?php } if($row['org_3']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['org_3'];?></td>
               <td> <?php echo $row['ph_3'];?> </td>
               <td> <?php echo $row['exp_3'];?> </td>
               <td> <?php echo $row['from_3'];?> </td>
               <td> <?php echo $row['to_3'];?> </td>
             </tr>
             <?php } ?>
             <tr>
               <td colspan="5"> Total Years of Exprience (Use the brochure to fill in the column) </td>
               <td> <?php echo $row['Total_Exprience'];?> </td>
             </tr>
       
	      </table>
          
          
                    <br />
          <table width="100%">
            
             <tr>
               <td colspan="2"><b> I certify that the information provided in this application form is true and correct. I understand that my application for VIVA will be cancelled if any information is found untrue.</td>
             </tr>
             
             
               
             <tr>
               <td colspan="2" height="20"></td>
             </tr>
             
             
             <tr>
               <td align="left">Date : <?php echo date('d M, Y') ?></td>
               <td align="right">
               (Signature of the Applicant)
               </td>
             </tr>
             <tr>
               <td colspan="2" height="10"></td>
             </tr>
	      </table>
        </div>
        
        