<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection

$prodId = $_REQUEST['prodId'];

//connect to database.
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// Create database
    session_start();
    $db_selected = mysqli_select_db($conn,'Gadgetshop' );  
 
      //get information of the product you want to search.
        $sql="SELECT * FROM `item` WHERE `Item ID`='".$prodId."'";
          
        $result= mysqli_query($conn,$sql);
        if($result)
        {
        $row = $result->fetch_assoc();
        echo ($row['Item ID'].','.$row['Item Name'].','.$row['Stock'].','.$row['Price'].','.$row['Item Description'].','.$row['Category']);
	
        }
        else{
        	echo "";
        }
        

?>