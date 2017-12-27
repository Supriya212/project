<?php
include'connection.php';

$firstname = $_POST['firstname'];
$lastname =  $_POST['lastname'];
$pword=  $_POST['pword'];
$actor=$_POST['actor'];
$contact=$_POST['contact'];
$email = $_POST['email'];


if($actor=='Doctor')
{
$sql_query = "SELECT email_id FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result)>0)
{
echo "<center>User account already exists!!</center>";
//header("Location:signupform.html");	
}
else{
$sql = "INSERT INTO doctor (doctor_fname, doctor_lname, doctor_pword, contact_no, email_id)
VALUES ('$firstname','$lastname','$pword','$contact','$email')";}

}
else if($actor=='Patient')
{
$sql_query = "SELECT email_id FROM patient where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);
if(mysqli_num_rows($result)>0)
{
echo "<center>User account already exists!!</center>";
//header("Location:signupform.html");	
}
else{
$sql = "INSERT INTO patient (patient_fname, patient_lname, patient_pword, contact_no, email_id)
VALUES ('$firstname','$lastname','$pword','$contact','$email')";
}
}
if ($conn->query($sql) === TRUE) {

  //echo "<center>New record created successfully</center>";
//header("Location:loginform.html");
include "loginform.html";
echo "<script type='text/javascript'>alert('User Account Created Successfully!!!')</script>";	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>


