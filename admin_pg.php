<?php

@include 'config.php';

if(isset($_POST['add_package']))
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
        $insert = "INSERT INTO packages(P_name, P_image, P_description, P_price) VALUES('$package_name', '$package_image', '$package_description', '$package_price')";
        $upload = mysqli_query($conn,$insert);
        if($upload)
        {
            move_uploaded_file($package_image_tmp_name, $package_image_folder);
            $message[] = 'New package added successfully';
        }
        else
        {
            $message[] = 'Could not add the package';
        }
    }

};

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];
    mysqli_query($conn, "DELETE FROM packages WHERE P_ID=$id");
    header('location:admin_pg.php');
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
        <div class="admin-package-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        
            <h3>Add a new package</h3>
            <input type="text" placeholder="enter package name" name="package_name" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="package_image" class="box">
            <textarea rows="3" cols="50"  placeholder="enter package description" name="package_description" class="box"></textarea>
            <input type="number" placeholder="enter package price" name="package_price" class="box">
            <input type="submit" class="btn" name="add_package" value="add package">
            <a href="../Registration n Login/admin_navi.php" class="btn">go back</a>
        
            </form>


        </div>

           <?php
                $select = mysqli_query($conn, "SELECT * FROM packages");
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
                <td><img src="uploaded_img/<?php echo $row['P_image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['P_name']; ?></td>
                <td><?php echo $row['P_description']; ?></td>
                <td><?php echo $row['P_price']; ?></td>
                <td>
                    <a href="admin_update.php?edit=<?php echo $row['P_ID']; ?>" class="btn"> <i class="fas fa-edit"></i>edit</a>
                    <a href="admin_pg.php?delete=<?php echo $row['P_ID']; ?>" class="btn"> <i class="fas fa-trash"></i>delete</a>
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