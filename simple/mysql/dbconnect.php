<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbase = "mydb";
$errors = array();

// Create connection
$db = mysqli_connect($servername, $username, $password , $dbase);

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

?>