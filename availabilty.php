
<html>
<head>
<style> 
   	a.button 
   	{
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    }
   </style>
</head>
<body>

<?php
session_start();
$doctor_id=$_SESSION['doctor_id'];

$q = $_GET['q'];
$_SESSION['ap_date']=$q;
/*if( date("d-m-Y")<$q)
{

echo "Select Date Greater than or equal to  Current Date";
}*/


$con = mysqli_connect('localhost','root','Password#123','clinic');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

 
$sql="SELECT * FROM Holiday WHERE doctor_id=$doctor_id and day='$q'";

$result = mysqli_query($con,$sql);
if($result->num_rows!=0)
	{echo "DATE NOT AVAILABLE PLZ SELECT SOME OTHER DATE";}
else{
$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q'";
$result = mysqli_query($con,$sql);
if ($result->num_rows ==6)
	echo "ALL SLOTS ARE BOOKED FOR THE DAY SELECT ANOTHER DAY";
else{

    

   $sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '12:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
   echo 'Available Time Slots
   <select name="Available">
  <option value="12:00:00"';
  if($row['ap_time']=='12:00:00')
  	echo 'disabled';
 echo '>12:00:00</option>';
 
$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '01:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
 
  echo '<option value="01:00:00"';
 if($row['ap_time']=='01:00:00')
  	echo 'disabled';
  echo '>01:00:00</option>
  <option value="02:00:00"';


  $sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '02:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
  if($row['ap_time']=='02:00:00')
  	echo 'disabled';
  echo '>02:00:00</option>';


$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '03:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
  echo '<option value="03:00:00"';
if($row['ap_time']=='03:00:00')
  	echo 'disabled';
  echo '>03:00:00</option>';


$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '04:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();
  echo '<option value="04:00:00"';
if($row['ap_time']=='04:00:00')
  	echo 'disabled';
  echo '>04:00:00</option>';

$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '05:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

  echo '<option value="05:00:00"';
if($row['ap_time']=='05:00:00')
  	echo 'disabled';
  echo '>05:00:00</option>';

$sql="SELECT * FROM appointment WHERE doctor_id = $doctor_id and ap_date='$q' and ap_time = '06:00:00'";
$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

  echo '<option value="06:00:00"';
if($row['ap_time']=='06:00:00')
  	echo 'disabled';
  echo '>06:00:00</option>
 
</select>';

   
}
}

mysqli_close($con);
?>
</body>
</html>
