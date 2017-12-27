<?php
include'connection.php';
session_start();
$email=$_SESSION['email'];
$from_date=$_POST['start_day'];
$end_date=$_POST['end_day'];
$reason=$_POST['reason'];
$sql_query = "SELECT * FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

$_SESSION['from_date']=$from_date;
$_SESSION['end_date']=$end_date;
$_SESSION['reason']=$reason;

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$doctor_id=$row['doctor_id'];
$sql = "INSERT INTO Holiday (doctor_id, reason, from_date, to_date)
VALUES ('$doctor_id','$reason','$from_date','$end_date')";
}
if ($conn->query($sql) === TRUE) {

header("Location:doctorhome.html");	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


