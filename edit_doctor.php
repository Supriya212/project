<?php
include'connection.php';
include'doctorhome.php';
session_start();
$email=$_SESSION['email'];
//echo "email is:".$email;


$sql_query = "SELECT * FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result)
?>
<html>
<head>
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="newlogincss.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<style>

</style>
</head>
<body>

<form method="POST" action="modifydoctor.php">
<h5>Firstname<br>
<input type ="text" name="firstname" value="<?php echo $row['doctor_fname'];?>"disabled></h5>
<h5>Last Name:<br>
  <input type="text" name="lastname" value="<?php echo $row['doctor_lname'];?>"disabled></h5>
  <h5>Specialisation:<br>
   <select name="specialisation" disabled>
	 <option value="<?php echo $row['specialisation'];?>">Physician</option>
	<option value="<?php echo $row['specialisation'];?>">Opthalmologist</option>
	<option value="<?php echo $row['specialisation'];?>">Surgeon</option>
	<option value="<?php echo $row['specialisation'];?>">Gynaecologist</option>
	<option value="<?php echo $row['specialisation'];?>">Dermatologist</option>
	<option value="<?php echo $row['specialisation'];?>">Orthopedist</option>
	<option value="<?php echo $row['specialisation'];?>">Neurologist</option>
	<option value="<?php echo $row['specialisation'];?>">Psychiatrist</option>
	<option value="<?php echo $row['specialisation'];?>">Nephrologist</option>
	<option value="<?php echo $row['specialisation'];?>">Pediatrician</option>
	<option value="<?php echo $row['specialisation'];?>">Dentist</option>
	</select>
  <pre><h5>Qualification:                                                               Fees:
  <input type="text" name="qualification" value="<?php echo $row['qualification'];?>">              <input type="number" name="fees" value="<?php echo $row['fees'];?>"></h5></pre>
  <h5>Contact-Number:<br>
  <input type="text" name="ContactNumber"  pattern='[0-9]+' value="<?php echo $row['contact_no'];?>"></h5>
  <h5>Image:<br>
   <input type="file" name="fileToUpload" id="fileToUpload"></h5>

  <input type="submit" value="Modify">
</form>
</body>
</html>
<?php
}

$conn->close();

?>
