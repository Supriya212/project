<?php
include'connection.php';
session_start();
$email=$_SESSION['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$age = $_POST['age'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$blood_group = $_POST['blood_group'];
$address = $_POST['address'];
$Patient_history = $_POST['Patient_history'];
$allergy = $_POST['allergy'];
$diagnosis = $_POST['diagnosis'];
$prescription = $_POST['prescription'];
$contact = $_POST['ContactNumber'];

$sql = "update patient set patient_fname ='$firstname',patient_lname='$lastname',weight='$weight',height='$height',age='$age',
blood_group='$blood_group',address='$address',patient_history='$Patient_history',alergic_to='$allergy',diagnosis='$diagnosis',
prescription='$prescription' where email_id like '$email';";

if ($conn->query($sql) === TRUE) {
header("Location:patienthome.html");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
