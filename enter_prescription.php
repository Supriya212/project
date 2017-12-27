<?php
include'connection.php';
//include'trigger.php';
session_start();
$email=$_SESSION['email'];
$medicine1=$_POST['medicine1'];
$medicine2=$_POST['medicine2'];
$medicine3=$_POST['medicine3'];
$morning1=$_POST['morning1'];
$morning2=$_POST['morning2'];
$morning3=$_POST['morning3'];
$afternoon1=$_POST['afternoon1'];
$afternoon2=$_POST['afternoon2'];
$afternoon3=$_POST['afternoon3'];
$evening1=$_POST['evening1'];
$evening2=$_POST['evening2'];
$evening3=$_POST['evening3'];
$ap_id=$_SESSION['ap_id'];


$sql_query = "SELECT * FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$doctor_id=$row['doctor_id'];

$sql1 = "SELECT * FROM appointment where ap_id like '$ap_id';";
$result1 = mysqli_query($conn,$sql1);

$row1 = mysqli_fetch_assoc($result1);
$patient_id=$row1['patient_id'];

$sql ="insert into prescription (doctor_id,patient_id,ap_id,medicine1,medicine2,medicine3,morning1,morning2,morning3,afternoon1,afternoon2,afternoon3,evening1,evening2
,evening3)values('$doctor_id','$patient_id','$ap_id','$medicine1','$medicine2','$medicine3','$morning1','$morning2','$morning3',
'$afternoon1','$afternoon2','$afternoon3','$evening1','$evening2','$evening3')";
}
if ($conn->query($sql) === TRUE) {

  //echo "<center>New record created successfully</center>";
header("Location:doctorhome.php");	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>
