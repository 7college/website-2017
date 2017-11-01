<script>
function fnc_sytem(){
	//if(fn_validation("batch_id")==0)return;	
	var batch_id=$('#batch_id').val();
	var message=$('#message').val();	
	if(message.length !=0){
	//alert(message);
	var data='action=list_view&message='+message+'&batch_id='+batch_id;
	http.open( "POST","pages/sms/include/gratuate_report_sms.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange = fnc_sytem_response;
	http.send(data); 
	}
	else {
		alert('SMS Body Empty!!');
		}
}	

function fnc_sytem_response(){
	if(http.readyState == 4){
		// alert(http.responseText); return;
		$('#html_data').html('<img src="images/load.gif" style="width:500px; height:20px;"/>');
		var response=http.responseText;
		setTimeout(function(){$('#html_data').html(response) }, 1000);
	}
}

function fnc_data_add(sl){
	if(fn_validation("gratute_status"+sl)==0)return;	
	var studentID=$('#studentID'+sl).val();
	var gratute_status=$('#gratute_status'+sl).val();
	var data='action=list_gatuate_status&studentID='+studentID+'&gratute_status='+gratute_status;
	http.open( "POST","pages/report/include/gratuate_report.php",true);
	http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	http.onreadystatechange =fnc_data_add_response;
	http.send(data); 
}


function fnc_data_add_response(){
	if(http.readyState == 4){ 
		var response=http.responseText;
		alert('Data Update SuccessFully');
		fnc_sytem()
	}
}
</script>

<div id="page-inner" >
  <div class="row"  style="margin:0px; padding:0px;">
    <div class="col-md-12" style="margin:0px; padding:0px;"> 
      <!-- Advanced Tables -->
      <div class="panel panel-default" style="margin:0px; padding:0px;">
        <div class="panel-heading"> <span class="fa fa-list-ul"></span>Send SMS Selected Batch of Student</div>
        <div class="panel-body">
          <div id="messagebox" align="center"></div>
          <div class="table-responsive">
          <div class="smsmis">
       
            <table class="table table-striped table-bordered table-hover table-responsive" width="100%" border="1"  id="data_load_list">
              <tr>
                <td colspan="2" width="100%"><div class="control-group">
                    <label class="control-label"> Message </label>
                    <div class="controls">
                      <textarea id="message" name="message" rows="3" class="span6 " style="width:70%" required></textarea>
                    </div>                  
                  </div></td>
              </tr>
              <tr>
                <td width="40%"><select type="text"  id="batch_id"  name="batch_id" class="form-control">
                    <option value="">>--Select--< </option>
                    <option value="all">All Batch</option>
                    <?php
				
                $sqlBatch= mysql_query("SELECT * FROM  fbs_batch");
                while($row=mysql_fetch_assoc($sqlBatch)){
                ?>
                    <option value="<?php echo $row['batch_code']; ?>"><?php echo $row['batch_title']; ?></option>
                    <?php  } ?>
                  </select></td>
                <td><button class="btn btn-primary" onclick="fnc_sytem()"><span class="glyphicon glyphicon-plus-sign"></span> Send SMS</button></td>
              </tr>
            </table>
          </div>
            <div id="html_data" align="center"></div>
          </div>
        </div>
      </div>
      <!--End Advanced Tables --> 
    </div>
  </div>
  <!-- /. ROW  --> 
</div>
<!--<script>

$("#message1").keyup(function() {
extra = textCounter(document.smsmis.message, $("#message1").val().length);
total = $("#message1").val().length + extra;
$('input#msglength1').val(total);
});


function textCounter(field, maxlimit) {
var extraChars = 0;
var msgCount = 0;
for (var i = 0; (i < field.value.length); i++) {

if ((field.value.charAt(i) >= '0') && (field.value.charAt(i) <= '9')) {
}
else if ((field.value.charAt(i) >= 'A') && (field.value.charAt(i) <= 'Z')) {
}
else if ((field.value.charAt(i) >= 'a') && (field.value.charAt(i) <= 'z')) {
}
else if (field.value.charAt(i) == '@') {
}
else if (field.value.charAt(i) == '?') {
}
else if (field.value.charAt(i) == '$') {
}
else if (field.value.charAt(i) == '?') {
}
else if (field.value.charCodeAt(i) == 0xE8) {
}
else if (field.value.charCodeAt(i) == 0xE9) {
}
else if (field.value.charCodeAt(i) == 0xF9) {
}
else if (field.value.charCodeAt(i) == 0xEC) {
}
else if (field.value.charCodeAt(i) == 0xF2) {
}
else if (field.value.charCodeAt(i) == 0xC7) {
}
else if (field.value.charAt(i) == '\r') {
}
else if (field.value.charAt(i) == '\n') {
if (navigator.appName == "Netscape") {
extraChars++;
}
}
else if (field.value.charCodeAt(i) == 0xD8) {
}
else if (field.value.charCodeAt(i) == 0xF8) {
}
else if (field.value.charCodeAt(i) == 0xC5) {
}
else if (field.value.charCodeAt(i) == 0xE5) {
}
else if (field.value.charCodeAt(i) == 0x394) {
}
else if (field.value.charAt(i) == '_') {
}
else if (field.value.charCodeAt(i) == 0x3A6) {
}
else if (field.value.charCodeAt(i) == 0x393) {
}
else if (field.value.charCodeAt(i) == 0x39B) {
}
else if (field.value.charCodeAt(i) == 0x3A9) {
}
else if (field.value.charCodeAt(i) == 0x3A0) {
}
else if (field.value.charCodeAt(i) == 0x3A8) {
}
else if (field.value.charCodeAt(i) == 0x3A3) {
}
else if (field.value.charCodeAt(i) == 0x398) {
}
else if (field.value.charCodeAt(i) == 0x39E) {
}
else if (field.value.charCodeAt(i) == 0xC6) {
}
else if (field.value.charCodeAt(i) == 0xE6) {
}
else if (field.value.charCodeAt(i) == 0xDF) {
}
else if (field.value.charCodeAt(i) == 0xC9) {
}
else if (field.value.charAt(i) == ' ') {
}
else if (field.value.charAt(i) == '!') {
}
else if (field.value.charAt(i) == '\"') {
}
else if (field.value.charAt(i) == '#') {
}
else if (field.value.charCodeAt(i) == 0xA4) {
}
else if (field.value.charAt(i) == '%') {
}
else if (field.value.charAt(i) == '&') {
}
else if (field.value.charAt(i) == '\'') {
}
else if (field.value.charAt(i) == '(') {
}
else if (field.value.charAt(i) == ')') {
}
else if (field.value.charAt(i) == '*') {
}
else if (field.value.charAt(i) == '+') {
}
else if (field.value.charAt(i) == ',') {
}
else if (field.value.charAt(i) == '-') {
}
else if (field.value.charAt(i) == '.') {
}
else if (field.value.charAt(i) == '/') {
}
else if (field.value.charAt(i) == ':') {
}
else if (field.value.charAt(i) == ';') {
}
else if (field.value.charAt(i) == '<') {
}
else if (field.value.charAt(i) == '=') {
}
else if (field.value.charAt(i) == '>') {
}
else if (field.value.charAt(i) == '?') {
}
else if (field.value.charCodeAt(i) == 0xA1) {
}
else if (field.value.charCodeAt(i) == 0xC4) {
}
else if (field.value.charCodeAt(i) == 0xD6) {
}
else if (field.value.charCodeAt(i) == 0xD1) {
}
else if (field.value.charCodeAt(i) == 0xDC) {
}
else if (field.value.charCodeAt(i) == 0xA7) {
}
else if (field.value.charCodeAt(i) == 0xBF) {
}
else if (field.value.charCodeAt(i) == 0xE4) {
}
else if (field.value.charCodeAt(i) == 0xF6) {
}
else if (field.value.charCodeAt(i) == 0xF1) {
}
else if (field.value.charCodeAt(i) == 0xFC) {
}
else if (field.value.charCodeAt(i) == 0xE0) {
}
else if (field.value.charCodeAt(i) == 0x391) {
}
else if (field.value.charCodeAt(i) == 0x392) {
}
else if (field.value.charCodeAt(i) == 0x395) {
}
else if (field.value.charCodeAt(i) == 0x396) {
}
else if (field.value.charCodeAt(i) == 0x397) {
}
else if (field.value.charCodeAt(i) == 0x399) {
}
else if (field.value.charCodeAt(i) == 0x39A) {
}
else if (field.value.charCodeAt(i) == 0x39C) {
}
else if (field.value.charCodeAt(i) == 0x39D) {
}
else if (field.value.charCodeAt(i) == 0x39F) {
}
else if (field.value.charCodeAt(i) == 0x3A1) {
}
else if (field.value.charCodeAt(i) == 0x3A4) {
}
else if (field.value.charCodeAt(i) == 0x3A5) {
}
else if (field.value.charCodeAt(i) == 0x3A7) {
}
else if (field.value.charAt(i) == '^') {
extraChars++;
}
else if (field.value.charAt(i) == '{') {
extraChars++;
}
else if (field.value.charAt(i) == '}') {
extraChars++;
}
else if (field.value.charAt(i) == '\\') {
extraChars++;
}
else if (field.value.charAt(i) == '[') {
extraChars++;
}
else if (field.value.charAt(i) == '~') {
extraChars++;
}
else if (field.value.charAt(i) == ']') {
extraChars++;
}
else if (field.value.charAt(i) == '|') {
extraChars++;
}
else if (field.value.charCodeAt(i) == 0x20AC) {
extraChars++;
}
else {
//unicodeFlag = 1;
}


}
return extraChars;
}
</script>-->