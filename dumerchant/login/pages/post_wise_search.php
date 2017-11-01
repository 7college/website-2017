<?php
 include('../config/config.php');
 include('../config/common_function.php');
 $PostArray=array(1=>"উপসহকারী কমিউনিটি মেডিকেল অফিসার",2=>"ফার্মাসিস্ট",3=>"প্রিন্টিং সুপারভাইজার",4=>"স্ক্রিপ রাইটার",5=>"ডিজাইনার",6=>"কম্পিউটার অপারেটর",7=>"সাঁটমুদ্রাক্ষরিক কাম কম্পিউটার অপারেটর",8=>"পরিসংখ্যান সহকারী",9=>"উচ্চমান সহকারী",10=>"গুদাম রক্ষক",11=>"গাডী চালক" ,12=>"ওয়াচ ম্যান",13=>"অফিস সহায়ক (এমএলএসএস)",14=>"এমএলএসএস/ নিরাপক্তা প্রহরী",15=>"নিরাপক্তা প্রহরী",16=>"পরিবার কল্যাণ পরিদর্শিকা প্রশিক্ষণার্থী ");

?>
<script>

   function fn_data_search(){
	        $('#htmlview').html('<font color="red"><b>Loading........</a></font>');
	        var appsid=$('#appsid').val();
			var data ="action=cehckdata&appsid="+appsid;
			http.open( "POST","apply/searchdata_individual.php",true);
			http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			http.onreadystatechange =fn_data_search_response;
			http.send(data); 
	   
	   }
	function fn_data_search_response()
	{
		if(http.readyState == 4)
		{ 
			   var response=http.responseText;
			   $('#htmlview').html(response);
			  // if(response==1){ alert('Serial no. already exist'); $("#apsID").val(''); return; }
		}
	}
	
	function fn_data_excel(){

		var nop=$('#nop').val();
		var data ="action=student_searchData&nop="+nop;
		//alert(data); return;
		http.open( "POST","apply/Postwisedata_print.php",true);
		http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		http.onreadystatechange =fn_data_excel_response;
		http.send(data); 
	}
	
	function fn_data_excel_response()
		{
			if(http.readyState == 4)
			{ 
			  var response=http.responseText;
		      window.open(response);
			}
	}
	
</script>

<style>
  input[type='text'],input[type='file']  { border:1px solid #CCCCCC;}
  #mendotory{ color:red;}
</style>
<br/>
<section>
    <div class="container">
      <div class="row">
       <div class="container">
       <?php include('apply/uppermenu.php'); ?>
       <div class="col-md-12" style="padding:0px; margin:0px;">
         <div class="widget">

           
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title" style="color:white;"> Post Wise Search</h3>
    </div>
<div class="panel-body">
                            <table class="table table-striped table-bordered table-hover table-responsive">
                                   <tr>
                                    <td>Name of the Post<span id="mendotory"> *</span></td>
                                    <td colspan="3">
                                    <select  name="nop"  class="form-control" id="nop" >
                                       
                                          <option value=""> >--select--< </option>
                                          <?php foreach($PostArray as $key=>$val){ ?>
                                             
                                           <option value="<?php echo $key; ?>"><?php echo $key; ?>. <?php echo $val ?>  </option>  
                                             
                                          <?php } ?>
                                       
                                    </select>
                                    </td>
                                    <td align="left" ><button onclick="fn_data_search()" name="submit_application" class="btn btn-primary "> <span class="glyphicon glyphicon-search" ></span> Search</button></td>
                                  </tr>
                                  
                                  
                             </table>
                             
                             <div id="htmlview" align="center"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>