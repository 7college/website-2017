<?php
   $board=array(0=>'Select Board',5=>'Barisal',14=>'Chittagong',11=>'Comilla',10=>'Dhaka',17=>'Dinajpur',13=>'Jessore',12=>'Rajshahi',16=>'Sylhet',8=>'Madrasah',19=>'BTEB',9=>'DIBS/Technical');
   $quata=array(0=>'N/A',1=>'Freedom Fighter',2=>'Wards',3=>'Tribal',4=>'Aboriginal/Harijan/Dalit Community',5=>'physically disabled');
   $unit=array(1=>'Science', 2=>'Business', 3=>'Arts & Social Science');
	$sscgroup=array(0=>'Science', 1=>'Business', 2=>'Arts',3=>'Vocational',5=>'General',4=>'Others');
	$gender=array('M'=>'Male', 'F'=>'Female');
   
   $institute_unit=array(1=>'Begumgonj Textile Engineering College,Begumgonj, Noakhali-3821',2=>'Textile Engineering College, Zorarganj, Chittagong',3=>'Pabna Textile Engineering College, Shalgaria, Pabna',4=>'Bangabandhu Textile Engineering Colleg,Kalihati, Tangail',5=>'Abdur Rab Serniabat Textile Engineering College,Barisal');
   $CompanyName=array(1=>"Administration Login Panel",2=>'University of Dhaka',3=>'logo.jpg');

   	function db_escape($data) {
		$data = trim(htmlentities(strip_tags($data)));
		if (get_magic_quotes_gpc())
		$data = stripslashes($data);
		$data = mysql_real_escape_string($data);
	return $data;
	}
   
?>