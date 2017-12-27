<?php
include'connection.php';
include'doctorhome.php';
session_start();
$email=$_SESSION['email'];
$patient_id = $_GET['patient_id'];
$sql_query = "SELECT doctor_id FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);
$ap_id=$_SESSION['ap_id'];
if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$doctor_id = $row['doctor_id'];
$sql1 = "SELECT * FROM prescription where doctor_id='$doctor_id' and patient_id='$patient_id';";
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
<title>Patient History</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="navbar.css"> 
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
<h1 style="margin-left:200px;">Patient History</h1>
<div class="tb">
<table style="width:100%">
  <tr>
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
$sql2 = "SELECT * from appointment where ap_id='$ap_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
/*$sql3 = "SELECT * FROM appointment where patient_id like '$patient_id' and ap_done=1;";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);*/
?>
<tr>
   
    <td style="color:white"><?php echo $row2['ap_date'];?></td>
    <td style="color:white"><?php echo $row1['medicine1'];?></td>
    <td style="color:white"><?php echo $row1['morning1'];?></td>
    <td style="color:white"><?php echo $row1['afternoon1'];?></td>
     <td style="color:white"><?php echo $row1['evening1'];?></td>
     </tr>
    
    <tr>
   
   <td style="color:white"></td>
    <td style="color:white"><?php echo $row1['medicine2'];?></td>
    <td style="color:white"><?php echo $row1['morning2'];?></td>
    <td style="color:white"><?php echo $row1['afternoon2'];?></td>
     <td style="color:white"><?php echo $row1['evening2'];?></td>
     </tr>
   
     <tr>
   
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
<br>
<br>
<a href ="patientprofile.php?ap_id=<?php echo $ap_id;?>" style="margin-left:200px">Back</a>

   </body>
</html>
<?php
}
$conn->close();

?>

