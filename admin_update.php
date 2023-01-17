<?php

@include 'config.php';

$id=$_GET['edit'];

if(isset($_POST['update_package']))
{
    $package_name = $_POST['package_name'];
    $package_image = $_FILES['package_image']['name'];
    $package_image_tmp_name = $_FILES['package_image']['tmp_name'];
    $package_image_folder = 'uploaded_img/'.$package_image;
    $package_description = $_POST['package_description'];
    $package_price = $_POST['package_price'];

    if(empty($package_name) || empty($package_image) || empty($package_description) || empty($package_price))
    {
        $message[] = 'Please fill out all';
    }
    else
    {
        $update = "UPDATE packages SET P_name='$package_name', P_image='$package_image', P_description='$package_description', P_price='$package_price' 
        WHERE  P_ID=$id";
        $upload = mysqli_query($conn,$update);
        if($upload)
        {
            move_uploaded_file($package_image_tmp_name, $package_image_folder);
            $message[] = 'Package updated successfully';
            
        }
        else
        {
            $message[] = 'Could not add the package';
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
            <li><a href="#">Hotspot</a></li>
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

            $select=mysqli_query($conn, "SELECT * FROM packages WHERE  P_ID=$id");
            while ($row = mysqli_fetch_assoc($select))
            {


        ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        
            <h3>Update the package</h3>
            <input type="text" placeholder="enter package name" value="<?php $row['P_name']; ?>" name="package_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="package_image" class="box">
            <textarea rows="3" cols="50"  placeholder="enter package description" value="<?php $row['P_description']; ?>" name="package_description" class="box"></textarea>
            <input type="number" placeholder="enter package price" value="<?php $row['P_price']; ?>" name="package_price" class="box">
            <input type="submit" class="btn" name="update_package" value="update package">
            <a href="admin_pg.php" class="btn">go back</a>
        
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