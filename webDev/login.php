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
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="login.php">Login</a></li>
            <li></li>
            <li></li>
            <li></li>
            <li>

            <?php
            session_start();

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


</a> </a>
           
              </div>


                  

            
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
                <form id="login" class="myForm" method="Post" action="LoginForm.php">    
                    <label><b>User Name     
                    </b>    
                    </label>    
                    <input class="form-control" type="text" name="Uname" id="Uname" placeholder="Username">    
                    <br><br>    
                    <label><b>Password     
                    </b>    
                    </label>    
                    <input class="form-control" type="Password" name="Pass" id="Pass" placeholder="Password">    
                    <br><br>    
                    <input class="btn btn-primary" type="submit" name="log" id="log" value="Log In Here">       
                    <br><br>    
                    <input type="checkbox" id="check">    
                    <span>Remember me</span>    
                    <br><br>    
                </form>
            </div></div>
        </article>
    </section>
    <footer>
    <p>Florent - All rights reserved &copy; 2021 | <a href="index.html">Gadgetshop</a></p>
    </footer>

</body>
</html>
