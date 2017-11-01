<?php
 session_start();
 require_once('../config/config.php');
 include('../common/common_function.php');

 extract($_REQUEST);
 if($action=='save_update_delete')
 {


  ?>
	  <table  class="table table-striped table-bordered table-hover table-responsive"  width="100%">
        <tr>
           <td>Sl</td>
           <td>Building</td>
           <td>Room No</td>
           <td>Name</td>
           <td>Mobile</td>
           <td>Roll</td>
        </tr>
        
        <?php
         $i=1;
		  $SQLData=mysql_query("select * from  student_info_fbs where hallName='$baban_name' and floorNao='$floor_name' and room_no='$room_no' order by exam_roll_no");
		  while($rowRow=mysql_fetch_assoc($SQLData)){
		?>
        <tr>
           <td><?php echo $i; ?></td>
           <td><?php echo $bhabanNo[$rowRow['hallName']]; ?></td>
           <td><?php echo $rowRow['room_no']; ?></td>
           <td><?php echo $rowRow['applicant_name']; ?></td>
           <td><?php echo $rowRow['mobile']; ?></td>
           <td><?php echo $rowRow['exam_roll_no']; ?></td>
        </tr>
        <?php $i++; } ?>
      </table>
   <?php 
	 }
  ?>