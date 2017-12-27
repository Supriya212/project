<?php
include'connection.php';

session_start();
$doctor_id=$_GET['doc_id'];
$patient_id=$_SESSION['patient_id'];
$_SESSION['doctor_id']=$doctor_id;
 
$sql = "SELECT * FROM doctor where doctor_id=$doctor_id";
$result = $conn->query($sql);

if ($result->num_rows == 0)
{
	echo "Not in database";
} 


$row = $result->fetch_assoc();

$result = $conn->query($sql);

?>

<html>
<head>
   <link rel="stylesheet" href="viewprofilecss.css">
   <link rel="stylesheet" href="newlogincss.css">
<link rel="stylesheet" href="navbar.css">
<style> 
    body{
      background-color: #007acc;
    }
   	a.button{ 
  
      pad
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;

    text-decoration: none;
    color: initial;
    }
  /*  #main{
      border: solid black;
      display: block;
     
      text-align: center;
      display:center;

    }*/
     img{
       
       border: #004d80;
       float: right;
       clear: left;
    }
   /* form{
      text-align: center;
      display:center;

    }*/
      #b2{
    width:100%;
	margin:auto;
	max-width:725px;
	/*min-height:770px;*/
	position:relative;
	box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
	background:#007acc;
	opacity: 0.9;
	padding:10px 40px 50px 30px;
	border-radius:25px;
	margin-left:350px;
    }
   </style>
</head>

<body>
<h2>Doctors Profile</h2>

<form>
 <img src="uploads/<?php echo $row['image']; ?>" alt="doctorsimage" style="width:304px;height:228px;">
 <h5>Name:<?php echo $row['doctor_fname']?>   <?php echo $row['doctor_lname']?></h5>
  <h5>Qualification:<?php echo $row['qualification']?></h5>
   <h5>Contact No.:<?php echo $row['contact_no']?></h5>
    <h5>Fees:<?php echo $row['fees']?></h5>
     <h5>Email_id:<?php echo $row['email_id']?></h5>
      <h5>Specialisation:<?php echo $row['specialisation']?></h5>
      <!-- <h5>Experience:<?php echo $row['experience']?></h5>-->
        
     
  

    </form>
   <script>
function getAvailability(str) {
    if (str== "") {
        document.getElementById("date_avail").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("date_avail").innerHTML = this.responseText;
            }
        };
       xmlhttp.open("GET","availabilty.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  

 <form id="dateForm" onsubmit="getAvailability(this.datepicker.value); return false;" method="GET">
.

  <h2>Select a date to check availability</h2>

  <input type="date" id="datepicker" >
  <input name="check" value="check" type="submit">
  </form>

 <form method="POST" action="book_appointment.php">
  <div id="date_avail"></div>
 <input type="submit" class="button" value="Book Now">
</form>

     

</body>
</html>

