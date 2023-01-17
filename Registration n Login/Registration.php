<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $gndr = $_POST['gndr'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);



    $select = "SELECT * FROM users WHERE MAIL = '$mail' AND PASSWORD = '$password'";
    $results = mysqli_query($conn, $select);

    if(mysqli_num_rows($results) > 0)
    {
        $error[] = 'User already exist !';
    }

    else if($password ==$cpassword)
    {
        $sql= "INSERT INTO users (F_name, L_name, NIC, DOB, GENDER, PHONE, MAIL, PASSWORD) 
        VALUES ('$Fname', '$Lname', '$nic', '$dob', '$gndr', '$phone', '$mail', '$password')";

        $result =mysqli_query($conn, $sql);

        if(!$result)
        {
            $error[] = 'Something went wrong !';
        }
        else
        {
            $msg[] = 'Registration Successfull !';
        }

    }
    else
    {
        $error[] = 'Password not mached !';
    }
  
}

?>




<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style/Reg.css">

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
                <span class="title">Registration</span>
                
                <form action="" method="POST">

                <?php
                if(isset($error))
                {
                    foreach($error as $error)
                    {
                        echo '<span class="error-msg">'.$error.'</span>';
                    }  
                }

                
                if(isset($msg))
                {
                    foreach($msg as $msg)
                    {
                        echo '<span class="msg">'.$msg.'</span>';
                    }
                }
                ?>




                    <div class="input-field">
                        <input type="text" name="Fname" placeholder="Enter your First name" required>
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="input-field">
                        <input type="text" name="Lname" placeholder="Enter your Last name" required>
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                   
                    <div class="input-field">
                        <input type="text" name="nic" placeholder="Enter your NIC Number" required>
                        <ion-icon name="card-outline"></ion-icon>
                    </div>
                    <div class="input-field">
                        <input type="text" name="dob" placeholder="Date-Of-Birth" required>
                        <ion-icon name="calendar-outline"></ion-icon>
                    </div>
                     <div class="input-field">
                        <input type="text" name="gndr" placeholder="Gender" required>
                        <ion-icon name="transgender-outline"></ion-icon>
                    </div>
                    <div class="input-field">
                        <input type="text" name="phone" placeholder="Contact Number" required>
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                     <div class="input-field">
                        <input type="text" name="mail" placeholder="Enter your Email" required>
                        <ion-icon name="mail-open-outline"></ion-icon>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Enter your password" required>
                        <ion-icon name="key-outline"></ion-icon>
                    </div>
                    <div class="input-field">
                        <input type="password" name="cpassword" placeholder="Confirm your password" required>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    
                    <div class="input-field button">
                        <input type="submit" name="submit" value="Sign Up">
                    </div>   

                  
                    
                </form>
                <script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,window.location.href)
            }
            </script>
                <h5>Or</h5>
                <p>Have an account ? <a href="Login.php">Login here</a></p>
            </div>    
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