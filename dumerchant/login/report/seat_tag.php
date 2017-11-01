	<?php
		session_start();
		include('../config/config.php');
		include('../config/common_function.php');
		
				  
				  
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
			$RooMFloorNameArray[$rowRoom['id']]=$rowRoom['floor_no'];
		}

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
            }
			table tr {padding:0px; margin0px;}
            </style>
           <div class="page">
			<?php
			$i=1;
	if($room_no==0){
	$sql=mysql_query("select * from  student_info_fbs");
	}
	else{
	$sql=mysql_query("select * from  student_info_fbs where  room_no='$room_no' order by application_id");
	}

            while($row=mysql_fetch_assoc($sql)){ 
            ?>
            

                 <table width="47%" style="height:230px;  float:left; margin:5px; ">
                  
                   <tr>
                    <td>
                    <table  style="border:1px solid #000;  font-size:20px; height:190px; width:320px;  ">
                    <tr>
                      <td><img src="../../../picture/<?php echo $row['picture_file_data'];?>" style="width:60px; height:60px;" /></td>
                      <td style=" font-size:16px; font-weight:bolder;"> 
                      <?php echo $CompanyNameen[1]; ?><br /> Name of the Post # Casiher <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 25<sup>th </sup>  Nov, 2016</td>
                   </tr>    
                    <tr>
                       <td colspan="2" style="font-size:15px; text-transform:capitalize;"><b>Name:  <?php echo mb_strtolower($row['applicant_name']);?></b></td>
                    </tr>
                    <tr>
                       <td colspan="2" style="font-size:20px; text-transform:capitalize;"><b>Application Id : &nbsp;<?php echo $row['application_id'];?></b></td>
                       
                      </tr>
                   
                    </table>  
                    </td>
                    </tr>
                   
                 </table>
               

         <?php
		  if($i!=0 && $i%8==0){echo '</div>';}
		  if($count != $i && $i%8==0){echo '<div class="page">';}
		 ?>
          
         <?php $i++; } ?>
         </div>
                  
                     
                     
			<?php 
                $html=ob_get_contents();	
                ob_clean();	
                foreach (glob("*.html") as $filename) 
				{
                    @unlink($filename);
                }
                $name=time();
                $filename=$name.".html";
                $create_new_doc = fopen($filename, 'w');	
                $is_created = fwrite($create_new_doc,$html);
                echo 'report/'.$filename; 
            ?>           

                 
                 
                 