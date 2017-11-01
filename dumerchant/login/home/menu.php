<?php session_start() ?>
<style>
   .nav a{ color:#000000;}
</style>
<nav class="navbar-default navbar-side"  role="navigation" style="font-size:14px; ">
<div class="sidebar-collapse">
	<ul class="nav" id="main-menu" style='max-height:600px; overflow:auto;'>
    
    <!--
       <li>
			<a class="" href="#" style=" color:#000000;"><i class="fa fa-edit"></i> Manage User <span class="fa arrow"></span></a>
             <ul style='list-style:none; line-height:30px;'>
			  <li><a href="index.php?data=add_new_user"> <i class="fa fa-edit"></i> Create New User</a></li>
			  <li><a href="index.php?data=user_list"> <i class="fa fa-edit"></i> All User List</a></li>
			</ul>
		</li>	
		-->
		
		
	
		<!--<li>
			<a  style=" color:#000000;" href="index.php?data=Applicant_View"><i class="fa fa-edit"></i> Payment Approved  </a>
		</li>
        <li>
			<a  style=" color:#000000;" href="index.php?data=All_Applicat_List_Data"><i class="fa fa-edit"></i> All Applicant </a>
		</li> 
		<li>
			<a  style=" color:#000000;" href="index.php?data=Valid_Applicant_List"><i class="fa fa-edit"></i> Valid Applicant  </a>
		</li> 	
		<li>
			<a  style=" color:#000000;" href="index.php?data=InValid_Applicant_List"><i class="fa fa-edit"></i> Invalid Applicant  </a>
		</li> 			
        -->
        
       
		
	 
		
       <li>
			<a  style=" color:#000000;" href="index.php?data=collegeName/collegename"><i class="fa fa-edit"></i> College Information</a>
		</li>  	
	    <li>
			<a  style=" color:#000000;" href="index.php?data=centerName/centerName"><i class="fa fa-edit"></i> Center Information</a>
		</li>  	
		<li>
			<a  style=" color:#000000;" href="index.php?data=depertmentName/deptname"><i class="fa fa-edit"></i> Subject Information </a>
		</li>
		<li>
			<a  style=" color:#000000;" href="index.php?data=course/course"><i class="fa fa-edit"></i> Course Information </a>
		</li>
		<li>
			<a  style=" color:#000000;" href="index.php?data=advancedsearch/individual_student"><i class="fa fa-edit"></i> Individual Student </a>
		</li>
		<?php if($_SESSION['user_type']==1) { ?>
		<li>
			<a  style=" color:#000000;" href="index.php?data=regdata/registration"><span class="glyphicon glyphicon-plus"></span>  Add New Reg.  </a>
		</li>
		<?php } ?>
		<li>
			<a  style=" color:#000000;" href="index.php?data=advancedsearch/college_deperatment_wise_search"><span class="glyphicon glyphicon-print"></span>  Print Admit Card  </a>
		</li>
		
		<li>
			<a class="" href="#" style=" color:#000000;"><i class="fa fa-edit"></i> CSV Data Upload <span class="fa arrow"></span></a>
             <ul style='list-style:none; line-height:30px;'>
			  <li><a href="index.php?data=dataentry/hscresultupload"> <i class="fa fa-edit"></i> HSC CSV Upload</a></li>
			  <li><a href="index.php?data=dataentry/sscresultupload"> <i class="fa fa-edit"></i> SSC CSV Upload</a></li>
			</ul>
		</li>
		<!--
		
         <li>
			<a  style=" color:#000000;" href="index.php?data=admit/allStudentAdmit"><i class="fa fa-edit"></i> Admit Card </a>
		</li>		
		 	 
		<li>
			<a  style=" color:#000000;" href="index.php?data=reg/reg"><i class="fa fa-edit"></i> Registration No  </a>
	
		</li>
		<li>
			<a class="" href="#" style=" color:#000000;"><i class="fa fa-edit"></i> CSV Data Upload <span class="fa arrow"></span></a>
             <ul style='list-style:none; line-height:30px;'>
			  <li><a href="index.php?data=dataentry/course_data_upload"> <i class="fa fa-edit"></i> Course Data CSV</a></li>
			  <li><a href="index.php?data=dataentry/coursedataentrycsv"> <i class="fa fa-edit"></i> Reg Data CSV</a></li>
			</ul>
		</li>
		
		
		<li>
			<a  style=" color:#000000;" href="index.php?data=Download_All_Payment_Data"><i class="fa fa-edit"></i> Download Data  </a>
		</li>
	   <li>
			<a  style=" color:#000000;" href="index.php?data=dbbackup/backup"><i class="fa fa-edit"></i> DB Backup  </a>
		</li>

		
		<li>
			<a  style=" color:#000000;" href="index.php?data=Print_Data_required"><i class="fa fa-edit"></i> Print Data  </a>
		</li> 	
		
		<li>
			<a  style=" color:#000000;" href="index.php?data=Print_Data_required_reject"><i class="fa fa-edit"></i> Reject Data  </a>
		</li> 	
		-->
		
	<!--	
		<li>
			<a  style=" color:#000000;" href="index.php?data=date_data"><i class="fa fa-edit"></i> Date Settings  </a>
		</li> 
	
	    <li>
			<a  style=" color:#000000;" href="index.php?data=IDTracking/Id_Tracking"><i class="fa fa-edit"></i> ID Tracking </a>
		</li> 	
	    <li>
			<a  style=" color:#000000;" href="index.php?data=AdvancedSearch/AdvancedSearching"><i class="fa fa-edit"></i> Advanced Search </a>
		</li> 	
		 	
	    <li>
			<a  style=" color:#000000;" href="index.php?data=Admit_card"><i class="fa fa-edit"></i> Admit Card </a>
		</li> 	
		 	
		
		<li>
			<a  style=" color:#000000;" href="index.php?data=attandence_sheet_search"><i class="fa fa-edit"></i> Attendence Sheet  </a>
		</li> 
		
	    <li>
			<a  style=" color:#000000;" href="index.php?data=seat_tag_search"><i class="fa fa-edit"></i> Seat Label </a>
		</li>
	
	
		 
       	<li>
			<a  style=" color:#000000;"  href="index.php?data=Arrange_Seat_Plan"><i class="fa fa-edit"></i>Seat Allocation  </a>
		</li> 
		
        <!--
		<li>
			<a  style=" color:#000000;" href="index.php?data=roll_Assign"><i class="fa fa-edit"></i> Roll Assign  </a>
		</li> 	
	
        <li>
			<a  style=" color:#000000;" href="index.php?data=roll_no_update"><i class="fa fa-edit"></i> Roll Update  </a>
		</li> 	
	    
	   
		
        <li>
			<a  style=" color:#000000;" href="index.php?data=service/All_Problem_Request"><i class="fa fa-edit"></i> Service Request</a>
		</li>	
	     -->
		
         <li>
			<a href="home/logout.php"  style=" color:#000000;"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
		</li>
		 
		
	</ul>

</div>

</nav>


