<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" href="style/Home.css">

</head>
<body>
    <header>
        <a href="#" class="logo">Let's Go</a>
        <nav>
        <ul>
            <li><a href="#" class="active">Home</a></li>
            <li><a href="Login.php">Hotspot</a></li>
            <li><a href="Login.php">Packages</a></li>
            <li><a href="#">Log in / Registration</a>
                <ul>
                    <li><a href="admin_login.php">Staff Login</a></li>
                    <li><a href="Login.php">User Login</a></li>
                </ul>
            </li>
            <li><a href="Login.php">Contact Us</a></li>
            <li><a href="Login.php">About Us</a></li>
        </ul>
            
        </nav>
    </header>
    
    <section>
            
    <div class="container">
        <video autoplay muted loop autoplay class="backv">
            <source src="videoplayback_1.mp4" type="video/mp4">
        </video>
            <div class="overlay"></div>
    </div>
    <h2 id="text">Get inspiration for your next trip</h2>    
    
    
    <form method="post">
        <label></label>
        <div class="sbox">
        <input type="text" class="search-txt" name="search" placeholder="Search">
        <input type="submit" name="submit" >
        <ion-icon name="search-outline"></ion-icon>
        </div>	
        </form>
        <script>
                if(window.history.replaceState)
                {
                    window.history.replaceState(null,null,window.location.href)
                }
                </script>

<?php

$con = new PDO("mysql:host=localhost;dbname=package",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM hotspots WHERE H_name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
                
			    <tr>
                    <div class="rcontent">
                        <div class="header2">
                            <h2>Search result</h2>
                        </div>  <br>  
                            <div class="result">
                            <a href="../Admin/hotspot.php"><?php echo $row->H_name; ?></a>
                            </div>
                    </div>
			</tr>
           
		</table>
<?php 

	}
		
	


}
?>

    </section>
    <br><br>
    <h2 id="ctext">Explore Sri Lanka</h2><br><br><br><br>
    <div class="col">
        <div class="card card1">
        <h5>Sigiriya</h5>
        <p>Central Province</p>
        </div>
        
        <div class="card card2">
        <h5>Temple of the tooth</h5>
        <p>Central Province</p>
        </div>
        
        <div class="card card3">
        <h5>Sri padha/Adam's peak</h5>
        <p>Sabaragamuwa Province</p>
        </div>
        
        <div class="card card4">
        <h5>Galle dutch fort</h5>
        <p>Southern Province</p>
        </div>
        
        <div class="card card5">
        <h5>Ella</h5>
        <p>Uva Province</p>
        </div>
        
        <div class="card card6">
        <h5>Hikkaduwa</h5>
        <p>Sothern Province</p>
        </div>
    
    </div>

    <div class="container2">
        <div class="box">
        <div class="row">
            <div class="col">
            <h1>Travel's Best Choice Packages</h1>
            </div>
            <div class="pcard pcard1"></div>
            <div class="pcard pcard2"></div>
            <div class="pcard pcard3"></div>
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