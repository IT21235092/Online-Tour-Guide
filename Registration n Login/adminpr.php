<?php

include 'config.php';
session_start();
$user_id = $_SESSION['MAIL'];

if(!isset($user_id))
{
    header('location:Login.php');
};

if(isset($_GET['logout']))
{
    unset($user_id);
    session_destroy();
    header('location:Login.php');
}


?>





<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="style/pr.css.css">



    </head>
   


    <body>

    <header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="Home1.php">Home</a></li>
            <li><a href="../Admin/hotspot.php">Hotspot</a></li>
            <li><a href="../Admin/Package.php">Packages</a></li>
            <li><a href="../Admin/stays.php" >Stays</a></li>
            <li><a href="admin_login.php">Log in / Registration</a></li>
            <li><a href="Contact.html">Contact Us</a></li>
            <li><a href="About.html">About Us</a></li>
        </ul>
        </nav>
    </header>

    <div class="container">
        <div class="profile">
       
            <?php
                $select = mysqli_query($conn, "SELECT * FROM staff WHERE MAIL = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0)
                {
                    $fetch = mysqli_fetch_assoc($select);
                }
              
                    echo '<img src="avatar.png">';
              

            ?>

            <h3> <span class="title">Admin</span><br><?php echo $fetch['F_name']; ?> <?php echo $fetch['L_name']; ?></h3>

            <br>
            <br>
            <br>
         

            <a href="adpinpr_update.php" class="btn">update profile</a>
            <a href="profile.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
            <br>
          
            <br>
            <a href="admin_edit.php" class="btn">Create room</a>
            
        </div>
    </div>
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