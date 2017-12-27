

<html>
<head>
<link rel="stylesheet" href="navbar.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Patient Home Page</title> 
<style>
div.clinic_logo{

float: left;
padding-top: 0px;
padding-right: 20px;
padding-bottom: 0px;
padding-left: 10px;

}
</style>
</head>
<body>
<div class="clinic_logo">
<img src="clinic_logo_1.png" alt="Medico Clinic" width="300" height="300" style="float:left;">
</div>
<div class="tab">
<button class="tablinks" onclick="location.href='edit_patient.php'">Modify Profile</button>
<button class="tablinks" onclick="location.href='my_appointment.php'">My Appointment</button>
<button class="tablinks" onclick="location.href='my_prescription.php'">My Prescriptions</button>
<button class="tablinks" onclick="location.href='all_doctors.php'">Book Appointment</button>
<button class="active" onclick="location.href='logout.php'" style="margin-left:125px">Log Out</button>
</div>
<br>

<p><?php echo $row['patient_fname']; ?><?php echo $row['patient_lname']; ?></p>

</body>
</html>

