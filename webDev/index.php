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
            <li><a class="active" href="index.php">Home</a></li>
            <?php
            session_start();

                    if(!isset($_SESSION['custId'])){
                echo '<li><a  href="login.php">Login</a></li>';
                }
                ?>
            <li></li>
            <li></li>
            <li></li>
            <li>

            <?php


if(isset($_SESSION['custId'])){
 $name= $_SESSION['name'];

echo '<a href="user_page.php"><span  style="color: ivory;"><strong> Hi, '.$name.' </strong></span></a>';
echo '<a href="logout.php"><span  style="color: ivory;"><strong>Logout </strong></span></a>';
}
else
{
echo '<a href="#"><span  style="color: ivory;"><strong> Hi, Guest</strong></span></a>';

}

?>


</a></li>
                 
                 
                </a>
           
              </div>


                  

            
        </ul>
    </nav>

<div class="container">
    <header class="header">
        <div>
            <center><h1><u>Gadgetshop</u></h1>
            <p>Ecommerce site for the latest electronic gadgets</p>
            </center>
        </div>
    </header>
</div>
    <section>
        <article class="desc">
            <div class="container">
                <div class="details">
                    <p>
                        Gadgetshop is an ecommerce store which sells electronics gadgets such as mobile phones, headphones, gaming consoles, laptops and many more electronic devices. We strive to ensure we can provide our customers with a simple and easy to use ecommerce store to purchase the latest electronic gadgets. We are committed to providing you with top quality products with a wide variety to select from, with the cheapest price. With fast shipping options and exclusive products we hope that our services meet your expectations and satisfy your needs.
                        <br><br>
                    </p>
                </div>
            </div>
        </article>
        <?php 
        if(!isset($_SESSION['custId'])){
    echo '<h2>Click here to  <a href="register.html">register</a> as User</h2>';
}

        ?>
            
    </section>


    <footer>
    <p>Florent - All rights reserved &copy; 2021 | <a href="index.html">Gadgetshop</a></p>
    </footer>

</body>
</html>
