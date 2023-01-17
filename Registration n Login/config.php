<?php
$server = "localhost";
$username = "root";
$password ="";
$database = "package";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn)
{
    $message[] = 'Connection failed';
}


?>