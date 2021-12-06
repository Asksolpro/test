<?php
$timezone = "Asia/Manila";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$checkin = date('m/d/Y');
$checkout = date('m/d/Y', strtotime("+1 day", strtotime($checkin)));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reservation Widget</title>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.21.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
<script>
$(function() {
    $( "#sd" ).datepicker({
        // before datepicker opens run this function
        beforeShow: function(){
            // this gets today's date       
            var theDate = new Date();
            // sets "theDate" 2 days ahead of today
            //theDate.setDate(theDate.getDate() + 2);
			theDate.setDate(<?php echo $checkin ?> + 2);
            // set min date as 2 days from today
            $(this).datepicker('option','minDate',theDate);         
        },
        // When datepicker for start date closes run this function
        onClose: function(){
            // this gets the selected start date        
            var theDate = new Date($(this).datepicker('getDate'));
            // this sets "theDate" 1 day forward of start date
            theDate.setDate(theDate.getDate() + 1);
            // set min date for the end date as one day after start date
            $('#ed').datepicker('option','minDate',theDate);
			
        }
    });
    $( "#ed" ).datepicker({
        // before datepicker opens run this function
        beforeShow: function(){
            // this gets today's date       
            var theDate = new Date($( "#sd" ).datepicker('getDate'));
            // sets "theDate" 2 days ahead of today
            theDate.setDate(theDate.getDate() + 1);
            // set min date as 2 days from today
            $(this).datepicker('option','minDate',theDate);         
        }	
	});
});
</script>
<style type="text/css">
.footer {
	text-align: center;
}
.header {
	text-align: center;
}
.content {
	text-align: center;
}
</style>
</head>
<body>
<table width="600" border="1" align="center">
	<tr>
		<td colspan="2" bgcolor="#0099CC"><h1 class="header">Header</h1></td>
	</tr>
	<tr>
		<td width="200" bgcolor="#999999">
<h2>Reservation</h2>
<div>
	<form id="reservation" method="post" action="#" >
		<table width="100%" border="0">
			<tr>
				<td>Check In</td>
				<td>:</td>
				<td><input name="sd" type="text" id="sd" value="<?php echo $checkin ?>" size="10" maxlength="10" /></td>
			</tr>
			<tr>
				<td>Check Out</td>
				<td>:</td>
				<td><input name="ed" type="text" id="ed" value="<?php echo $checkout ?>" size="10" maxlength="10" /></td>
			</tr>
			<tr>
				<td>Adult</td>
				<td>:</td>
				<td><select name="adult" class="ed" >
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select></td>
			</tr>
			<tr>
				<td>Children</td>
				<td>:</td>
				<td><select name="child" class="ed">
						<option>0</option>
						<option>1</option>
						<option>2</option>
					</select></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td><input name="btnReservation" type="submit" value="Check Availability" id="button" /></td>
			</tr>
		</table>
	</form>
</div>		
		</td>
		<td><h1 class="content">Content</h1></td>
	</tr>
	<tr>
		<td colspan="2" bgcolor="#9999FF"><h1 class="footer">Footer</h1></td>
	</tr>
</table>
</body>
</html>
