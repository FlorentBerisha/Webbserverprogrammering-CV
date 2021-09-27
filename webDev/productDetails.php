<!DOCTYPE html>
<html lang="en">
<head>

<title>Gadgetshop</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/main.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>
 <nav>
        <ul>
            <li><a href="Admin.php">Home</a></li>
            <li></li>
            <li></li>
            <li></li>
            <li>

            <?php
            session_start();

if(isset($_SESSION['admin'])){
 $name= $_SESSION['admin'];

echo '<a href="#"><span  style="color: ivory;"><strong> Hi Admin, '.$name.' </strong></span></a>';
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

    <?php
ob_start();
if (!( $con= mysqli_connect ("localhost" ,"root","","Gadgetshop"))) {
    
    die ("Can not connect to the database");    
    }
    ?>


    <?php

                     if(isset($_SESSION['admin']))
                    {?>

  <div id="searchdiv" style="display: none;">
 <section id="cart-view" style="margin-bottom: 50px;">
   <div class="container" id="F_V">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
            
               <div class="table-responsive">
                  <table class="table">
                  <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">


                    </tbody>
                  </table>
                </div>
</div>
</div></div></div></div></section>
</div>
<br>
<br>
                 
                    <h2 style="text-align: center; color: #96bb7c">Fruit&amp;Vegetables</h2>
 <section id="cart-view" style="margin-bottom: 50px;">
   <div class="container" id="F_V">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Category</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Product Description</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql="SELECT * FROM `item`";
                         $result = mysqli_query($con,$sql);
                         if($result)
                         {
                          while($row = $result->fetch_assoc()) {
                       print '<tr>
                       <td></td>
                        <td>'.$row["Item ID"].'</td>
                        <td>'.$row['Item Name'].' </td>
                        <td>'.$row['Category'].'</td>
                         <td>'.$row['Stock'].'</td>
                        <td>'.$row['Price'].'</td>
                        <td>'.$row['Item Description'].'</td>
                      </tr>';}

                         }
                         
                      ?>    
                      </tbody>
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
      <?php  }
                 else
                 {
                  print '<h3>Manager Not Found</h3>';
                 }
                  ?>
    <footer>
    <p>Florent - All rights reserved &copy; 2021 | <a href="index.html">Gadgetshop</a></p>
    </footer>
<script type="text/javascript">
  
 function myFunction(a,event)
{

    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
 alert("Product with ID "+a+" deleted");
     }
  };
  //send id With ajax call.
  xhttp.open("GET", "deleteUser.php?id="+a, true);
  xhttp.send();

}

</script>
</body>
</html>
