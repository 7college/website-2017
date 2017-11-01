<?php 
session_start();
include("login/config/config.php");
extract($_REQUEST);
//echo "SELECT * FROM  fbs_faculty_info WHERE faculty_id='$txt_user_name' AND password='$txt_password'"; die;
$sql=mysql_query("SELECT * FROM  fbs_user WHERE user_name='".mysql_real_escape_string($txt_user_name)."' AND password='".mysql_real_escape_string(MD5($txt_password))."'");
$row=mysql_fetch_assoc($sql);
$count=mysql_num_rows($sql);
if($count>0)
{
	$_SESSION['uid']=$row['id'];
	$_SESSION['fname']=$row['full_name'];
	$_SESSION['uname']=$row['user_name'];
	$_SESSION['user_type']=$row['user_type'];
	echo "<script>location='login/index.php'</script>";
}else
{
	echo "<script>location='index.php'</script>";
} 

?>
