<?php
 class Db_Connect{
	 
	public function __construct(){
		
		$hostname="localhost";
		$username="root";
		$password="";
		$dbname="admission_jnu_demo";
		
		$conn=mysql_connect($hostname,$username,$password);
		if(!$conn){
			
			die("Database not connected".mysql_error());
		}
		
		mysql_select_db($dbname);
	} 
	 
	 
 }




?>