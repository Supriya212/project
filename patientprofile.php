<?php
include'connection.php';
include'doctorhome.php';
session_start();
$ap_id=$_GET['ap_id'];
$email=$_SESSION['email'];
//echo "email is:".$email;
$_SESSION['ap_id']=$ap_id; 

$sql_query = "SELECT * FROM appointment where ap_id like '$ap_id';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$_SESSION['doctor_id']=$row['doctor_id']; 
$_SESSION['patient_id']=$row['patient_id']; 
$patient_id=$row['patient_id'];
$sql1 = "SELECT * FROM patient where patient_id = '$patient_id';";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_assoc($result1);
?>
<html>
<head>
<title>Patient Profile</title>
<link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<style>

h3,h4{display:inline;}
body{
font-family: 'Ubuntu';font-size: 20px;
}
form{
margin-left:350px;
margin-right:750px;
margin-top:100px;
margin-bottom:100px;
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
<h1 style="margin-bottom:-100px;margin-left:50px;margin-top:25px;">Patient Profile</h1>
<form method="POST" action="prescription.php">
<pre><h5>Name:<?php echo $row1['patient_fname'];?> <?php echo $row1['patient_lname'];?></h5></pre>
<h5>Age:
<?php echo $row1['age'];?></h5>
<pre><h5>Weight(in kg):                 Height(in foot):
<?php echo $row1['weight'];?>                                       <?php echo $row1['height'];?></h5></pre>
 <h5>Blood Group:
	 <select name="blood_group" disabled>
	 <option value="<?php echo $row1['blood_group'];?>">AB+</option>
	 <option value="<?php echo $row1['blood_group'];?>">A+</option>
	 <option value="<?php echo $row1['blood_group'];?>">B+</option>
	 <option value="<?php echo $row1['blood_group'];?>">O+</option>
	<option value="<?php echo $row1['blood_group'];?>">AB-</option>
	<option value="<?php echo $row1['blood_group'];?>">A-</option>
	<option value="<?php echo $row1['blood_group'];?>">B-</option>
	<option value="<?php echo $row1['blood_group'];?>">O-</option>
	 </select></h5>
   <h5>Address:
   <?php echo $row1['address'];?></h5>
  
   <h5>Allergy:
  <?php echo $row1['alergic_to'];?></h5>
  <!-- Diagnosis:<br>
 <textarea name="diagnosis" rows="2" cols="50"  disabled><?php echo $row1['diagnosis'];?></textarea>
 <br><br>-->
  <h5>Patient History:
  <?php echo $row1['patient_history'];?></h5>
 <h5>Contact-Number:
  <?php echo $row1['contact_no'];?></h5>
   <a href ="patient_history.php?patient_id=<?php echo $row1['patient_id'];?>">View Prescription History</a>
  <input type="submit" value="Prescribe">
</form>
</body>
<html>
<?php
}

$conn->close();

?>
