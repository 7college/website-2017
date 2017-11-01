<script type="text/javascript">
	function fnc_check_result()
	{
		if(fn_validation('hsc_roll*hsc_pass_year*board*ssc_roll*ssc_pass_year*sscboard')==0) return;
		var hsc_roll=$('#hsc_roll').val();
		var hsc_pass_year=$('#hsc_pass_year').val();
		var hboard=$('#board').val();
		var ssc_roll=$('#ssc_roll').val();
		var ssc_pass_year=$('#ssc_pass_year').val();
		var sscboard=$('#sscboard').val();
	    
		
		
		var data ="action=actionquaerypages&hsc_roll="+hsc_roll+"&hsc_pass_year="+hsc_pass_year+"&board="+hboard+"&ssc_roll="+ssc_roll+"&ssc_pass_year="+ssc_pass_year+"&sscboard="+sscboard;
		//alert(data); return;
		http.open( "POST","process/varification.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fnc_check_result_response;
		http.send(data); 
	}	

	
	function fnc_check_result_response()
	{
		if(http.readyState == 4)
		{ 
			var response=http.responseText;
			//alert(response);
			if(response==101)
			{
			 window.location='index.php?act=apply/rstep';
			}
			if(response==401)
			{
             alert('Please enter your valid Information.'); return;	
			}
			if(response==110)
			{
			 window.location='index.php?act=apply/fstep';
			}
			

		 }
	}	 
</script>


<section class="main">
                <div class="container">
                    <div class="row">
                    <div class="container">
                    <?php include("process/uppermenu.php"); ?>  
                    <div class="col-md-12" style="padding:0px; margin:0px;">
                    <div class="widget">
            		
                 <div class="widget-header">
                    <div style="font-size:25px;text-align:center;color:#A27126;"> 
                    
                            <div class="alert alert-warning warning_big" style="text-align:left;">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong><i class="fa fa-exclamation-triangle fa-lg fa-2x" aria-hidden="true"></i> আবেদনপত্র পূরণের  পূর্ব প্রস্তুতি  ও   সতর্কবার্তাঃ</strong><br/><br/>
                            <ul style="text-align:left; font-size:15px;" >
                                <li> আবেদন ফরম পূরনের পূর্বে  ভর্তি প্রক্রিয়া ভালভাবে পড়ুন।</li>
                                <li>ধীরস্থিরভাবে ফরম পূরণের প্রতিটি ধাপ সম্পন্ন করুন। যাতে কোনও প্রকার তথ্য ভুল না হয়।</li>
								<li>অসত্য তথ্য প্রদানকারীর বিরুদ্ধে আইনানূগ ব্যবস্থা নেওয়া হবে।</li>
                                <li>সদ্য তোলা রঙ্গিন ছবি (সাইজ ৩০০ x ৩০০ পিক্সেল , জেপিজি ফরমেট) এবং ১৫০ কেবি । </li>
								<li>১১ ডিজিটের মোবাইল নম্বর । </li>
								<li>পেমেন্ট স্লিপ প্রিন্ট করার ব্যবস্থা  থাকতে হবে।</li>
								<li>জরুরি প্রয়োজনে যোগাযোগ করুন :
                                                                                      মোবাইল  নং :+৮৮০১৮১৫১৫২৬১৫,০১৮৬৫৭৪৮০৭৩,০১৮৩৭৯৪০২২৭ ,০১৮৫৮১৩৬৬৫৮( ৯ টা হতে  ৭ টা ) </li>

                              
                            </ul>
                            
                            </div>                    
                    </div>
                </div>       
                   
       
             <div class="panel panel-primary" style="margin:0px; padding:0px;">
                <div class="panel-heading"  style=" font-weight:bolder; color:#fff; font-size:16px;">
                                                 আপনি ভর্তি পরীক্ষায় অংশগ্রহণের জন্য উপযুক্ত কিনা তা জানার জন্য  অথবা লগইন করার জন্য নিম্নের তথ্যগুলো দিন
                </div>
               <div class="panel-body">
                       <table class="table table-striped table-bordered  table-responsive" id="htmlserach"  data-page-length="50" width="100%"  data-order="[[ 1, &quot;asc&quot; ]]">
                    
						
						<tr>
                            <td rowspan="3" style="vertical-align:middle;"><b>HSC or Equivalent</b></td>
                            <td>Roll No.</td>
                            <td><input type="text" step="1" onpaste="return false" onkeypress="return checkaccnumber(event)" autocomplete="off" maxlength="8" class="form-control"  id="hsc_roll" name="hsc_roll" placeholder="HSC Roll No."></td>
                        </tr>
                        <tr>
                            <td>Passing Year</td>
                            <td>
                                <select name="hsc_pass_year" id="hsc_pass_year" class="form-control">
                                    <option value='2017'>2017</option> 
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Board</td>
                            <td>
                                <select name="board" id="board" class="form-control">
                                     <?php
									   foreach($board AS $keys=>$vals){
									 ?>                              
                                     <option value="<?php echo $keys; ?>"><?php echo $vals; ?></option>  
                                     <?php } ?>                               
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;" rowspan='3'><b>SSC or Equivalent</b></td>
                            <td>Roll No.</td>
                            <td><input type="text" step="1" class="form-control" onpaste="return false" onkeypress="return checkaccnumber(event)" autocomplete="off" maxlength="8"  id="ssc_roll" name="ssc_roll" onchange="roll_check();" placeholder="SSC Roll No."></td>
                        </tr>
						 <tr>
                            <td>Passing Year</td>
                            <td>
                                <select name="ssc_pass_year" id="ssc_pass_year" class="form-control">
                                    <option value=''>>-Select-< </option> 
                                    <option value='2015'>2015</option> 
                                    <option value='2014'>2014</option> 
                                    <option value='2013'>2013</option> 
                                    <option value='2012'>2012</option> 
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Board</td>
                            <td>
                                <select name="sscboard" id="sscboard" class="form-control">
                                     <?php
									   foreach($board AS $keys=>$vals){
									 ?>                              
                                     <option value="<?php echo $keys; ?>"><?php echo $vals; ?></option>  
                                     <?php } ?>                               
                                </select>
                            </td>
                        </tr>
                     
                    
                        <tr>
                            <td colspan="3" style="text-align:right;">
                                <button type="button" class="btn btn-primary" onclick="fnc_check_result()" name='btn_check'><span class='glyphicon glyphicon-forward'></span> Next</button>
                            </td>
                        </tr>
                    </table>
            
                    </div>
               </div>
         
     	      </div>
			    </div>                       
              </div>
           </div>                       
        </div>
    </div>
 </section>