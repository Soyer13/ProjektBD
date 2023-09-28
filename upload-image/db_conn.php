<?php  
$server = "localhost";
$user = "root";
$pass = "";
$db = "test_db";

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn) {
	echo "Nie udało się połączyć z bazą danych!";
	exit();
}