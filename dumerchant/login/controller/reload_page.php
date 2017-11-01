<?php
 session_start();
 require_once('../config/config.php');
 extract($_REQUEST);
 if($action=='reload_room_no')
 {
 ?>
      
        <select  name="room_no"   id="room_no" onchange="fnc_capacity()" class="form-control" >
              <option value=""> >-- Select-< </option>
              <?php
			  $SQL=mysql_query("SELECT * FROM fbs_seat_paln WHERE baban_name='$baban_name' AND floor_name='$floor_name'");
	while($row=mysql_fetch_assoc($SQL)){
			  ?>
              <option value="<?php echo $row['room_no']; ?>"> <?php echo $row['room_no']; ?></option>
              <?php } ?>
        </select>
      
<?php
	
 }

?>


<?php
 if($action=='reload_capacity')
 {
    $SQL3=mysql_query("SELECT capasity FROM fbs_seat_paln WHERE baban_name='$baban_name' AND floor_name='$floor_name' and room_no='$room_no'");
	$row3=mysql_fetch_assoc($SQL3);
	echo $row3['capasity']; die;
 }
?>