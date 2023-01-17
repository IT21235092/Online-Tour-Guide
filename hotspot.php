
<?php

@include 'config.php';
session_start();

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
            <li><a href="#" class="active">Hotspot</a></li>
            <li><a href="Package.php" >Packages</a></li>
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




<div class="container">

<section class="products">

   <h1 class="heading">Hotspots</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM hotspots ");

      
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
          
      ?>

      <form action="" method="get">
         <div class="box">
           <img src="uploaded_img1/<?php echo $fetch_product['H_image']; ?>"  height="100" alt=""></a>
            <h3><?php echo $fetch_product['H_name']; ?></h3>
           
            <input type="hidden" name="package_name" value="<?php echo $fetch_product['H_name']; ?>">
            <input type="hidden" name="package_price" value="<?php echo $fetch_product['H_price']; ?>">
            
           
            <p><a href="hotspot_details.php?id= <?php echo $fetch_product['H_ID']?>">View</a></p>
           
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