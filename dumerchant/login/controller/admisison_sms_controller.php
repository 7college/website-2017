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
            $sql=mysql_query("INSERT into admission_fall(roll,name,phone) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]')");
        }
        fclose($file);
		if($sql==1){
          header('Location:../index.php?data=admission_result&sk=1');
		}
		else{
          header('Location:../index.php?data=admission_result&sk=2');
		}
    }
    else{
          echo 'Invalid File:Please Upload CSV File';
	    }
}
?>