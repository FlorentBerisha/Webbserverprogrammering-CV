<?php
$servername = "localhost";
$username = "root";
$password = "";



//get the sent id

 $id = (int)$_GET['id'];



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


//delete query
$sql =  " DELETE FROM  `item` WHERE `Item ID` = ".$id;

if ($conn->query($sql)) 
{
  echo "Record deleted successfully";
  //header('Location: Refresh:0');
} else {
  echo "Error deleting record: " . $con->error;
}

 ?>