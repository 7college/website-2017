<?php
include('../config/config.php');
include('../config/common_function.php');

mysql_query ("set character_set_results='utf8'");
$DistrictSql=mysql_query("SELECT id,district_name_bn FROM fbs_district_list");
while($DisRow=mysql_fetch_assoc($DistrictSql)){
	 $DistrictName[$DisRow['id']]=$DisRow['district_name_bn'];
}


$SQl=mysql_query("SELECT * FROM student_info_fbs where application_id='".$_GET['apps']."'");
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

          <table width="100%">
            
            
             
             <tr style="margin:0px; padding:0px;"">
               <td width="20%">
                <img  src="../../../process/barcode.php?text=<?php  echo $row['application_id']; ?>" style="height:7mm; margin:0px; padding:0px; width:50mm;" /><br />

                <span style="padding-left:20px; font-size:12px; "> <b>Application ID: <?php echo $row['application_id'];?></b> </span>
                
               </td>
               <td width="60%" align="center">
                   <h4 style='font-weight:bolder;'>
                     <?php echo $CompanyName[1]; ?><br />
                     <?php echo $CompanyName[2]; ?><br />

					  <span style='font-size:14px;'>
                      <u> আবেদন কপি </u>
					 </span>
                 </h4>
               </td>
               <td width="20%" align="right"> <img src="../../../picture/<?php echo $row['picture_file_data'];?>" style="width:110px; height:120px;" /></td>
             </tr>
             
          
	      </table>
          
          <br />

        <table width="100%" border="1"  bordercolor="#D1D1D1" rules="all" style="font-size:14px;" class="table table-striped table-bordered table-hover table-responsive">
            
            <tr>
               <td colspan="4" style="font-size:17px;"> <b>আবেদনকারীর তথ্য </b> </td>
             </tr>
             <tr>
               <td> পদের নাম </td>
               <td colspan="3"><b><?php   echo $PostArray[$row['nop']] ?></b></td>
             </tr>
             <tr>
               <td width="200"> প্রার্থীর নাম (ইংরেজিতে) </td>
               <td > <?php echo $row['applicant_name'];?></td>
             
               <td> Password</td>
               <td colspan="3"> <?php echo $row['password'];?></td>
             </tr>
             <tr>
               <td> প্রার্থীর নাম (বাংলায়)</td>
               <td colspan="3"> <?php echo $row['applicant_name_bn'];?></td>
             </tr>
             
             <tr>
                    <td> পিতার নাম </td>
                    <td> <?php echo $row['fathers_name'];?></td>
                    <td> মাতার নাম  </td>
                    <td> <?php echo $row['mothers_name'];?></td>
             </tr>
              <tr>
               <td>যোগাযোগ / বর্তমান ঠিকানা </td>
               <td colspan="3"> বাসা ও সড়ক (নাম/নম্বর): <?php echo $row['care1'];?>, গ্রাম/পাড়া/মহল্লা : <?php echo $row['road1'];?>, জেলা  : <?php
 echo $DistrictName[$row['district1']];?>, উপজেলা   : <?php echo $row['ps1'];?>,ইউনিয়ন/ওয়ার্ড: <?php echo $row['upw1']; ?> ,ডাকঘর   : <?php echo $row['po1'];?>, পোস্টকোড নম্বর : <?php echo $row['pc1'];?></td>
             </tr>
			 
			 
             <tr>
               <td> স্থায়ী ঠিকানা </td>
               <td colspan="3"> বাসা ও সড়ক (নাম/নম্বর): <?php echo $row['care2'];?>, গ্রাম/পাড়া/মহল্লা : <?php echo $row['road2'];?>, জেলা  : <?php 
 echo $DistrictName[$row['district2']];?>, উপজেলা   : <?php echo $row['ps2'];?>,ইউনিয়ন/ওয়ার্ড: <?php echo $row['upw2']; ?> ,ডাকঘর   : <?php echo $row['po2'];?>, পোস্টকোড নম্বর : <?php echo $row['pc2'];?></td>
             </tr>
             
             
             
             <tr>
               <td>জেলা </td>
               <td> <?php echo $DistrictName[$row['district']];?></td>
             
               <td> ই-মেইল </td>
               <td> <?php  if($row['email']==''){ echo 'N/A'; } else{ echo $row['email'];}?></td>
             </tr>
       
             
             <tr>
               <td> জন্ম তারিখ </td>
               <td> <?php echo $row['date_of_birth'];?></td>
             
               <td> রক্তের গ্রুপ </td>
               <td> <?php echo $blood_group[$row['blood_group']];?></td>
             </tr>
             <tr>
               <td> জেন্ডার </td>
               <td> <?php echo $Gender[$row['gender']];?></td>
             
               <td> বিবাহিক অবস্থা </td>
               <td> <?php echo $Mstatus[$row['Meritarial_status']];?></td>
             </tr>
             <tr>
               <td> ধর্ম </td>
               <td> <?php echo $Religion[$row['religion']];?></td>
             
               <td> কোঁটা </td>
               <td> <?php echo $QuetaArraybn[$row['quata']];?> </td>
             </tr>
             
             <tr>

             
               <td> মোবাইল নম্বর </td>
               <td> <?php echo $row['mobile'];?></td>
			   <td> জাতীয় পরিচয়পত্র /জন্ম নিবন্ধন নম্বর  </td>
               <td> <?php echo $row['nid'];?></td>
             </tr>
       
	      </table>
          <br />
          
        
	     <table width="100%" border="1" rules="all"  bordercolor="#D1D1D1" style="font-size:14px;" class="table table-striped table-bordered table-hover table-responsive">
            
             <tr>
               <td colspan="6" style="font-size:17px;"> <b>শিক্ষাগত যোগ্যতা </b> </td>
             </tr>
             
             <tr style="font-weight:bolder;">
               <td> পরীক্ষার নাম </td>
               <td> বিষয় </td>
               <td> বোর্ড/বিশ্ববিদ্যালয় </td>
               <td> গ্রেড/শ্রেণি/বিভাগ  </td>
               <td> পাসের সন  </td>
               
             </tr>
             <?php if($row['ssc_degree']!=0){ ?>
             <tr>
               <td> <?php echo $DegreeEquavalentbn[$row['ssc_degree']];?></td>
               <td> <?php echo $row['ssc_sub'];?> </td>
               <td> <?php echo $row['ssc_board'];?> </td>
               <td> <?php echo $row['ssc_cgpa'];?> </td>
               <td> <?php echo $row['ssc_passing_year'];?> </td>
              
             </tr>
             <?php } if($row['hsc_degree']!=0){ ?>
             <tr>
               <td> <?php echo $DegreeEquavalentbn[$row['hsc_degree']];?></td>
               <td> <?php echo $row['hsc_sub'];?> </td>
               <td> <?php echo $row['hsc_board'];?> </td>
               <td><?php echo $row['hsc_cgpa']; ?> </td>
               <td> <?php echo $row['hsc_passing_year'];?> </td>

             </tr>
             <?php } if($row['ug_degree']!=0){ ?>
             <tr>
               <td> <?php echo $DegreeEquavalentbn[$row['ug_degree']];?></td>
               <td> <?php echo $row['ug_sub'];?> </td>
               <td> <?php echo $row['ug_board'];?> </td>
               <td> <?php echo $row['ug_cgpa']; ?></td>
               <td> <?php echo $row['ug_passing_year'];?> </td>
             
             </tr>
             <?php } if($row['pg_degree']!=0){ ?>
             <tr>
               <td> <?php echo $DegreeEquavalentbn[$row['pg_degree']];?></td>
               <td> <?php echo $row['pg_sub'];?> </td>
               <td> <?php echo $row['pg_board'];?> </td>
               <td> <?php echo $row['pg_cgpa'];?> </td>
               <td> <?php echo $row['pg_passing_year'];?> </td>
           
             </tr>
             <?php } ?> 
       
	      </table> 
          <br />
          
	     <table width="100%" border="1" rules="all"  bordercolor="#D1D1D1" style="font-size:14px;" class="table table-striped table-bordered table-hover table-responsive">
             <tr>
                <td style="font-size:17px; font-weight:bolder;">অতিরিক্ত যোগ্যতা</td >
             </tr>
             <tr>
                <td><?php if($row['exqualification']!=""){ echo $row['exqualification']; } else { echo 'অতিরিক্ত যোগ্যতা নাই'; }?></td>
             </tr>
          </table>
         <br />
         <table width="100%" border="1" rules="all"  bordercolor="#D1D1D1" style="font-size:14px;" class="table table-striped table-bordered table-hover table-responsive">
             <tr>
                <td style="font-size:17px; font-weight:bolder;">অভিজ্ঞতার বিবরণ</td>
             </tr>
             <tr>
                <td><?php if($row['exp']!=""){ echo $row['exp']; } else { echo 'অভিজ্ঞতা নাই'; }?></td>
             </tr>
          </table>
          
          <br />
          <table>  
             
               
             <tr>
               <td colspan="2" style='text-align:justify;'><i>আমি এ মর্মে অঙ্গীকার করছি যে, ওপরে বর্ণিত তথ্যাবলি সম্পূর্ণ সত্য। মৌখিক পরীক্ষার সময় উল্লিখিত তথ্য প্রমাণের জন্য সকল মূল সার্টিফিকেট ও রেকর্ডপত্র উপস্থাপন করব। কোন তথ্য অসত্য প্রমাণিত হলে আইনানুগ শাস্তি ভোগ করতে বাধ্য থাকব।</i></td>
             </tr>
             
             
             <tr>
               <td align="left">তারিখ : <?php echo date('d M, Y') ?></td>
               <td align="right">
			   <img src="../../../picture/<?php echo $row['signature_file_upload'];?>" style="width:160px; height:60px;" />
			   <br/>
			   (আবেদনকারীর সাক্ষর)</td>
             </tr>
             <tr>
               <td colspan="2" height="50"></td>
             </tr>
          
        
             
	      </table>
        </div>
        
        
        
        
        