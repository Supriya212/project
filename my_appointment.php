<?php
include'connection.php';
include 'patienthome.php';
session_start();
$email=$_SESSION['email'];
//echo "email is:".$email;


$sql_query = "SELECT * FROM patient where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$patient_id=$row['patient_id'];
$sql="select * from appointment where patient_id ='$patient_id' and ap_done=0;";
$result1 = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_assoc($result1);
?>
<html>
<head>
<link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
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
</style>
</head>
<body>
<div class="tb">
<table style="width:100%">
  <tr>
    <th style="color:white">Doctor Firstname</th>
    <th style="color:white">Doctor Lastname</th>
    <th style="color:white">Date</th>
    <th style="color:white">Time</th>
  </tr>
<?php
while($row1 = mysqli_fetch_assoc($result1))
{
$doctor_id=$row1['doctor_id'];
$sql2 = "SELECT * FROM doctor where doctor_id = '$doctor_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
?>

<tr>
    
    <td style="color:white"><?php echo $row2['doctor_fname'];?></td>
    <td style="color:white"><?php echo $row2['doctor_lname'];?></td>
    <td style="color:white"><?php echo $row1['ap_date'];?></td>
    <td style="color:white"><?php echo $row1['ap_time'];?></td>
     <!--<td style="color:white"><a href ="patientprofile.php?ap_id=<?php echo $row1['ap_id'];?>">View</a></td>-->
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
