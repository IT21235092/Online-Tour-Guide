<?php

@include 'config.php';

if(isset($_POST['add_stay']))
{
    $stay_name = $_POST['stay_name'];
    $stay_image = $_FILES['stay_image']['name'];
    $stay_image_tmp_name = $_FILES['stay_image']['tmp_name'];
    $stay_image_folder = 'uploaded_img2/'.$stay_image;

    $stay_image1 = $_FILES['stay_image1']['name'];
    $stay_image1_tmp_name = $_FILES['stay_image1']['tmp_name'];
    $stay_image1_folder = 'uploaded_img2/'.$stay_image1;

    $stay_image2 = $_FILES['stay_image2']['name'];
    $stay_image2_tmp_name = $_FILES['stay_image2']['tmp_name'];
    $stay_image2_folder = 'uploaded_img2/'.$stay_image2;

    $stay_description1 = $_POST['stay_description1'];
    $stay_description2 = $_POST['stay_description2'];
    $stay_description3 = $_POST['stay_description3'];
    $stay_price = $_POST['stay_price'];

    if(empty($stay_name) || empty($stay_image) || empty($stay_description1) || empty($stay_price))
    {
        $message[] = 'Please fill out all';
    }
    else
    {
        $insert = "INSERT INTO stays(ST_name, ST_image, ST_description1, ST_description2, ST_description3, ST_price, ST_image1, ST_image2) 
        VALUES('$stay_name', '$stay_image', '$stay_description1', '$stay_description2', '$stay_description3', '$stay_price', '$stay_image1', '$stay_image2')";
        $upload = mysqli_query($conn,$insert);
        if($upload)
        {
            move_uploaded_file($stay_image_tmp_name, $stay_image_folder);
            move_uploaded_file($stay_image1_tmp_name, $stay_image1_folder);
            move_uploaded_file($stay_image2_tmp_name, $stay_image2_folder);
            $message[] = 'New stay added successfully';
        }
        else
        {
            $message[] = 'Could not add the stay';
        }
    }

};

if(isset($_GET['delete']))
{
    $stid=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM stays WHERE ST_ID=$stid");
    header('location:admin_pg_stays.php');
};


?>



<!DOCTYPE html>
<html>
    <head>
    <title>Admin Page</title>

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
            <li><a href="# " class="active">Stays</a></li>
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
        <div class="admin-package-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        
            <h3>Add a new Stay</h3>
            <input type="text" placeholder="enter stay name" name="stay_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="stay_image" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="stay_image1" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="stay_image2" class="box">
            <textarea rows="3" cols="50"  placeholder="enter stay description" name="stay_description1" class="box"></textarea>
            <textarea rows="3" cols="50"  placeholder="enter stay description" name="stay_description2" class="box"></textarea>
            <textarea rows="3" cols="50"  placeholder="enter stay description" name="stay_description3" class="box"></textarea>
            <input type="number" placeholder="enter stay price" name="stay_price" class="box">
            <input type="submit" class="btn" name="add_stay" value="add stay">
            <a href="../Registration n Login/admin_navi.php" class="btn">go back</a>
        
            </form>


        </div>

           <?php
                $select = mysqli_query($conn, "SELECT * FROM stays");
           ?> 


        <div class="project-display">

        <table class="package-display-table">

        <thead>
            <tr>
                <th>Package image</th>
                <th>Package name</th>
                <th>Package description</th>
                <th>Package price</th>
                <th colspan="2">action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_assoc($select)) {?>

            <tr>
                <td><img src="uploaded_img2/<?php echo $row['ST_image']; ?>" height="100" alt=""></td>
               <!-- <td><img src="uploaded_img1/<?php echo $row['ST_image1']; ?>" height="100" alt=""></td>
                <td><img src="uploaded_img1/<?php echo $row['ST_image2']; ?>" height="100" alt=""></td> -->
                <td><?php echo $row['ST_name']; ?></td>
                <td><?php echo $row['ST_description1']."".$row['ST_description2']."".$row['ST_description3']; ?></td>
                <td><?php echo $row['ST_price']; ?></td>
                <td>
                    <a href="admin_update_stays.php?edit=<?php echo $row['ST_ID']; ?>" class="btn"> <i class="fas fa-edit"></i>edit</a>
                    <a href="admin_pg_stays.php?delete=<?php echo $row['ST_ID']; ?>" class="btn"> <i class="fas fa-trash"></i>delete</a>
                </td>
            </tr>

        <?php  }  ?>

        <script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,window.location.href)
            }
            </script>

        </table>

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