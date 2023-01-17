<!DOCTYPE html>
<html>
<head>
	<title>Search Bar </title>
    <link rel="stylesheet" href="style/search.css">
</head>
<body>

<form method="post">
<label>Search</label>
<div class="search">
<input type="text" name="search">
</div>
<div class="btn">
<input type="submit" name="submit">
</div>	
</form>
<script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,window.location.href)
            }
            </script>
</body>
</html>

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
		
			<tr><div class="result">
				<a href="hotspot.php"><?php echo $row->H_name; ?></a>
				</div>
			</tr>
           
		</table>
<?php 

	}
		
		
		else{
			echo "Name Does not exist";
		}


}
?>
