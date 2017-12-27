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
?>
<html>
<head>
<link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
</head>
<body>
<form method="POST" action="modifypatient.php">
<pre><h5>Firstname                                                       Lastname
<input type ="text" name="firstname" value="<?php echo $row['patient_fname'];?>"disabled>          <input type="text" name="lastname" value="<?php echo $row['patient_lname'];?>" disabled></h5></pre>
  <pre><h5>Age                                                                   Blood Group
  <input type="number" name="age" value="<?php echo $row['age'];?>">           <select name="blood_group" disabled>
	                                                                       <option value="<?php echo $row['blood_group'];?>">AB+</option>
	                                                                        <option value="<?php echo $row['blood_group'];?>">A+</option>
	                                                                        <option value="<?php echo $row['blood_group'];?>">B+</option>
	                                                                        <option value="<?php echo $row['blood_group'];?>">O+</option>
	                                                                       <option value="<?php echo $row['blood_group'];?>">AB-</option>
	                                                                       <option value="<?php echo $row['blood_group'];?>">A-</option>
	                                                                        <option value="<?php echo $row['blood_group'];?>">B-</option>
	                                                                        <option value="<?php echo $row['blood_group'];?>">O-</option>
	                                                                       </select></h5></pre>
  <pre><h5>Weight(in kg)                                                 Height(in foot)
  <input type="number" name="weight" value="<?php echo $row['weight'];?>">        <input type="number" name="height" value="<?php echo $row['height'];?>"></h5></pre>
  
  
	
   <pre><h5>Address                                                           Allergy
   <textarea name="address" rows="1" cols="50"><?php echo $row['address'];?></textarea>      <textarea name="allergy" rows="1" cols="50"><?php echo $row['alergic_to'];?></textarea></h5></pre>
  
   <!--<h5>Patient History<br>
  <textarea name="Patient_history" rows="1" cols="50"><?php echo $row['patient_history'];?></textarea></h5>-->
  
  
  
  
<!--<h5>Diagnosis<br>
 <textarea name="diagnosis" rows="1" cols="50" value="<?php echo $row['diagnosis'];?>"></textarea></h5>-->
  
  <h5>Contact-Number<br>
  <input type="text" name="ContactNumber" pattern='[0-9]+' value="<?php echo $row['contact_no'];?>"></h5>
  <br>
  <input type="submit" value="Modify">
</form>
</body>
</html>
<?php
}

$conn->close();

?>
