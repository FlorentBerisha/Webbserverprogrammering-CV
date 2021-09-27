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
                 
                    <h2 style="text-align: center; color: #96bb7c">Product Details</h2>

<!-- here -->

<section>
        <article class="desc">
            <div class="container">
            <div class="loginDiv">    
                <form id="login" class="myForm" method="Post" action="LoginForm.php">    
                    <label><b>Product Id     
                    </b>    
                    </label>    
                    <input class="form-control" type="text" id="prodID" placeholder="Enter Product Id">    
                    <br><br>    
                    <input class="btn btn-primary" onclick="onSearch();" value="search">            
                </form>
            </div></div>
        </article>
    </section>
<!-- end here -->

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
                    <tbody id='tbody'>
                      <tr id="row">
                      </tr>
                          
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
  xhttp.open("GET", "deleteUser.php?id="+a, true);
  xhttp.send();

}

function onSearch()
{
var prodId = document.getElementById('prodID').value;
var objXMLHttpRequest = new XMLHttpRequest();
objXMLHttpRequest.onreadystatechange = function() {
  if(objXMLHttpRequest.readyState === 4) {
    if(objXMLHttpRequest.status === 200) {
          var response = objXMLHttpRequest.responseText;
          if(response)
          {
                     var res = response.split(",");
          //get response of ajax call. it gets the searched product info.
          //create row with js dynamically and append in the table
          document.getElementById('row').innerHTML = "";
          var td0 = document.createElement("td");
          var td1 = document.createElement("td");
          td1.innerHTML = res[0];
          var td2 = document.createElement('td');
          td2.innerHTML = res[1];
          var td3 = document.createElement('td');
          td3.innerHTML = res[2];
          var td4 = document.createElement('td');
          td4.innerHTML = res[3];
          var td5 = document.createElement('td');
          td5.innerHTML = res[4];
          var td6 = document.createElement('td');
          td6.innerHTML = res[5];
          document.getElementById('row').appendChild(td0);          
          document.getElementById('row').appendChild(td1);
          document.getElementById('row').appendChild(td2);
          document.getElementById('row').appendChild(td3);
          document.getElementById('row').appendChild(td4);
          document.getElementById('row').appendChild(td5);
          document.getElementById('row').appendChild(td6);
          document.getElementById('row').appendChild(td7);
 
          }


    } else {
          alert('Error Code: ' +  objXMLHttpRequest.status);
          alert('Error Message: ' + objXMLHttpRequest.statusText);
    }
  }
}
objXMLHttpRequest.open('GET', 'ajax_searchResponse.php?prodId='+prodId);
objXMLHttpRequest.send();
}

</script>
</body>
</html>
