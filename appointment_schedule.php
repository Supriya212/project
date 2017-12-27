<?php
include'connection.php';
include'doctorhome.php';
session_start();
$email=$_SESSION['email'];
//$ap_id=$_SESSION['ap_id'];

$sql_query = "SELECT doctor_id FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$doctor_id = $row['doctor_id'];
$sql = "SELECT * FROM appointment where doctor_id = '$doctor_id' and ap_done=0;";
$result1 = mysqli_query($conn,$sql);
?>
<html>
<head>
<title>Appointment Schedule</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<style>
th {
    text-align: left;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    border-radius:25px;
}
th, td {
    padding: 15px;
}
.tb{
margin-right:200px;
margin-left:350px;
margin-top:50px;
 background: #007acc;
 opacity:0.8;
 color: white;
 
}
body{
font-family: 'Ubuntu';font-size: 22px;
}
a:link, a:visited {
    background-color: #004d80;
    color: white;
    padding: 14px 36px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius:25px;
}


a:hover, a:active {
    background-color: #66b3ff;
}

</style>
</head>
<body>
<!--<h1 style="margin-left:200px;">My Appointments</h1>-->
<div class="tb">
<table style="width:100%">
  <tr>
    <th style="color:white">Patient Firstname</th>
    <th style="color:white">Patient Lastname</th>
    <th style="color:white">Date</th>
    <th style="color:white">Time</th>
  </tr>
<?php
while($row1 = mysqli_fetch_assoc($result1))
{
$patient_id = $row1['patient_id'];
$sql2 = "SELECT * FROM patient where patient_id = '$patient_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
?>

<tr>
    
    <td style="color:white"><?php echo $row2['patient_fname'];?></td>
    <td style="color:white"><?php echo $row2['patient_lname'];?></td>
    <td style="color:white"><?php echo $row1['ap_date'];?></td>
    <td style="color:white"><?php echo $row1['ap_time'];?></td>
     <td style="color:white"><a href ="patientprofile.php?ap_id=<?php echo $row1['ap_id'];?>">View</a></td>
<?php
}
?>
 </tr>
</table>
</div>

   </body>
</html>
<?php
}
$conn->close();

?>
