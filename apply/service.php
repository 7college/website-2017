<section class="main">
                <div class="container">
                      <?php include("process/uppermenu.php"); ?>     
    
        
             <div class="panel panel-default" style="margin:0px; padding:0px;">
                <div class="panel-heading"  style=" font-weight:bolder; color:#A27126; font-size:16px;">
                    Service Request
                </div>
				
                 <div class="panel-body">
                  <table class="table table-bordered table-striped"> 
                    <form method='POST' action='#'>
                    
                    <tr>
                        <td> Mobile Number:</td>
                        <td><input type='text' class='form-control' name='mobile' placeholder="Mobile Number" required></td>
                    </tr>
                    <tr>
                        <td> Application ID:</td>
                        <td><input type='text' class='form-control' name='appid' placeholder="Application ID" required></td>
                    </tr>

                    <tr>
                        <td> Problems:</td>
                        <td>
                            <textarea class='form-control' name='query_des' style='height:100px;'></textarea>
                            <input type='hidden' name='date_time' value='2016-08-30 21:51:38'>
                             <input type='hidden' name='status' value='1'>
                        </td>
                    </tr>

                    <tr>
                        <td colspan='2' align='right'>
                            <button type='submit' class='btn btn-success'>
                                Submit
                            </button>
                        </td>
                    </tr>
                    </form> 
                    </table>



                      

                </div>
                
		   </div>
		   
		   
        </div>
    

            </section>