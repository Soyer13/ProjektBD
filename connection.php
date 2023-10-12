<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "market_place1";


    $conn = mysqli_connect($servername, $username, $password, $database);


    if (!$conn) {
     die("Błędne połączenie: " . mysqli_connect_error());
    }
    //echo "Połączenie udane: ";
?> 