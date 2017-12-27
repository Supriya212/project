
   <!DOCTYPE html>
   <html>
   <head>
     <link rel="stylesheet" href="navbar.css">
     <link href='https://fonts.googleapis.com/css?family=Ubuntu'
rel='stylesheet'>

   <style> 
    #e1{
      display: inline-block;
      text-align: center;
      alignment-baseline: center;
      padding:50px 50px 50px 80px;
  	    font-family: 'Ubuntu';
  font-size:13px;
       background-color: #004d80;
       border-bottom-color: #007acc;
         
    }
     #e1:hover {
    background-color: white;
}

   	a.button 
   	{
  

  align-content: center;

  border-radius:2px;
  background:#004d80;
  color:white;
  width:150px;
  opacity: 0.9;
     text-decoration: none;
   font-family: 'Ubuntu';
  font-size:17px;
    }
    #a1{
      margin-left: 150px;
     font-family: 'Ubuntu';
  font-size:13px;

    background-size: 0%;
    


    background-blend-mode: lighten;
     }
     #a2{
        font-family: 'Ubuntu';
  font-size:13px;

    background-size: 0%;
    


    background-blend-mode: lighten;
     }
    img{
       border-radius: 50%;
       border: #004d80;
    }
   </style>
   </head>
   <body>
  
  <div class="tab">
<button class="tablinks" onclick="location.href='edit_patient.php'">Modify Profile</button>
<button class="tablinks" onclick="location.href='my_appointment.php'">My Appointment</button>
<button class="tablinks" onclick="location.href='my_prescription.php'">My Prescriptions</button>
<button class="tablinks" onclick="location.href='all_doctors.php'">Book Appointment</button>
<button class="active" onclick="location.href='logout.php'" style="margin-left:75px">Log Out</button>

</div>
<div id="a1">
   <?php
include'connection.php';

session_start();

$email=$_SESSION['email'];
//echo "email is:".$email;


$sql_query = "SELECT * FROM patient where email_id like '$email';";
$result = mysqli_query($conn,$sql_query);



$row = mysqli_fetch_assoc($result);
$patient_id=$row['patient_id'];
$_SESSION['patient_id']=$patient_id;
$sql = "SELECT * FROM doctor where verified=1;";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   ?>

<div id="e1">
  <h2><?php echo $row['specialisation']?></h2>
   <img src="uploads/<?php echo $row['image']; ?>" alt="doctorsimage" style="width:228px;height:228px;">
    <br>
    <h2><?php echo $row['doctor_fname']?> <?php echo $row['doctor_lname']?> </h2>
   
    <a href="viewprofile.php?doc_id=<?php echo $row['doctor_id'];?>" style="width:150px;height:45px;" class="button">View Profile</a>
  </div>
  </div>
   </body>
   </html>

  
   <?php     
    }

}
?>
  
