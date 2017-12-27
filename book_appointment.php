<?php
include'connection.php';
include 'patienthome.php';
session_start();
$doctor_id=$_SESSION['doctor_id'];
$patient_id=$_SESSION['patient_id'];
$ap_date=$_SESSION['ap_date'];

$ap_time=$_POST['Available'];

/*echo "date";
echo "time"; 
echo $ap_date;
echo $ap_time;*/


$sql = "INSERT INTO appointment (patient_id,doctor_id,ap_time,ap_date) VALUES ('$patient_id','$doctor_id','$ap_time','$ap_date')";


if ($conn->query($sql) === TRUE) {

 echo "<script type='text/javascript'>alert('Appointment Booked Successfully!!!')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>






