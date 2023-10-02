<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="ema";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (mysqli_connect_errno()) {
echo "Failed" ;
} else{
echo "";}
?>