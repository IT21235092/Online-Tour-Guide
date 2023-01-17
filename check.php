<?php

@include 'config.php';
session_start();

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   // $cart_query = mysqli_query($conn, "SELECT * FROM oorder");
   // $price_total = 0;
   // if(mysqli_num_rows($cart_query) > 0){
   //    while($product_item = mysqli_fetch_assoc($cart_query)){
   //       $product_name = $product_item['H_name'] ;
   //       $product_price = number_format($product_item['price']);
   //       $price_total = $product_price;
   //    };
   // };

   $total_product = $_SESSION['name'];
   $price_total = $_SESSION['price'];
  // $total_product = implode($product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO book(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            
            <h2> total : $".$price_total."/-  </h2>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            
         </div>
            <a href='../Registration n login/Home1.php' class='btn'>Go to home</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html>
<head>
   
   <!-- custom css file link  -->
   <link rel="stylesheet" href="style/norder.css">

   <header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="../Registration n Login/Home1.php">Home</a></li>
            <li><a href="hotspot.php" >Hotspot</a></li>
            <li><a href="Package.php" >Packages</a></li>
            <li><a href="stays.php" >Stays</a></li>
            <li><a href="../Registration n Login/Registration.php">Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>

</head>
<body>



<div class="container">

<section class="checkout-form">

   <h1>complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $record_IDss = $_GET['idss'];
         $record_IDss = intval($record_IDss) ;
         

         $select_cart = mysqli_query($conn, "SELECT * FROM packages  WHERE P_ID = '$record_IDss'");
         $total = 0;
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = number_format($fetch_cart['P_price'] );
            $grand_total =  $total_price;

            $_SESSION['name']=$fetch_cart['P_name'];
            $_SESSION['price']=$grand_total;
      ?>
      
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your order is empty!</span></div>";
      }
      ?>
      <h3> grand total : LKR <?= $grand_total; ?>/- </h3>
   </div>

   
            <br><div class="form">
            <h2>your name</h2>
            <input type="text" placeholder="enter your name" name="name" required class="fbox">
         
         
            <br><h2>your number</h2>
            <input type="number" placeholder="enter your number" name="number" required class="fbox">
      
         
            <br><h2>your email</h2>
            <input type="email" placeholder="enter your email" name="email" required class="fbox">
         
         <br><div class="inputBox">
            <h2>payment method</h2>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         
            <br><h2>address line 1</h2>
            <input type="text" placeholder="e.g. flat no." name="flat" required class="fbox">
         
         
            <br><h2>address line 2</h2>
            <input type="text" placeholder="e.g. street name" name="street" required class="fbox">
         
         
            <br><h2>city</h2>
            <input type="text" placeholder="e.g. kandy" name="city" required class="fbox">
         
         
            <br><h2>state</h2>
            <input type="text" placeholder="e.g. Central province" name="state" required class="fbox">
         
         
            <br><h2>country</h2>
            <input type="text" placeholder="e.g. Sri Lanka" name="country" required class="fbox">
         
         
            <br><h2>pin code</h2>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required class="fbox">
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </div>
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<footer>
        <ul class="social_icon">
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
        </ul>
        <ul class="fmenu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Stays</a></li>
            <li><a href="#">Community</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
        </ul>
        <p>Copyright © 2022 Let's Go.com™. All rights reserved</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

   
</body>
</html>