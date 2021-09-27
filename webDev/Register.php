<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection

$user_name = $_REQUEST['Name'];
$pwd = $_REQUEST['psw'];



$email = $_REQUEST['email'];
$phonenumber = $_REQUEST['Contact'];



$address = $_REQUEST['Address'];
$subspkg = $_REQUEST['Subscription'];






$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database

$db_selected = mysqli_select_db($conn,'Gadgetshop' );

if (!$db_selected) {
	$sql = "CREATE DATABASE Gadgetshop";
	if ($conn->query($sql) === TRUE) 
	{
 		echo "Database created successfully";
	}
	else 
	{
 		echo "Error creating database: " . $conn->error;
	}
}


mysqli_select_db($conn,'Gadgetshop' );
$sql_create_table = "CREATE TABLE IF NOT EXISTS User(
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,                
		phonenumber  VARCHAR(30) NOT NULL,
		address VARCHAR(40) NOT NULL,
        subspkg  VARCHAR(30) NOT NULL
        )";


$conn->query($sql_create_table);

$insert_in_table = "INSERT INTO `User`(`username`, `password`, `email`, `phonenumber`, `address`, `subspkg`) VALUES ('".$user_name."','".$pwd."','".$email."','".$phonenumber."','".$address."','".$subspkg."')";


if ($conn->query($insert_in_table)) 
{
  //echo "<h1>User Registered Successfully</h1>";
 header("Location: login.php");
} else {
  echo "Error registering record: " . $conn->error;
}
 $conn->close();


?>