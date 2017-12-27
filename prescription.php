<?php
include'connection.php';
include'doctorhome.php';
session_start();
$email=$_SESSION['email'];
$ap_id=$_SESSION['ap_id'];
//$ap_date=$_SESSION['ap_date'];
//$ap_id=$_GET['ap_id'];
//$patient_fname=$_POST['firstname'];
//$patient_lname=$_POST['lastname'];

$sql_query = "SELECT * FROM doctor where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);

if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$doctor_fname=$row['doctor_fname'];
$doctor_lname=$row['doctor_lname'];

$sql = "SELECT * FROM appointment where ap_id like '$ap_id';";
$result1 = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_assoc($result1);
$ap_date=$row1['ap_date'];
$i=1;
?>
<html>
<head>
<title> Prescription</title>
<link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
<style>
#a1{
display :inline-block;
}

th {
    text-align: left;
}
table, th, td {
    /*border: 1px solid black;
    border-collapse: collapse;
    color: white;
     font-family: 'Ubuntu';
	font-size:18px;
	background:#007acc;
	opacity:0.8;
}
th, td {
   /* padding: 15px;*/
}
.tb{
 background: #007acc;
 max-width:725px;
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
#a1{
display:inline;
}
</style>
</head>
<body>
<h1>Prescription</h1>
<form method="POST" action="enter_prescription.php">
Doctor Name:<?php echo $row['doctor_fname'];?>  <?php echo $row['doctor_lname'];?> <br>        
Appointment Date:<?php echo $row1['ap_date'];?>
<br><br>
<hr>
<div class="tb">
<table border="0" style="width:100%">
  <tr>
    <th>Sr.No.</th>
    <th>Medicine Name</th>
    
    <th colspan="2">Morning
	<table style="width:100%">
     <tr>
     <th>Before Meal</th>
     <th>After Meal</th>
     </tr>
     </table>
     </th>
     
    <th>Afternoon
    	<table style="width:100%">
     <tr>
     <th>Before Meal</th>
     <th>After Meal</th>
     </tr>
     </table>
    </th>
    
    <th>Evening
    	<table style="width:100%">
     <tr>
     <th>Before Meal</th>
     <th>After Meal</th>
     </tr>
     </table>
    </th>
  </tr>
  
    <tr>
    <td><?php echo $i ?></td>
    
    <td><input type="text" name="medicine1"></td>
    
    <th colspan="2">
	<table style="width:100%">
     <tr>
     <td><input type="radio" name="morning1" value="before meal"></td>
     <td><input type="radio" name="morning1" value="after meal"></td>
     </tr>
     </table>
     </th>
     
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="afternoon1" value="before meal"></td>
     <td><input type="radio" name="afternoon1" value="after meal"></td>
     </tr>
     </table>
    </th>
    
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="evening1" value="before meal"></td>
     <td><input type="radio" name="evening1" value="after meal"></td>
     </tr>
     
     </table>
    </th>
  </tr>
  <?php $i=$i+1;?>
  <tr>
    <td><?php echo $i ?></td>
    
    <td><input type="text" name="medicine2"></td>
    
    <th colspan="2">
	<table style="width:100%">
     <tr>
     <td><input type="radio" name="morning2" value="before meal"></td>
     <td><input type="radio" name="morning2" value="after meal"></td>
     </tr>
     </table>
     </th>
     
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="afternoon2" value="before meal"></td>
     <td><input type="radio" name="afternoon2" value="after meal"></td>
     </tr>
     </table>
    </th>
    
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="evening2" value="before meal"></td>
     <td><input type="radio" name="evening2" value="after meal"></td>
     </tr>
     
     </table>
    </th>
  </tr>
  <?php $i=$i+1;?>
  <tr>
    <td><?php echo $i ?></td>
    
    <td><input type="text" name="medicine3"></td>
    
    <th colspan="2">
	<table style="width:100%">
     <tr>
     <td><input type="radio" name="morning3" value="before meal"></td>
     <td><input type="radio" name="morning3" value="after meal"></td>
     </tr>
     </table>
     </th>
     
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="afternoon3" value="before meal"></td>
     <td><input type="radio" name="afternoon3" value="after meal"></td>
     </tr>
     </table>
    </th>
    
    <th>
    	<table style="width:100%">
     <tr>
      <td><input type="radio" name="evening3" value="before meal"></td>
     <td><input type="radio" name="evening3" value="after meal"></td>
     </tr>
     
     </table>
    </th>
  </tr>
  </table>
  </div>
  <hr>

<br>
<pre><input type="submit" value="Done"><a href ="patientprofile.php?ap_id=<?php echo $ap_id;?>" style="margin-left:400px">Back</a></pre>
</form>



</body>
</html>
<?php
}
$conn->close();

?>
