<?php
function SendSms($msisdn,$sms) {
	$user ="misfbs"; 
	$pass = "misfbs@123"; 
	$sid = "misfbsdu"; 
	//$url="http://sms.sslwireless.com/pushapi/idea_networks/server.php";
	$url="http://sms.sslwireless.com/pushapi/dynamic/server.php";
	$unique_id="misfbsdu".date("Y-m-d H:i:s");
	$param="user=$user&pass=$pass&sid=$sid&";	
	$sms="sms[0][0]=$msisdn&sms[0][1]=".urlencode($sms)."&sms[0][2]=$unique_id";
	$data=$param.$sms.$sid;
	$crl = curl_init();
	curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE);
	curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2);
	curl_setopt($crl,CURLOPT_URL,$url); 
	curl_setopt($crl,CURLOPT_HEADER,0);
	curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($crl,CURLOPT_POST,1);
	curl_setopt($crl,CURLOPT_POSTFIELDS,$data); 
	$response = curl_exec($crl);
	curl_close($crl);
	//echo $response;
	}
    ?>

<?php
error_reporting(0);
//var_dump($_REQUEST);
include('../../../config/config.php');
extract($_REQUEST);
$ses_id = ('MISSSLW'. (rand(100, 99999)) . date("YmdHis"));
$_SESSION['ses_id'] = $ses_id;
$visitor_ip = $_SERVER['REMOTE_ADDR'];

if ($batch_id=='all'){
	$query_b="SELECT student_id,student_phone FROM fbs_student_info WHERE student_phone IS NOT NULL AND status=1 AND gratute_status='0'";
}
else {
	$query_b="SELECT student_id,student_phone FROM fbs_student_info WHERE student_phone IS NOT NULL && student_batch='$batch_id' AND status=1 AND gratute_status='0'";
	}
	
//echo $query_b; 
$resulte=mysql_query($query_b) or die(); 
$count=0;
$i=0;
while ($row = mysql_fetch_array($resulte)) {
    $student_id=$row['student_id']; 
    $msisdn=trim($row['student_phone']); 
    //$msisdn='01757552178'; 
	$message = mysql_real_escape_string($message);
    if (strlen($msisdn) >0) {
		SendSms($msisdn,$message);
	$count++;  
	}
	//echo 'sendSMS("' . $msisdn . '", "' . $message . '");';	 
	  $i++;	
  } 
 
  
if($action=='list_view'){
if  ($count>0){ ?>
<h1 style="color:#03F; font-size:16px; font-weight:bold">Successfully Send <?php echo $count?> SMS! Total Student <?php echo $i;?>.</h1>
<?php }
else {?>
	<h1 style="color:#F00; font-size:16px; font-weight:bold">Sorry! Valid Mobile Not Found!!</h1>
	<?php }

}  ?>

