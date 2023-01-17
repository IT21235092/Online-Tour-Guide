<?php

@include 'config.php';
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>

<style>


.box  p  a{display: block;
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
            <li><a href="Package.php" >Packages</a></li>
            <li><a href="#" class="active">Stays</a></li>
            <li><a href="../Registration n Login/Registration.php">Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>


   <link rel="stylesheet" href="style/Package.css">
</head>
<body>




<div class="container">

<section class="products">

   <h1 class="heading">Stays</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM stays");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
         <img src="uploaded_img2/<?php echo $fetch_product['ST_image']; ?>"  height="100" alt="">
            <h3><?php echo $fetch_product['ST_name']; ?></h3>
            <h2><?php echo $fetch_product['ST_description1']; ?></h2>

          
           <p> <a href="stay_details.php?ids= <?php echo $fetch_product['ST_ID']?>">View</a></p>
         </div>
      </form>

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