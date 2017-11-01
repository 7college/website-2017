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
            $sql=mysql_query("INSERT INTO sscresult(sname,sregno,sroll,spassyear,sboard,dob,sgpa,sscgroup) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')");
        }
        fclose($file);
		if($sql==1){
          header('Location:../index.php?data=dataentry/sscresultupload&sk=1');
		}
		else{
          header('Location:../index.php?data=dataentry/sscresultupload&sk=2');
		}
    }
    else{
          echo 'Invalid File:Please Upload CSV File';
	    }
}
?>