<?php
include'connection.php';



$sql = "SELECT * FROM doctor ";

$result = $conn->query($sql);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
   ?>

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
    body{
      
     font-family: 'Ubuntu';
  font-size:13px;

    background-size: 0%;
    background-color: #007acc;


    background-blend-mode: lighten;
     }
    img{
       border-radius: 50%;
       border: #004d80;
    }
   </style>
   </head>
   <body>
<div id="e1">
  <h2><?php echo $row['specialisation']?></h2>
   <img src="uploads/<?php echo $row['image']; ?>" alt="doctorsimage" style="width:228px;height:228px;">
    <br>
    <h2><?php echo $row['doctor_fname']?> <?php echo $row['doctor_lname']?> </h2>
   
    <a href="loginform.html" style="width:150px;height:45px;" class="button">View Profile</a>
  </div>
   </body>
   </html>

  
   <?php     
    }

}
?>
