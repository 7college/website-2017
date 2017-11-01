<?php
die;
function SendSms($msisdn,$sms) {
    $user =" du_arif";
    $pass = "123456";
    $sid = "du_arif";
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
$get_course=substr($phone,0,-1);
$phoneNo=explode(',',$get_course);
$count=0;
$i=0;
foreach ($phoneNo as $SmsNo){
//$student_id=$row['student_id'];
$msisdn='0'.trim($SmsNo);    
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