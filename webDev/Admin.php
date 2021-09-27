<!DOCTYPE html>
<html lang="en">
<head>

<title>Gadgetshop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/main.css" rel="stylesheet">


</head>
<body>
 <nav>
        <ul>
            <li><a active="active" href="Admin.php">Home</a></li>
            <li></li>
            <li></li>
            <li></li>
            <li>
            <?php
            session_start();
            // check if admin is logged in or present in session and then show admins name;
if(isset($_SESSION['admin'])){
 $name= $_SESSION['admin'];

echo '<a href="#"><span  style="color: ivory;"><strong> Hi , '.$name.' </strong></span></a>';
echo '<a href="logout.php"><span  style="color: ivory;"><strong>Logout </strong></span></a>';

}
else
{
echo '<a href="#"><span  style="color: ivory;"><strong> Access Denied</strong></span></a>';

}

?>


</a></li>
</ul>
    </nav>

    <header class="header">
        <div>
            <h1><u>Gadgetshop</u></h1>
            <p>Ecommerce site for the latest electronic gadgets</p>
        </div>
    </header>
    <section>
        <article class="desc">
            <div class="container">
            <div class="loginDiv">    
               <!-- show operations when admin logged in -->
                  <?php

                     if(isset($_SESSION['admin']))
                    {?>
<ul>
                                       <li><h4><a href="add.php">Add an Item </a></h4></li>
                  <li><h4><a href="delete.php">Delete an Item </a></h4></li> 
                  <li><h4><a href="productDetails.php">Product Details </a></h4></li>
                  <li><h4><a href="searchProduct.php">Search Product </a></h4></li>
                </ul>
                

                 <?php  }

                 else
                 {

                  print '<h3>Manager Not Found</h3>';
                 }


                  ?>
            </div></div>
        </article>
    </section>
    <footer>
    <p>Florent - All rights reserved &copy; 2021 | <a href="index.html">Gadgetshop</a></p>
    </footer>

</body>
</html>
