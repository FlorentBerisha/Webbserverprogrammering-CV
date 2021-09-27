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
           <ul>
            <li><a href="Admin.php">Home</a></li>
            <li></li>
            <li></li>
            <li></li>
            <li>

            <?php
            session_start();

// show the Login person name on nav bar. get the name form session
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
            <h1><u>ADD PRODUCT</u></h1>
        </div>
    </header>
    <section>
        <article class="desc">
          <br><br>
          <center><div >
               <?php

                     if(isset($_SESSION['admin']))
                    {?> 
              <form  method="get" onsubmit="addProduct(event)" >
              <table>
               <!--  <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's Id: </td>
                  <td align="right"><input type="text" name="id" placeholder="Enter ID" style="width:16em; margin-bottom: 10px;" required/></td>
                </tr> -->
                <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's name:</td>
                  <td align="right"><input type="text" id="p_name" name="p_name" placeholder="Enter Name" style="width:16em; margin-bottom: 10px;" required/></td>
                </tr>
                

                 <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's price:</td>
                  <td align="right"><input type="text" id="p_price" name="p_price" placeholder="Enter Price" style="width:16em; margin-bottom: 10px;" required/></td>
                </tr>
                <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's type:</td>
                  <td align="right">
                       <select id ="Ptypes" style="width:16em; margin-bottom: 10px;" >
                       <option value="0" selected>Item's type</option>
                       <option value="Cell Phones">Cell Phones</option>
                       <option value="Headphones">Headphones</option>
                       <option value="Accessories">Accessories</option>
                       </option>
                     </td>
                </tr>

                <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's Quantity:  </td>
                  <td align="right"><input type="number" name="quant" id="quantity" min="0" max="500" placeholder="Enter Quantity" style="width:16em; margin-bottom: 10px;" required/></td>
                </tr>
                <tr>
                  <td align="left" style="margin-bottom: 10px;">Item's Description:</td>
                  <td align="right"><textarea  id="p_desc" name="p_desc" placeholder="Enter Description" style="width:16em; margin-bottom: 10px;"  required></textarea></td>
                </tr>

               <tr>
                  <td align="left" style="margin-bottom: 10px;">Select an image: </td>
                  
                </tr>
                <tr><td align="right"> <input type="file" id="img" name="img" id="img" accept="image/*" style="margin-bottom: 10px; margin-top: 10px;" required/></td></tr>

                  
              </table>
              <hr>
              <input type="submit" value="Add"  size="30" style="background-color: #96bb7c; color: white; border: 2px solid rgba(0, 0, 0, 0); color:white;">
              <input type="reset" value="Clear" size="30" style="background-color:#96bb7c; color: white; border: 2px solid rgba(0, 0, 0, 0); color:white;">
            </form>
                         <?php  }

                 else
                 {

                  print '<h3>Manager Not Found</h3>';
                 }


                  ?>
            </div>     </center>   </article>
    </section>
    <footer>
    <p>Florent - All rights reserved &copy; 2021 | <a href="index.html">Gadgetshop</a></p>
    </footer>

<script type="text/javascript">
   function addProduct(a) {
      // body...
      var name = document.getElementById("p_name").value;
      var price = document.getElementById("p_price").value;
      var quantity = document.getElementById("quantity").value;
      var res = document.getElementById("img").value;
      var types = document.getElementById("Ptypes").value;
       var desc = document.getElementById("p_desc").value;
      var img = res.substring(res.indexOf("h")+1, res.length);
a.preventDefault();
 img = "images\\"+img;
 alert(img);


      var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
 alert("product added");
     }
  };
  xhttp.open("GET", "addProduct.php?name="+name+"& price="+price +"& quantity="+quantity+"& img="+img+"& type="+types+"& desc="+desc, true);
  xhttp.send();
   }  

  function logout()
{
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "Leaves.php";
     }
  };
 
  xhttp.open("GET", "adminlogout.php", true);
  xhttp.send();
}    

  
</script>
</body>
</html>
