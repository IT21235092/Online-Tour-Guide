<?php

@include 'config.php';

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM wushlist WHERE W_ID = $id");
    header('location:wishlist.php');
};


?>
<!DOCTYPE html>
<html>
    <head>
    <title>wish list</title>

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
            <li><a href="Package.php">Packages</a></li>
            <li><a href="stays.php" >Stays</a></li>
            <li><a href="../Registration n Login/Login.php" >Log in / Registration</a></li>
            <li><a href="../Registration n Login/Contact.html">Contact Us</a></li>
            <li><a href="../Registration n Login/About.html">About Us</a></li>
        </ul>
        </nav>
    </header>

    
    

    <div class="container">
        <div class="admin-package-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
        
            <h3>Wish List</h3>
           
        
            </form>


        </div>

           <?php
                $select = mysqli_query($conn, "SELECT * FROM wushlist");
           ?> 


        <div class="project-display">

        <table class="package-display-table">

        <thead>
            <tr>
                <th>Package image</th>
                <th>Package name</th>
               
                <th>Package price</th>
                <th colspan="1">action</th>
            </tr>
        </thead>

        <?php while($row = mysqli_fetch_assoc($select)) {?>

            <tr>
                <td><img src="uploaded_img/<?php echo $row['W_image']; ?>" height="100" alt=""></td>
                <td><?php echo $row['W_name']; ?></td>
                
                <td><?php echo $row['W_price']; ?></td>
                <td>
                    
                <a href="wishlist.php?delete=<?php echo $row['W_ID']; ?>" class="btn"> <i class="fas fa-trash"></i>delete</a>
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