<script type="text/javascript">
   function fnc_check_and_save(){
	    //var insid=document.getElementById("instituteid").value;
		//alert(instituteid);
		var data ="action=saveallstudentdata";
		data+=get_form_data('content');
		//alert(data);
		http.open( "POST","process/insertpage.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_and_save_response;
		http.send(data); 
	}
	
	
	function fnc_check_and_save_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			if(response==1){
			window.location='index.php?act=process/profile';
			}
		 }
	}	 

</script>


<?php 
	session_start();
	include('admin/login/config/config.php');
	$sql=mysql_query("SELECT * FROM hscresult WHERE id='".$_SESSION['id']."'");
	$row=mysql_fetch_assoc($sql); 
	$sqlssc=mysql_query("SELECT * FROM sscresult WHERE sscroll='".$row['sscroll']."' AND sscreg='".$row['sscreg']."'");
    $rowssc=mysql_fetch_assoc($sqlssc);
	//print_r($rowssc);
?>



   <section class="main">
                <div class="container">
                <?php include("process/uppermenu.php"); ?>
                <div class="panel panel-default" style="margin:0px; padding:0px;">
                    <div class="panel-heading"  style=" font-weight:bolder; color:#A27126; font-size:16px;">
                                                                  অভিনন্দন, আপনি ভর্তি পরীক্ষায় অংশগ্রহণের জন্য উপযুক্ত।
                    </div>
               <div class="panel-body" id="content">
              
                        <input type="hidden" name="name" id="name" value="<?php echo $row['name']?>" />
                        <input type="hidden" name="fname" id="fname" value="<?php echo $row['fname']?>" />
                        <input type="hidden" name="mname" id="mname" value="<?php echo $row['mname']?>" />
                        <input type="hidden" name="gender" id="gender" value="<?php echo $row['sex']?>" />
                        <input type="hidden" name="dob" id="dob" value="<?php echo $rowssc['dob']?>" />
                        <input type="hidden" name="sscroll" id="sscroll" value="<?php echo $rowssc['sscroll']?>" />
                        <input type="hidden" name="sscreg" id="sscreg" value="<?php echo $rowssc['sscreg']?>" />
                        <input type="hidden" name="sscpass" id="sscpass" value="<?php echo $row['sscpassyear']?>" />
                        <input type="hidden" name="sscgpa" id="sscgpa" value="<?php echo $rowssc['sscgpa']?>" />
                        <input type="hidden" name="sscltr" id="sscltr" value="<?php echo str_replace('+','plus',$rowssc['sscltr']);?>" />
                        <input type="hidden" name="sscboard" id="sscboard" value="<?php echo $row['sscboard']?>" />
                        <input type="hidden" name="sscgrp" id="sscgrp" value="<?php echo $rowssc['sscgroup']?>" />
                        <input type="hidden" name="hscroll" id="hscroll" value="<?php echo $row['roll']?>" />
                        <input type="hidden" name="hscreg" id="hscreg" value="<?php echo $row['regno']?>" />
                        <input type="hidden" name="hscpass" id="hscpass" value="<?php echo $row['passyear']?>" />
                        <input type="hidden" name="hscgpa" id="hscgpa" value="<?php echo $row['gpa']?>" />
                        <input type="hidden" name="hscltr" id="hscltr" value="<?php echo str_replace('+','plus',$row['ltrgrade']);?>" />
                        <input type="hidden" name="hscboard" id="hscboard" value="<?php echo $row['board']?>" />
                        <input type="hidden" name="hscgrp" id="hscgrp" value="<?php echo $row['hscgroup']?>" />
                        <input type="hidden" name="timedate" id="timedate" value="<?php echo date("Y-m-d H:i:s")?>" />
                        <input type="hidden" name="servername" id="servername" value="<?php echo $_SERVER['REMOTE_ADDR'];?>" />
              
              
                        <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
                            <tr><td><b>Name</b></td><td><?php echo $row['name']?></td></tr>
                            <tr><td><b>Father Name</b></td><td><?php echo $row['fname']?></td></tr>
							<tr><td><b>Mother Name</b></td><td><?php echo $row['mname']?></td></tr>
                        </table>
                        <br />
                        <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
                            <tr><th colspan="4" style="background:#DCEAF9;">SSC or Equivalent</th></tr>
                            <tr><th>Roll</th><td><?php echo $row['sscroll']?></td><th>Reg. No</th><td><?php echo $row['sscreg']?></td></tr>
                            <tr><th>Board</th><td><?php echo $board[$row['sscboard']]?></td><th>Passing Year</th><td><?php echo $row['sscpassyear']?></td></tr>
                            <tr><th>GPA</th><td><?php echo $rowssc['sscgpa']?></td><th>Result</th><td><?php echo $row['sscresult']?></td></tr>
                           
                        </table>

                        <br />
                        <table class="table table-striped  table-bordered" style="margin:0px;font-size:14px;">
                            <tr><th colspan="4"  style="background:#DCEAF9;">HSC or Equivalent</th></tr>
                            <tr><th>Roll</th><td><?php echo $row['roll']?></td><th>Reg. No</th><td><?php echo $row['regno']?></td></tr>
                            <tr><th>Board</th><td><?php echo $board[$row['board']]?></td><th>Passing Year</th><td><?php echo $row['passyear']?></td></tr>
                            <tr><th>GPA</th><td><?php echo $row['gpa']?></td><th>Result</th><td><?php echo $row['sscresult']?></td></tr>
                            
                        </table>
                       
                        
                        <table class="table table-striped table-hover table-bordered">
                          
                            <tr>
                                <td colspan="2"><button type="button" class="btn btn-primary" onclick="fnc_check_and_save()" name="btn_submit_final_data">Next</button></td>
                            </tr>
                        </table>
                       
                    </div>
                </div>
	  </div>
  </div>
</section>