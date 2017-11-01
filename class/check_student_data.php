<?php
 include('Db_connect.php');
 class Check_Student_Data{
	 
	public function __construct()
	{
	  $dbobj=new Db_connect();
	  session_start();
	}
	
	public function check_result($data)
	{
		extract($data);
		$sql="SELECT * FROM add_student_data WHERE hroll='$hsc_roll' and sroll='$ssc_roll' and hpass_year='$hsc_pass_year' and spass_year='$ssc_pass_year' and hboard='$hsc_board' and sboard='$ssc_board'";
	    $result=mysql_query($sql);
		$count=mysql_num_rows($result);
		$row=mysql_fetch_assoc($result);
		if($count==1)
		{
			
			$_SESSION['sid']=$row['id'];
			$_SESSION['unit']=$unit;
			header("Location:index.php?act=process/show_result");
	    }
		else
		{
			
			header("Location:index.php?act=apply/a");
		}
	}
	
	  public function show_result_data()
	  {
			$sql="SELECT * FROM add_student_data WHERE id='".$_SESSION['sid']."'";
			$result=mysql_query($sql);
			return $result;
	  }
	
	 
	 public function final_data_track()
	  {
		extract($_POST);
		$sqlSelect=mysql_query("SELECT payment_id FROM add_student_info WHERE ssc_roll='$ssc_roll' AND hsc_roll='$hsc_roll' AND ssc_board='$ssc_board' AND hsc_board='$hsc_board' AND hsc_pass_year='$hsc_pass_year' AND ssc_pass_year='$ssc_pass_year' AND unit='$unit'");
		$count=mysql_num_rows($sqlSelect);
		//echo $count; die;
		$countData=mysql_fetch_assoc($sqlSelect);
		if($count==1){
			$_SESSION['pid']=$countData['payment_id'];
			header("Location:index.php?act=apply/getpayment_id");
			}
		else{
		$SQL2=mysql_query("SELECT MAX(id) AS pid FROM add_student_info");
		$rowsData=mysql_fetch_assoc($SQL2);
		$pid=$rowsData['pid']+1;
		$apsID=date('y').str_pad($pid,6,"0",STR_PAD_LEFT); 
		$roll='1'.str_pad($pid,5,"0",STR_PAD_LEFT); 
		
		$_SESSION['pid']=$apsID;
	    $sql="INSERT INTO add_student_info(ssc_roll,ssc_pass_year,ssc_board,ssc_result,ssc_group,hsc_roll,hsc_pass_year,hsc_board,hsc_result,hsc_group,exam_roll_no,applicant_name,father_name,mother_name,date_of_birth,cell_phone,gender,eligible_subject,unit,entry_date,entry_time,entry_ip,status,payment_id,payment_mode,pay_status)
	    VALUES('$ssc_roll','$ssc_pass_year','$ssc_board','$ssc_result','$ssc_group','$hsc_roll','$hsc_pass_year','$hsc_board','$hsc_result','$hsc_group','$roll','$applicant_name','$father_name','$mother_name','$date_of_birth','$cell_phone','$gender','$eligible_subject','$unit','$entry_date','$entry_time','$entry_ip','$status','$apsID','3','1')";
		
		$result=mysql_query($sql);
		if($result==1){
			header("Location:index.php?act=apply/getpayment_id");
			}
		  else{
			header("Location:index.php");
 		  }
		}
	  }
	  
	  
	public function check_login_sequre($data)
	{
		extract($data);
		$sql="SELECT * FROM add_student_info WHERE unit='$unit' AND cell_phone='$cell_phone' AND payment_id='$payment_id' AND payment_mode ='$payment_type' AND pay_status='1'";
	    $result=mysql_query($sql);
		$count=mysql_num_rows($result);
		$row=mysql_fetch_assoc($result);
		if($count==1)
		{
		  $_SESSION['student_id']=$row['id'];
		  $_SESSION['payid']=$row['payment_id'];

		  if($row['pic_update_status']==1){
			 header("Location:index.php?act=process/final_profile");
		   }
		   else{
			header("Location:index.php?act=process/profile");
		   }
	    }
		else
		{
			
			header("Location:index.php?act=apply/a");
		}
	}
	  
	  
	  
	 public function profile_data()
	  {
			$sql="SELECT * FROM add_student_info WHERE id='".$_SESSION['student_id']."'";
			$result=mysql_query($sql);
			return $result;
	  }
	

	  
	  
 }

?>