<?php
include'doctorhome.php';
?>
<html>
<head>
<title>My Availability</title>
<link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<script>
function ValidateForm()
{
alert("Your Leave is registered successfully!!");
return true;
} 
</script>
</head>
<body>
<!--<h1>My Availability Form</h1>-->
<form id="myForm" method="POST" action="procedure.php"  onsubmit="return ValidateForm()">
	<br><br><br>
	<h5>From Date<br>
	<input type="date" name="start_day" required></h5>
	<h5>To Date<br>
	<input type="date" name="end_day" required></h5>
	<div id ="e3">Note:Enter same date in both date fields for one day holiday</div> 
	<h5>Reason<br>
	<input type="text" name="reason"></h5>
	<br>
	<input type="submit" value="Submit">
<form>
</body>
</html>

