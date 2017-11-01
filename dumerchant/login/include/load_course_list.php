     <?php
		include('../config/config.php');
      	extract($_REQUEST);	 
        if($action=='save_update_delete'){
				 $sqlData=mysql_query("SELECT * FROM  fbs_room_setup where baban_name='$centerName'"); 
		   ?>
                    <select class="form-control" id="room_no" name="room_no">
                        <option value=""> >--Select--< </option>
                        <?php  while($rows_sqlData=mysql_fetch_assoc($sqlData)){ ?>
                        <option value="<?php echo $rows_sqlData['id'] ?>"><?php echo $rows_sqlData['room_no']; ?></option>
						<?php } ?>
                    </select>
	     <?php	
           }
	    ?>