<?php
include'connection.php';
include'doctorhome.php';
$fromdate=$_POST['start_day'];
$todate=$_POST['end_day'];
$reason=$_POST['reason'];

session_start();
$email=$_SESSION['email'];
//echo "email is:".$email;


$sql_query = "SELECT * FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

$row = mysqli_fetch_assoc($result);

$doctor_id=$row['doctor_id'];

do {

	$sql="INSERT INTO Holiday(doctor_id,reason,day) VALUES ('$doctor_id','$reason','$fromdate')";
if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
   
    echo "Error: " . $sql . "<br>" . $conn->error;
}
   $sql="select date_add('$fromdate',INTERVAL 1 DAY) as dat";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
    $sol=$row['dat'];
   // echo $sol;
    $fromdate=$sol;

    
} while ($fromdate<=$todate);
?>
