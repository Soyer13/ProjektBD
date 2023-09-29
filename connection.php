<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "market_place";


    $conn = mysqli_connect($servername, $username, $password, $database);


    if (!$conn) {
     die("Błęde połączenie: " . mysqli_connect_error());
    }
    //echo "Połączenie udane: ";
?> 