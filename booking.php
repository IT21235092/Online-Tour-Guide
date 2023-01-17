
<?php


session_start();
@include 'config.php';

    




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

     

.box  p {display: block;
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

  </style>

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


   <link rel="stylesheet" href="style/details.css">
</head>
<body>




<div class="container">

<section class="products">

   <h1 class="heading">Booking</h1>

   <div class="content">
      <div class="description-content">

     
      <?php
      
      
      $record_ID = $_SESSION['hotspot'];
       $record_ID = intval($record_ID) ;

       $record_IDs = $_SESSION['stay'];
 
       $record_IDs = intval($record_IDs) ;

      
    

      $select_products = mysqli_query($conn, "SELECT * FROM hotspots WHERE H_ID = '$record_ID' ");

      $select_products1 = mysqli_query($conn, "SELECT * FROM stays WHERE ST_ID = '$record_IDs' ");
      if(mysqli_num_rows($select_products) > 0 ){
         while($fetch_product = mysqli_fetch_assoc($select_products) ){
              $H_name=$fetch_product['H_name'];
              $H_price=$fetch_product['H_price'];



            
        }
    }
    else
    {
        $H_name='';
        $H_price=0;
        $ST_name='';
        $ST_price=0;
    }
    if(mysqli_num_rows($select_products1) > 0 ){
        while($fetch_product = mysqli_fetch_assoc($select_products1) ){

            $ST_name=$fetch_product['ST_name'];
            $ST_price=$fetch_product['ST_price'];



         }
        }
        else
        {
            $ST_name='';
            $ST_price=0;
        }
    
              ?>

   <form action="booking.php" method="post">
         <div class="box">
         <h3>select hotspots : <a href="hotspot.php">Here</a></h3>
            <h3>Hotspot : <?php echo $H_name; ?></h3>  
             
            <div class="pay">
            <div class="price">LKR <?php echo $H_price; ?>/-</div>
            <h3>select stays : <a href="stays.php">Here</a></h3>
            <h3>Stay : <?php echo $ST_name; ?></h3>  
            
             <div class="pay">
             <div class="price">LKR <?php echo $ST_price; ?>/-</div>
            <h2>Sub total : </h2>  <?php $sub = $ST_price + $H_price; ?>
             <h3>LKR <?php echo $sub?>/-</h3>
             
             <input type="submit" class="btn" name = "submityou"  value="Confirm"> 
             <br>
             <br>
             <input type="submit" class="btn" name = "submit" value="clear"> 
            <p> <a href="check1.php">Proceed</a></p>

           
            

         </div>
      </form> 

      
     

      <?php
      
    if(isset($_POST['submit']))
       {
        //session_destroy();
        $_SESSION['hotspot'] = 0;
        $_SESSION['stay'] = 0;
      
       }
        
      if(isset($_POST['submityou']))
        {
         
            $sql= "INSERT INTO oorder VALUES ('','$H_name', '$ST_name', '$sub')";

              $result =mysqli_query( mysqli_connect('localhost','root','','package'), $sql);
            

        }
            
      
      
        ?>

   
<script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,window.location.href)
            }
            </script>


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