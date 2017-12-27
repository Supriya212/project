<?php
include 'adminhome.php';
?>
<html>
<head>
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="newlogincss.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<style>

</style>
</head>
<body>

<form method="POST" action="cancel_appointment.php">
<h3>First Name:</h3>
<input type ="text" name="fname">
<br>
<h3>Last Name:</h3>
<input type ="text" name="lname">
<br>
<input type="submit" value="Submit">
<br>
</form>
</body>
</html>

