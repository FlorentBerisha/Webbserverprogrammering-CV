<?php
$servername = "localhost";
$username = "root";
$password = "";

//Get all Product details or parameters from the form.
 $name =  $_GET['name'];
$price = floatval($_GET['price']);
$img = $_GET['img'];
$quantity =(int)$_GET['quantity'];
$type = $_GET['type'];
$desc = $_GET['desc'];

 session_start();


// Connection to database
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database

$db_selected = mysqli_select_db($conn,'Gadgetshop' );

if (!$db_selected) {
//if db is not available. create db
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


// create table if not already available
$sql_create_table = "CREATE TABLE IF NOT EXISTS `item` (
  `Item ID` int(11)  PRIMARY KEY AUTO_INCREMENT,
  `Item Name` varchar(30) NOT NULL,
  `Item Image` varchar(100) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Price` float(15) NOT NULL,
  `Item Description` varchar(500) NOT NULL,
  `Category` varchar(30) NOT NULL
)";

echo $sql_create_table;
mysqli_select_db($conn,'Gadgetshop' );
//$conn->query($sql_create_table);
//Query to insert values into the table
mysqli_query($conn,$sql_create_table);
      $sql = "INSERT INTO `item`(`Item Name`, `Item Image`, `Stock`, `Price`, `Item Description`, `Category`) VALUES ('".$name."','".$img."','".$quantity."','".$price."','".$desc."','".$type."')";



if(mysqli_query($conn,$sql)){
    $_SESSION['itemSet']=1;
}








?>