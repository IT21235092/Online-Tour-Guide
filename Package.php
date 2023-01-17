<?php

session_start();
@include 'config.php';
if(isset($_POST['add_to_cart'])){

   $package_name = $_POST['package_name'];
   $package_price = $_POST['package_price'];
   $package_image = $_POST['package_image'];
  
   

   $select_wish = mysqli_query($conn, "SELECT * FROM wushlist WHERE W_name = '$package_name'");

   if(mysqli_num_rows($select_wish) > 0){
      //$message[] = 'product already added to wishlist';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO wushlist(W_name, W_price, W_image) VALUES('$package_name', '$package_price', '$package_image')");
      //$message[] = 'product added to wishlist succesfully';
   }
   
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <style>


 .box  p a {display: block;
      width: 100%;
      text-align: center;
      background-color: var(--blue);
      color: white;
      font-size: 1.7rem;
      padding:1.2rem 3rem;
      border-radius: .5rem;
      cursor: pointer;
      margin-top: 1rem;}

   </style>

<header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="../Registration n Login/Home1.php">Home</a></li>
            <li><a href="hotspot.php">Hotspot</a></li>
            <li><a href="#" class="active">Packages</a></li>
            <li><a href="stays.php" >Stays</a></li>
            <li><a href="../Registration n Login/Registration.php">Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>


   <link rel="stylesheet" href="style/Package.css">
</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>




<div class="container">

<section class="products">

   <h1 class="heading">Packages</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM packages");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['P_image']; ?>"  height="100" alt="">
            <h3><?php echo $fetch_product['P_name']; ?></h3>
            <h2><?php echo $fetch_product['P_description']; ?></h2>
            <div class="price">LKR <?php echo $fetch_product['P_price']; ?>/-</div>
            <input type="hidden" name="package_name" value="<?php echo $fetch_product['P_name']; ?>">
            <input type="hidden" name="package_price" value="<?php echo $fetch_product['P_price']; ?>">
            <input type="hidden" name="package_image" value="<?php echo $fetch_product['P_image']; ?>">
            <input type="submit" class="btn" value="add to Wishlist" name="add_to_cart">
            <p><a href="check.php?idss= <?php echo $fetch_product['P_ID']?>">Book</a></p>

           
         </div>
      </form>
      <script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,window.location.href)
            }
            </script>
      <?php
         };
         
      };
      ?>

   </div>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<br>
<br>
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