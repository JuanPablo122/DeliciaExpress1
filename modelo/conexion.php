<?php
$servername = "sql437.main-hosting.eu";
$username = "u991668360_daniela";
$password = "Daniela322";
$port=3306;
$bd="deliciaExpress";
/*$servername = "localhost";
$username = "root";
$password = "";
$bd="deliciaExpress";*/

// Create connection
$conn = new mysqli($servername, $username, $password, $bd, $port);

// Check connection
/*if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";*/
?>