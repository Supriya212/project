<?php

session_start();


session_unset();
//unset($_SESSSION['email_id']);
session_destroy();
//echo"Logged out";
echo "<script type='text/javascript'>alert('Logged Out Successfully!!!')</script>";
include 'landing_1.html';
?>
