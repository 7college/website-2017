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
            $sql=mysql_query("INSERT into  extra_data(email) VALUES ('$emapData[0]')");
        }
        fclose($file);
		if($sql==1){
          header('Location:../index.php?data=roll_Assign&sk=1');
		}
		else{
          header('Location:../index.php?data=roll_Assign&sk=2');
		}
    }
    else{
          echo 'Invalid File:Please Upload CSV File';
	    }
}
?>