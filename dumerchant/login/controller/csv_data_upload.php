<?php 
require_once('../config/config.php');
if(isset($_POST["csv"]))
{
    $filename=$_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql=mysql_query("INSERT INTO fbs_course_reg(collegecode,collgename,nureg,dureg,examroll,sessionid,stname,fname,mname,ctype,subcode,subname,coursecode) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]')");
        }
        fclose($file);
		if($sql==1){
          header('Location:../index.php?data=dataentry/coursedataentrycsv&sk=1');
		}
		else{
          header('Location:../index.php?data=dataentry/coursedataentrycsv&sk=2');
		}
    }
    else{
          echo 'Invalid File:Please Upload CSV File';
	    }
}
?>