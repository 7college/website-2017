<?php
session_start();
include('../config/config.php');
$universityArr=array('1'=>"University of Dhaka",'2'=>"University of Chittagong",'3'=>"Sher-e-Bangla Agricultural University",'4'=>"Shahjalal University of Science and Technology",'5'=>"Rajshahi University",'6'=>"Rajshahi University of Engineering & Technology",'7'=>"Patuakhali Science and Technology University",'8'=>"Pabna University of Science and Technology",'9'=>"Noakhali Science and Technology University",'10'=>"Mawlana Bhashani Science and Technology University",'11'=>"Khulna University",'12'=>"Khulna University of Engineering & Technology",'13'=>"Jessore Science & Technology University",'14'=>"Jatiya Kabi Kazi Nazrul Islam University",'15'=>"Jahangirnagar University",'16'=>"Jagannath University",'17'=>"Islamic University",'18'=>"Hajee Mohammad Danesh Science & Technology University",'19'=>"Dhaka University of Engineering & Technology",'20'=>"Comilla University",'21'=>"Chittagong Veterinary and Animal Sciences University",'22'=>"Chittagong University of Engineering & Technology",'23'=>"Begum Rokeya University",'24'=>"Barisal University",'25'=>"Bangladesh University of Textiles",'26'=>"Bangladesh University of Professionals",'27'=>"Bangladesh University of Engineering and Technology",'28'=>"Bangladesh Agricultural University",'29'=>"Bangabandhu Sheikh Mujibur Rahman Science and Technology University",'30'=>"Bangabandhu Sheikh Mujibur Rahman Agricultural University",'31'=>"Bangabandhu Sheikh Mujib Medical University",'32'=>"Ahsanullah University",'33'=>"American International University of Bangladesh",'34'=>"Asa University Bangladesh",'35'=>"Asian University of Bangladesh",'36'=>"Atish Dipankar University of Science and Technology",'37'=>"Bangladesh Islami University",'38'=>"Bangladesh University of Business and Technology",'39'=>"Bangladesh University",'40'=>"Begum Gulchemonara Trust University",'41'=>"BRAC University",'42'=>"Central Women's University",'43'=>"City University, Bangladesh",'44'=>"Daffodil International University",'45'=>"Darul Ihsan University",'46'=>"Dhaka International University",'47'=>"East Delta University",'48'=>"East West University",'49'=>"Eastern University, Bangladesh",'50'=>"Gono Bishwabidyalay",'51'=>"Green University of Bangladesh",'52'=>"IBAIS University",'53'=>"Independent University, Bangladesh",'54'=>"International Islamic University, Chittagong",'55'=>"International University of Business Agriculture and Technology",'56'=>"Leading University",'57'=>"Manarat International University",'58'=>"Metropolitan University",'59'=>"Millennium University",'60'=>"North South University",'61'=>"Northern University, Bangladesh",'62'=>"People's University of Bangladesh",'63'=>"Premier University, Chittagong",'64'=>"Presidency University",'65'=>"Prime University",'66'=>"Primeasia University",'67'=>"Pundra University of Science and Technology",'68'=>"Queens University",'69'=>"Royal University of Dhaka",'70'=>"Shanto-Mariam University of Creative Technology",'71'=>"Southeast University",'72'=>"Southern University, Bangladesh",'73'=>"Stamford University Bangladesh",'74'=>"State University of Bangladesh",'75'=>"Sylhet International University",'76'=>"United International University",'77'=>"University of Asia Pacific (Bangladesh",'78'=>"University of Development Alternative",'79'=>"University of Information Technology and Sciences",'80'=>"University of Liberal Arts Bangladesh",'81'=>"University of Science & Technology Chittagong",'82'=>"University of South Asia, Bangladesh",'83'=>"Uttara University",'84'=>"Victoria University of Bangladesh",'85'=>"World University of Bangladesh",'88'=>"National University",'86'=>'Others', '87'=>'Foreign');


 $DeptArr=array(1=>'Department of Management',8=>'Department of  Accounting & information system',3=>'Department of Finance',2=>'Department of Marketing',5=>'Department of Management Information Systems',6=>'Department of International Business',4=>'Department of Banking and Insurance',7=>'Department of Tourism and Hospitality Management'); 
$Degree_title=array('2'=>'H.S.C /Equivalent','1'=>'S.S.C/ Equivalent','3'=>'Degree/ Honours','4'=>'Masters','5'=>'M.Phil','6'=>'Doctoral','7'=>'Diploma','8'=>'Others'); 
$blood_group=array(1=>"A+",2=>"A-",3=>"B+",4=>"B-",5=>"AB+",6=>"AB-",7=>"O+",8=>"O-");

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
               <td width="100%" colspan="3" align="center"> <img src="../../../images/logo2.jpg" style="width:90px; height:90px; margin:0px; padding:0px;" /> </td>
             </tr> 
             <tr>
               <td width="100%" colspan="3" align="right" onclick="myFunction()"> <img src="../../../images/print.jpg" style="width:25px; height:25px; margin:0px; padding:0px;" /> </td>
             </tr> 
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
               <img  src="../../../emba/barcode.php?text=<?php  echo $row['application_id']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />

                <span style="padding-left:20px; font-size:12px; "> <b>Application ID: <?php echo $row['application_id'];?></b> </span>
                
               </td>
               <td width="60%" align="center">
                 <h3>
                      MBA (EVENING) PROGRAM<br />
                      Faculty of Business Studies<br />
                      University of Dhaka<br />
                      <u>Application Form (Office Copy)</u>
                 </h3>
               
               </td>
               <td width="20%"> <img src="../../../picture/<?php echo $row['picture_file'];?>" style="width:110px; height:120px;" /></td>
             </tr>
          
	      </table>
          
          <br />



	     <table width="100%" border="1" rules="all" style="font-size:14px;">
            
             <tr style="background:#CCC">
               <td> Name </td>
               <td> <?php echo $row['applicant_name'];?></td>
               <td> Roll </td>
               <td> <?php echo $row['exam_roll_no'];?></td>
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
             
             <tr style="background:#CCC">
               <td> Hall Name: </td>
               <td> <?php echo $row['hall_name'];?></td>
             
               <td> Room No: </td>
               <td> <?php echo $row['hallno'];?></td>
             </tr>
       
             <tr>
               <td> Telephone: </td>
               <td> <?php echo $row['telephone'];?></td>
             
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
               <td> <?php echo $Degree_title[$row['secondary']];?></td>
               <td> <?php echo $row['secondary_subject'];?> </td>
               <td> <?php echo $row['secondary_board'];?> </td>
               <td> <?php echo $row['secondary_cgpa'];?> </td>
               <td> <?php echo $row['secondary_passing_year'];?> </td>
               <td> <?php echo $row['secondary_duration'];?> Years </td>
             </tr>
             
             <tr>
               <td> <?php echo $Degree_title[$row['higher_secondery_degree']];?></td>
               <td> <?php echo $row['higher_secondery_subject'];?> </td>
               <td> <?php echo $row['higher_secondery_board'];?> </td>
               <td> <?php echo $row['higher_secondery_cgpa'];?> </td>
               <td> <?php echo $row['higher_secondary_passing_year'];?> </td>
               <td> <?php echo $row['higher_secondary_duration'];?> Years </td>
             </tr>
             
             <tr>
               <td> <?php echo $Degree_title[$row['honourse_degree']];?></td>
               <td> <?php echo $row['honourse_subject'];?> </td>
               <td> <?php echo $universityArr[$row['honourse_board']];?> </td>
               <td> <?php echo $row['honourse_cgpa'];?> </td>
               <td> <?php echo $row['honourse_passing_year'];?> </td>
               <td> <?php echo $row['honourse_duration'];?> Years </td>
             </tr>
             <?php if($row['masters_degree']!=0){ ?>
             <tr>
               <td> <?php echo $Degree_title[$row['masters_degree']];?></td>
               <td> <?php echo $row['masters_subject'];?> </td>
               <td> <?php echo $universityArr[$row['masters_board']];?> </td>
               <td> <?php echo $row['masters_cgpa'];?> </td>
               <td> <?php echo $row['masters_passing_year'];?> </td>
               <td> <?php echo $row['masters_duration'];?> Years </td>
             </tr>
             <?php }  if($row['others_degree']!=0){?>
             <tr>
               <td> <?php echo $Degree_title[$row['others_degree']];?></td>
               <td> <?php echo $row['othres_subject'];?> </td>
               <td> <?php echo $universityArr[$row['othres_board']];?> </td>
               <td> <?php echo $row['othres_cgpa'];?> </td>
               <td> <?php echo $row['othres_passing_year'];?> </td>
               <td> <?php echo $row['othres_duration'];?> Years </td>
             </tr>
             <?php } ?>
             <tr>
               <td colspan="5"> Total Years of Schooling (Use the brochure to fill in the column) </td>
               <td>   <?php echo $row['total_year'];?> Years </td>
             </tr>
             
          
       
	      </table> 
          <br />
          <table width="100%" border="1" rules="all" style="font-size:14px;">
            
             <tr>
               <td colspan="6"> <b>Professional Exprience </b> </td>
             </tr>
             
             <tr>
               <td colspan="2"> Organization </td>
               <td> Position Held</td>
               <td> Area of Exprience</td>
               <td> Preiod from</td>
               <td> Preiod to</td>
             </tr>
             <?php if($row['organization_1']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['organization_1'];?></td>
               <td> <?php echo $row['position_held_1'];?> </td>
               <td> <?php echo $row['responsibility_1'];?> </td>
               <td> <?php echo $row['date_from_1'];?> </td>
               <td> <?php echo $row['date_to_1'];?> </td>
             </tr>
             <?php } if($row['organization_2']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['organization_2'];?></td>
               <td> <?php echo $row['position_held_2'];?> </td>
               <td> <?php echo $row['responsibility_2'];?> </td>
               <td> <?php echo $row['date_from_2'];?> </td>
               <td> <?php echo $row['date_to_2'];?> </td>
             </tr>
             <?php } if($row['organization_3']!=""){?>
              <tr>
               <td colspan="2"> <?php echo $row['organization_3'];?></td>
               <td> <?php echo $row['position_held_3'];?> </td>
               <td> <?php echo $row['responsibility_3'];?> </td>
               <td> <?php echo $row['date_from_3'];?> </td>
               <td> <?php echo $row['date_to_3'];?> </td>
             </tr>
             <?php } ?>
             <tr>
               <td colspan="5"> Total Years of Exprience (Use the brochure to fill in the column) </td>
               <td> <?php echo $row['total_year_exprience'];?> Years </td>
             </tr>
       
	      </table>
          
                    <br />
          <table width="100%">
            
             <tr>
               <td colspan="2"><b> I certify that the information provided in this application form is true and correct. I understand that my application for addmission will be cancelled if any information is found untrue.</td>
             </tr>
             
             
               
             <tr>
               <td colspan="2" height="20"></td>
             </tr>
             
             
             <tr>
               <td align="left">Date : <?php echo date('d M, Y') ?></td>
               <td align="right">(Signature of the Applicant)</td>
             </tr>
             <tr>
               <td colspan="2" height="10"></td>
             </tr>
              <tr>
               <td colspan="2"><b>Note:
                Deposite 1500/-(Fifteen hundred) taka at Sonali Bank Ltd. <span style="color:#F00">Account No # 34203272, Account Name # EMBA Admission, Branch Name #Dhaka University Campus Branch</span> and the original bank deposit copy the filled in form along with all education and experience certificates required to be submitted at the office of the Dean, Faculty of Business Studies, and University of Dhaka.</b></td>
             </tr>
             
             <tr>
               <td colspan="2" height="10"></td>
             </tr>
              <tr>
               <td colspan="2" style="font-size:13px;"><b>To receive your online Admit card please login at  <u>http://fbs-du.com/login/</u>  by 04-March-2016 to 10-March-2016.</b> </td>
             </tr>
             
	      </table>
        </div>
        
        
        
        