<?php
include'connection.php';
include 'adminhome.php';
$sql_query = "SELECT * FROM doctor where verified=0;";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
?>
<html>
<head>
<title>Doctor Verification</title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Days One" rel="stylesheet">
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
margin-top: 50px;
margin-right:200px;
margin-left:350px;
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

.doctor_verification{
position: absolute;
top: 80px;
left: 0px;
right: 0px;
background-color: #007acc
background: -moz-linear-gradient(right, rgba(204, 242, 255,0), rgba(0, 172, 230,0.8)); /* For Firefox 3.6 to 15 */
background: linear-gradient(to right,  rgba(204, 242, 255,0), rgba(0, 172, 230,0.8));

filter: alpha(opacity=90);
border: none;
color: white;
padding: 55px 60px;
text-align: center;
text-decoration: none;
 /*box-shadow: 0 8px 10px 0 rgba(0, 0, 0.1, 0.5), 0 6px 20px 0 rgba(0, 0, 0.1, 0.15);*/
font-family: 'Days One', sans-serif;
font-size: 48px;
}


</style>
</head>
<body>

<div class="tb">
<table style="width:100%">
  <tr>
    <th style="color:white">Doctor Firstname</th>
    <th style="color:white">Doctor Lastname</th>
    <th style="color:white">Qualification</th>
    <th style="color:white">Specialisation</th>
     <th style="color:white">Fees</th>
  </tr>
<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    
    <td style="color:white"><?php echo $row['doctor_fname'];?></td>
    <td style="color:white"><?php echo $row['doctor_lname'];?></td>
    <td style="color:white"><?php echo $row['qualification'];?></td>
    <td style="color:white"><?php echo $row['specialisation'];?></td>
    <td style="color:white"><?php echo $row['fees'];?></td>
     <td style="color:white"><a href ="admin_verify.php?doctor_id=<?php echo $row['doctor_id'];?>">Verify</a></td>
<?php
}
?>
 </tr>
</table>

   </body>
</html>
<?php
}
$conn->close();

?>

