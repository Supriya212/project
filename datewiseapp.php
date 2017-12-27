<?php
include'connection.php';
include 'adminhome.php';
$ap_date = $_POST['ap_date'];

$sql_query = "SELECT * FROM appointment where ap_date ='$ap_date' and ap_done=1;";
$result = mysqli_query($conn,$sql_query);

//$sql1 = "SELECT count(*) FROM appointment where ap_date ='$ap_date' and ap_done=1;";
//$result1 = mysqli_query($conn,'CALL totapp('2017-10-02',@a);');
$sql1 = "CALL totapp('".$ap_date."',@a);";
$result1 = mysqli_query($conn,$sql1);
//$row1 = mysqli_fetch_assoc($result1);
$sql2 = "select @a as total;";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$total=$row2['total'];

if(mysqli_num_rows($result)>0)
{
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
<h1 style="margin-left:200px;">Appointments</h1>
<div class="tb">
<table style="width:100%">
  <tr>
    <th style="color:white">Patient Firstname</th>
    <th style="color:white">Patient Lastname</th>
    <th style="color:white">Doctor Firstname</th>
    <th style="color:white">Doctor Lastname</th>
    <th style="color:white">Time</th>
  </tr>
<?php
while($row = mysqli_fetch_assoc($result))
{$patient_id=$row['patient_id'];
$doctor_id=$row['doctor_id'];
$sql2 = "SELECT * FROM patient where patient_id = '$patient_id';";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$sql3 = "SELECT * FROM doctor where doctor_id = '$doctor_id';";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);
?>
<tr>
    
    <td style="color:white"><?php echo $row2['patient_fname'];?></td>
    <td style="color:white"><?php echo $row2['patient_lname'];?></td>
    <td style="color:white"><?php echo $row3['doctor_fname'];?></td>
    <td style="color:white"><?php echo $row3['doctor_lname'];?></td>
    <td style="color:white"><?php echo $row['ap_time'];?></td>

<?php
}
?>

 </tr>
</table>
</div>
<h4 style="margin-left:200px"><?php echo "Total Appointments:".$total;?></h4>
   </body>
</html>
<?php
}
$conn->close();

?>

