<?php
include'connection.php';
include 'adminhome.php';

$doctor_id=$_GET['doctor_id'];

$sql_query = "update doctor set verified=1 where doctor_id='$doctor_id';";
$result = mysqli_query($conn,$sql_query);
?>
<html>
<body>
<p>Doctor Verified Successfully!!!</p>
<td style="color:white"><a href ="admin.php">Back</a></td>
</body>
</html>


