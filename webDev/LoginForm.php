<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection

$user_name = $_REQUEST['Uname'];
$pwd = $_REQUEST['Pass'];


$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error)
{
 	 	die("Connection failed: " . $conn->connect_error);
}




// Create database
		session_start();
		$db_selected = mysqli_select_db($conn,'Gadgetshop' );  
		if (!$db_selected) {
			// echo "<h1>Helooooooooooooooooooooooo</h1>"
//if db is not available. create db
    $sql = "CREATE DATABASE Gadgetshop";
            $result= mysqli_query($conn,$sql) or die($conn->error);
}


 
      //query to check login and password.
	$db_selected = mysqli_select_db($conn,'Gadgetshop' );  
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
        $sql="SELECT * FROM `user` WHERE `username`='".$user_name."' and `password`='".$pwd."'";
          
        $result= mysqli_query($conn,$sql) or die($conn->error);

       
        $numR= mysqli_num_rows($result);
        
       echo $numR;
        //if record is available means user exist
        if ($numR>0)
        {
     
	      	$row = $result->fetch_assoc();
	       	$_SESSION['custId']=$row['id'];
	     	$_SESSION['name']=$row['username'];
	        $_SESSION['phone']=$row['phonenumber'];
	        $_SESSION['city']=$row['address'];
	        $_SESSION['email'] = $row['email'];
	        
	        header ("Location:index.php");
		}

		else
		{
			//If not exist set as defaults.
	$db_selected = mysqli_select_db($conn,'Gadgetshop' );  
			     	$sql_create_table = "CREATE TABLE IF NOT EXISTS `manager` (
			    					`username` varchar(40) NOT NULL DEFAULT 'admin',
			  						`password` varchar(40) NOT NULL DEFAULT 'password')";


					$conn->query($sql_create_table);

			        $sql="SELECT * FROM `manager` WHERE `username`='".$user_name."' and `password`='".$pwd."'";
			          
			        $result= mysqli_query($conn,$sql) or die($conn->error);
			        $numR= mysqli_num_rows($result);
        
       echo $numR;
			        if($numR == 0)
			        {
			        	$sql = "INSERT INTO `manager`(`username`, `password`) VALUES ('admin','password')";

						if(mysqli_query($conn,$sql))
						{

							$sql="SELECT * FROM `manager` WHERE `username`='".$user_name."' and `password`='".$pwd."'";
			          
			        		$result= mysqli_query($conn,$sql) or die($conn->error);
			        		$numR= mysqli_num_rows($result);
			        		        
       echo $numR;
						}
						
			        }

			        if ($numR>0) 
			        {
			     
			             
       echo $numR;
			     		 $row = $result->fetch_assoc();
			     	     $_SESSION['admin']=$row['username'];
			     	     header ("Location:Admin.php");
			   		}
			   		else
			   		{
			   		    echo"Account doesnt exist";
				        header ("Location:login.php");
				    }
  
		}

?>