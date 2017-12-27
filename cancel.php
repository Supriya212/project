<?php
include'connection.php';
include 'adminhome.php';
$ap_date=$_GET['ap_date'];
$ap_id=$_GET['ap_id'];
$_SESSION['ap_id']=$ap_id;
$sql_query = "delete from appointment where ap_id = '$ap_id';";
$result = mysqli_query($conn,$sql_query);
$row=mysqli_fetch_assoc($result);
?>
<html>
<body>
<p>Appointment Canceled Successfully!!!</p>
<td style="color:white"><a href ="cancel_appointment.php?ap_id=<?php echo $ap_id;?>">Back</a></td>
</body>
</html>


