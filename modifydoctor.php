<?php
include'connection.php';
session_start();
$email=$_SESSION['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$specialisation = $_POST['specialisation'];
$qualification = $_POST['qualification'];
$fees = $_POST['fees'];
$ContactNumber = $_POST['ContactNumber'];


$sql = "update doctor set doctor_fname = '$firstname',specification = '$specialisation',
qualification='$qualification',fees='$fees' where email_id like '$email';";


if ($conn->query($sql) === TRUE) {
header("Location:doctorhome.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
