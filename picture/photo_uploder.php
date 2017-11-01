<?php
    session_start();
	$target_file = $_FILES["picture_file"]["name"];	
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "JPG"){
	 echo "6"; die;
	}

	
    list($width, $height) = getimagesize($target_file);
	$min_width = "300";
	$min_height = "300";
	if(($_FILES["picture_file"]["size"] < 153600) && ($width<=$min_width) && ($height<=$min_height)){
		$photoname=$photoname= 'pic_'.date('y-m-d').rand(10,100000).time().'.jpg';
		$val=move_uploaded_file($_FILES['picture_file']['tmp_name'],$photoname);
		if($val==1)
		{
		  echo $photoname; die; 
		}
	}
	else{
		  echo "5"; die;
		}
?>