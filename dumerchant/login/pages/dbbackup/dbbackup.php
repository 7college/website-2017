<?php
include('../../config/config.php');
extract($_REQUEST);
if($action=='data_save_update'){
 $Backup='DB_'.date('Y-m-d').'_DGFP.sql';
 mysql_query("insert into fbs_db_backup(dbName) VALUES('$Backup')");


function backup_tables($tables ='*')
{
include('../../config/config.php');
//get all of the tables
if($tables == '*')
{
$tables = array();
$result = mysql_query('SHOW TABLES');
while($row = mysql_fetch_row($result))
{
$tables[] = $row[0];
}
}
else
{
$tables = is_array($tables) ? $tables : explode(',',$tables);
}

//cycle through
foreach($tables as $table)
{
$result = mysql_query('SELECT * FROM '.$table);
$num_fields = mysql_num_fields($result);

//$return.= 'DROP TABLE '.$table.';';
$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
$return.= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++)
{
while($row = mysql_fetch_row($result))
{
$return.= 'INSERT INTO '.$table.' VALUES(';
for($j=0; $j<$num_fields; $j++)
{
$row[$j] = addslashes($row[$j]);
$row[$j] = ereg_replace("\n","\\n",$row[$j]);
if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
if ($j<($num_fields-1)) { $return.= ','; }
}
$return.= ");\n";
}
}
$return.="\n\n\n";
}

echo $Backup='DB_'.date('Y-m-d').'_DGFP.sql';
$handle = fopen($Backup,'w+');
fwrite($handle,$return);
fclose($handle);
}
backup_tables();}
?>

<?php

  if($action=='data_save_update_delte_process'){
	  
	     $Data=explode('##',$dval);
	     //echo $Data[1]; die;
	     unlink($Data[0]);
		 $SQL=mysql_query("DELETE FROM fbs_db_backup WHERE id='".$Data[1]."'");
		 if($SQL==1){ echo '1'; die; }
	  
	  }


?>