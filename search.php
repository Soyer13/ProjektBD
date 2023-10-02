<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <?php
            $Nazwa = $_GET['Nazwa'];
            #Wyszukanie produktów gdzie nazwa jest zbliżona do tego czego wpisał użytkownik
            $sql  = "SELECT id,name , price FROM products WHERE name LIKE '%$Nazwa%'";
                $dane =  mysqli_query($conn, $sql);
                #Wypisanie Ofert
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <div class="Oferta-Wyszukanie">
                        <h2><a href="oferta.php?id='<?php echo $row['id'] ?>'"><?php echo  $row['name'] ?></a></h2>
                        <br>
                        <h3><?php echo $row['price'], " zł" ?></h3>
                    </div>
                    <?php }
                
        ?>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>