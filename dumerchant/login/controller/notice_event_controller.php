<?php
 session_start();
 require_once('../config/config.php');
    extract($_REQUEST);
	if(isset($_POST['save_event'])){
 	$targetPath = "../news_event/".$_FILES['txt_file']['name'];
	move_uploaded_file($_FILES['txt_file']['tmp_name'],$targetPath);
	
	$sql_insert=mysql_query("INSERT INTO fbs_news_event(event_title,event_description,event_file)values('$txt_event_title','$txt_description','$targetPath')");
	  if($sql_insert){
		     echo "<script>location='../index.php?data=add_notice_event&sk=1'</script>";
		  }else{
		     echo "<script>location='../index.php?data=add_notice_events&sk=2'</script>";
	   }
	
	
	}

?>