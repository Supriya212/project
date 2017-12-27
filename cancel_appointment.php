<?php
include'connection.php';
include 'adminhome.php';
$patient_fname=$_POST['fname'];
$patient_lname=$_POST['lname'];
$sql_query = "SELECT * FROM appointment where ap_done=0 and patient_id=(select patient_id from patient where patient_lname='$patient_lname' and patient_fname='$patient_fname');";
$result = mysqli_query($conn,$sql_query);
$ap_id=$_SESSION['ap_id'];
if(mysqli_num_rows($result)>0)
{
?>
<html>
<head>
<title>Cancel Appointment</title>
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
margin-left:200px;
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
<h1 style="margin-left:300px;">Cancel Appointment</h1>
<div class="tb">
<table style="width:100%">
  <tr>
    
    <th style="color:white">Patient Name</th>
    <th style="color:white">Date</th>
    <th style="color:white">Timing</th>
     <th style="color:white">id</th>
  </tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>

 
    <td style="color:white"><?php echo $patient_fname; echo " "; echo $patient_lname?></td>
    <td style="color:white"><?php echo $row['ap_date'];?></td>
    <td style="color:white"><?php echo $row['ap_time'];?></td>
    <td style="color:white"><?php echo $row['ap_id'];?></td>
     <td style="color:white"><a href ="cancel.php?ap_id=<?php echo $row['ap_id'];?>">Cancel</a></td>
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

