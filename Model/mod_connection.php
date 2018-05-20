<?php
$localhost = 'localhost';
$username = "root";
$pass = "";
$dbname = 'mtest';

		

// Create connection
$con = new mysqli($localhost,$username,$pass,$dbname); 


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
// echo "Connected successfully";



?> 