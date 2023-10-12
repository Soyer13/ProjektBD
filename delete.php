<?php
    include('header.php');

    $prod_id = $_GET['delete'];
    $sql5 = "UPDATE `products` 
                SET `if_sold` = 'y'
              WHERE `id` = '$prod_id'";
    mysqli_query($conn, $sql5);
    header("Location: account.php");

    include('footer.php');
?>