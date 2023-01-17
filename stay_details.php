
<?php


session_start();
@include 'config.php';





?>
<!DOCTYPE html>
<html lang="en">
<head>

<header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="../Registration n Login/Home1.php">Home</a></li>
            <li><a href="hotspot.php">Hotspot</a></li>
            <li><a href="Package.php" >Packages</a></li>
            <li><a href="#"  class="active" >Stays</a></li>
            <li><a href="../Registration n Login/Registration.php">Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>


   <link rel="stylesheet" href="style/details.css">
</head>
<body>




<div class="container">

<section class="products">

   <h1 class="heading">Stays</h1>

   <div class="content">
      <div class="description-content">
      <?php
      
      $record_IDs = $_GET['ids'];
       $record_IDs = intval($record_IDs) ;
       $_SESSION['stay']=$record_IDs;

       


      $select_products = mysqli_query($conn, "SELECT * FROM stays WHERE ST_ID = '$record_IDs' ");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="get">
         <div class="box">
        
            <h3><?php echo $fetch_product['ST_name']; ?></h3>  
               <a href="#"><img src="uploaded_img2/<?php echo $fetch_product['ST_image']; ?>"  alt="" class="floating-image left"></a>
               <p><?php echo $fetch_product['ST_description1']; ?></p><br>

               <a href="#"><img src="uploaded_img2/<?php echo $fetch_product['ST_image1']; ?>"  alt="" class="floating-image right"></a>
               <p><?php echo $fetch_product['ST_description2']; ?></p><br>

               <a href="#"><img src="uploaded_img2/<?php echo $fetch_product['ST_image2']; ?>"  alt="" class="floating-image left"></a>
               <p><?php echo $fetch_product['ST_description3']; ?></p><br>
           
            
            
            
            
            <input type="hidden" name="package_price" value="<?php echo $fetch_product['ST_price']; ?>">

          <h2>iF YOU WISH TO PLAN YOUR TRIP AROUND <?php echo $fetch_product['ST_name']; ?> , place the booking below</h2>
            <div class="pay">
            <div class="price">$<?php echo $fetch_product['ST_price']; ?>/-</div>
            <a href="booking.php?ids= <?php $_SESSION['s_i'] = $fetch_product['ST_ID']?>" class="btn">booking</a>
           
           
            </div>





         </div>
      </form>

      <?php
         }
      }
      else
      {
            echo 'no records';


      }
      ?>
      </div>
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