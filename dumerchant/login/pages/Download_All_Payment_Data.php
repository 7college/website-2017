
<script>
	function fnc_download_data()
	{
	var data ="action=save_update_delete";
	http.open( "POST","report/download_all_payment_data.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange =fnc_download_data_response;
	http.send(data); 
	 
	}
	function fnc_download_data_response()
	{
		if(http.readyState == 4)
		{ 
		
	            var response=http.responseText;
				$('#download').html('<font color="red">Data Download Process...</font>');
			   	setTimeout(function(){$('#success_massage').html(window.open(response) ) }, 2000);

			   
		}
	}
		
  function fnc_download_data_excel()
	{
	var data ="action=save_update_delete";
	http.open( "POST","report/download_all_payment_data_execl.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange =fnc_download_data_excel_response;
	http.send(data); 
	 
	}
	function fnc_download_data_excel_response()
	{
		if(http.readyState == 4)
		{ 
		
	            var response=http.responseText;
				$('#download').html('<font color="red">Data Download Process...</font>');
			   	setTimeout(function(){$('#success_massage').html(window.open(response) ) }, 2000);

			   
		}
	}
			
</script>

    <div id="page-inner">     
            <div class="row"  style="margin:0px; padding:0px;">
                <div class="col-md-12" style="margin:0px; padding:0px;">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="margin:0px; padding:0px;">
                        <br />
						     <br />
                     <!-- Setbutton -->
				<div class="panel-headingx"  style="padding-left:20px;">
							
                            <button type="button" id="download" class="btn btn-primary" onclick="fnc_download_data()">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                               Download HTML</button>
                            <button type="button" id="download" class="btn btn-primary" onclick="fnc_download_data_excel()">
                            <span class="glyphicon glyphicon-plus-sign"></span> 
                               Download EXCEL</button>
						     <br />
						     <br />
						
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
           <!-- /. ROW  -->
        </div>
    