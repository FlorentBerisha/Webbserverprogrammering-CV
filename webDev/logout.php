<?php
   session_start();
//Logout. Remove user from session.
if(isset($_SESSION['custId']))
{
	unset($_SESSION['custId']);
	unset($_SESSION['name']);
	unset($_SESSION['city']);
	unset($_SESSION['phone']);
    	 header ("Location:index.php");
}


if(isset($_SESSION['admin'])){
 		unset($_SESSION['admin']);
	
    	 header ("Location:index.php");
}

?>