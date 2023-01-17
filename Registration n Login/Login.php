<?php

include 'config.php';

session_start();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE MAIL = '$email' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['MAIL'] = $row['MAIL'];
            header('location:profile.php');
    }
    else
    {
        $error[] = 'Email or Password wrong !';
    }
}



?>



<html>
<head>
    <title>LogIn</title>
    <link rel="stylesheet" href="style/Login.css">

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
            <li><a href="#" class="active">Log in / Registration</a></li>
            <li><a href="Contact.html">Contact Us</a></li>
            <li><a href="About.html">About Us</a></li>
        </ul>
        </nav>
    </header>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>
                
                <form action="" method="POST">

                <?php
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        echo '<span class="error-msg">'.$error.'</span>';
                    }
                }
                ?>

                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>    
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <ion-icon name="key-outline"></ion-icon>
                    </div>
                    <a href="#" class="text">Forget Password?</a>
                    
                    <div class="input-field button">
                        <input type="submit" name="submit" value="Log In">
                    </div>   
                    
                </form>
                
                <h5>Or</h5>
                
                
            </div>
        </div>
    </div>
    <div class="create-button">
        <a href="Registration.php">Create New Account</a>
    </div>
<br><br>

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