<?php

include 'connection.php';
$email= $_POST["email"];
$pword= $_POST["pword"];
session_start();
$sql_query = "SELECT * FROM login where email_id like '$email' and pword like '$pword' ;";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$user_id = $row['user_id'];
if($user_id>=51000)
{
$sql = "select * from patient where patient_id ='$user_id';";
$result1 = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_assoc($result1);
$patient_fname=$row1['patient_fname'];
include "patienthome.php";
echo "<script type='text/javascript'>alert('Login successful... Welcome $patient_fname!!!')</script>";
$_SESSION['email']=$email; 
//header("Location:patienthome.html");
}
else if($user_id==1)
{
include 'adminhome.php';
echo "<script type='text/javascript'>alert('Login successful... Welcome Admin!!!')</script>";
}
else{
$sql2 = "select * from doctor where doctor_id ='$user_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$doctor_fname=$row2['doctor_fname'];
include "doctorhome.php";
echo "<script type='text/javascript'>alert('Login successful... Welcome $doctor_fname!!!')</script>";
$_SESSION['email']=$email; 
//header("Location:doctorhome.php");
} 
}
else
{
include 'loginform.html';
echo "<script type='text/javascript'>alert('Login failed...Try again..')</script>";

}
$conn->close();
?> 
