<?php
include'connection.php';

$email = $_POST['email'];
$pword = $_POST['pword'];
//echo "hi";
$sql_query = "select * from login where email_id like '$email' ;";
$result = mysqli_query($conn,$sql_query);
//echo "hello";
if(mysqli_num_rows($result)>0)
{
$row = mysqli_fetch_assoc($result);
$user_id = $row['user_id'];
if($user_id>=51000)
{
$sql = "update patient set patient_pword = '$pword' where patient_id = '$user_id';";
//echo "user id is:".$user_id;
}
else{
$sql = "update doctor set doctor_pword = '$pword' where doctor_id ='$user_id';";
}
}
if ($conn->query($sql) === TRUE) {
header("Location:loginform.html");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
