<?php

@include 'config.php';

$hid=$_GET['edit'];

if(isset($_POST['update_hotspot']))
{
    $hotspot_name = $_POST['hotspot_name'];
    $hotspot_image = $_FILES['hotspot_image']['name'];
    $hotspot_image_tmp_name = $_FILES['hotspot_image']['tmp_name'];
    $hotspot_image_folder = 'uploaded_img1/'.$hotspot_image;

    $hotspot_image1 = $_FILES['hotspot_image1']['name'];
    $hotspot_image1_tmp_name = $_FILES['hotspot_image1']['tmp_name'];
    $hotspot_image1_folder = 'uploaded_img1/'.$hotspot_image1;

    $hotspot_image2 = $_FILES['hotspot_image2']['name'];
    $hotspot_image2_tmp_name = $_FILES['hotspot_image2']['tmp_name'];
    $hotspot_image2_folder = 'uploaded_img1/'.$hotspot_image2;

    $hotspot_description1 = $_POST['hotspot_description1'];
    $hotspot_description2 = $_POST['hotspot_description2'];
    $hotspot_description3 = $_POST['hotspot_description3'];
    $hotspot_price = $_POST['hotspot_price'];
    if(empty($hotspot_name) || empty($hotspot_image) || empty($hotspot_description1) || empty($hotspot_price))
    {
        $message[] = 'Please fill out all';
    }
    else
    {
        $update = "UPDATE hotspots 
        SET H_name='$hotspot_name', H_image='$hotspot_image', H_description1='$hotspot_description1', H_description2='$hotspot_description2', H_description3='$hotspot_description3', H_price='$hotspot_price', H_image1='$hotspot_image2', H_image2='$hotspot_image1'
        WHERE  H_ID=$hid";
        $upload = mysqli_query($conn,$update);
        if($upload)
        {
            move_uploaded_file($hotspot_image_tmp_name, $hotspot_image_folder);
            move_uploaded_file($hotspot_image1_tmp_name, $hotspot_image1_folder);
            move_uploaded_file($hotspot_image2_tmp_name, $hotspot_image2_folder);
            $message[] = 'Hotspot updated successfully';
            
        }
        else
        {
            $message[] = 'Could not add the hotspot';
        }
    }

};



?>








<!DOCTYPE html>
<html>
    <head>
    <title>Admin update</title>

    <!--custom style sheet-->

    <link rel="stylesheet" href="style/styles.css">
    </head>

    <body>

    <header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="../Registration n Login/Home1.php" >Home</a></li>
            <li><a href="hotspot.php">Hotspot</a></li>
            <li><a href="#">Packages</a></li>
            <li><a href="#" >Stays</a></li>
            <li><a href="#">Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>

    <?php
        if(isset($message))
        {
            foreach($message as $message)
            {
                echo '<span class="message">'. $message .'</span>';
            }
        }


    ?>

<div class="container">
        <div class="admin-package-form-container centered">

        <?php

            $select=mysqli_query($conn, "SELECT * FROM hotspots WHERE  H_ID=$hid");
            while ($row = mysqli_fetch_assoc($select))
            {


        ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        
            <h3>Update the hotspot</h3>
            <input type="text" placeholder="enter hotspot name" value="<?php $row['H_name']; ?>" name="hotspot_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="hotspot_image" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="hotspot_image1" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="hotspot_image2" class="box">
            <textarea rows="3" cols="50"  placeholder="enter hotspot description" value="<?php $row['H_description1']; ?>" name="hotspot_description1" class="box"></textarea>
            <textarea rows="3" cols="50"  placeholder="enter hotspot description" value="<?php $row['H_description2']; ?>" name="hotspot_description2" class="box"></textarea>
            <textarea rows="3" cols="50"  placeholder="enter hotspot description" value="<?php $row['H_description3']; ?>" name="hotspot_description3" class="box"></textarea>
            <input type="number" placeholder="enter hotspot price" value="<?php $row['H_price']; ?>" name="hotspot_price" class="box">
            <input type="submit" class="btn" name="update_hotspot" value="update hotspot">
            <a href="admin_pg_h.php" class="btn">go back</a>
        
            </form>
            
            <?php }; ?>

        </div>
        
        </div>







    </body>
    
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
</html> 