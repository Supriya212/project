<?php
include'connection.php';
include 'patienthome.php';
session_start();
$email=$_SESSION['email'];

$sql_query = "SELECT patient_id FROM patient where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$patient_id = $row['patient_id'];
$sql1 = "SELECT * FROM prescription where patient_id='$patient_id';";
$result1 = mysqli_query($conn,$sql1);


/*$sql2 = "SELECT * FROM doctor where doctor_id like '$doctor_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT * FROM appointment where patient_id like '$patient_id';";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);*/

?>
<html>
<head>
<title>My Prescription</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 

<style>

th {
    text-align: left;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    
}
body{
font-family: 'Ubuntu';font-size: 22px;
}
.tb{
margin-right:200px;
margin-left:350px;
margin-top:50px;
 background: #007acc;
 opacity:0.8;
 color: white;
 
}
</style>
</head>
<body>
<!--<h1 style="margin-left:200px;">My Prescriptions</h1>-->
<form>
<div class="tb">
<table style="width:100%">
  <tr>
    
    <th style="color:white">Doctor Firstname</th>
    <th style="color:white">Doctor Lastname</th>
     <th style="color:white">Date</th>
    <th style="color:white">Medicine Name</th>
    <th style="color:white">Morning</th>
    <th style="color:white">Afternoon</th>
    <th style="color:white">Evening</th>
  </tr>
<?php
while($row1 = mysqli_fetch_assoc($result1))
{
$doctor_id = $row1['doctor_id'];
$ap_id= $row1['ap_id'];
$sql2 = "SELECT doctor_fname,doctor_lname FROM doctor where doctor_id like '$doctor_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$sql3 = "SELECT * FROM appointment where ap_id = '$ap_id';";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);

?>
<tr>
   
    <td style="color:white"><?php echo $row2['doctor_fname'];?></td>
    <td style="color:white"><?php echo $row2['doctor_lname'];?></td>
     <td style="color:white"><?php echo $row3['ap_date'];?></td>
    <td style="color:white"><?php echo $row1['medicine1'];?></td>
    <td style="color:white"><?php echo $row1['morning1'];?></td>
    <td style="color:white"><?php echo $row1['afternoon1'];?></td>
     <td style="color:white"><?php echo $row1['evening1'];?></td>
</tr>

 <tr>
   
   <td style="color:white"></td>
   <td style="color:white"></td>
   <td style="color:white"></td>
    <td style="color:white"><?php echo $row1['medicine2'];?></td>
    <td style="color:white"><?php echo $row1['morning2'];?></td>
    <td style="color:white"><?php echo $row1['afternoon2'];?></td>
     <td style="color:white"><?php echo $row1['evening2'];?></td>
     </tr>
   
     <tr>
   
   <td style="color:white"></td>
   <td style="color:white"></td>
   <td style="color:white"></td>
    <td style="color:white"><?php echo $row1['medicine3'];?></td>
    <td style="color:white"><?php echo $row1['morning3'];?></td>
    <td style="color:white"><?php echo $row1['afternoon3'];?></td>
     <td style="color:white"><?php echo $row1['evening3'];?></td>
     </tr> 
    
<?php
}
?>
 
</table>
</div>
</form>
   </body>
</html>
<?php
}
$conn->close();

?>

