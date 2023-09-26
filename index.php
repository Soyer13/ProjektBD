<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">

    <title>Market-Place-Peoject</title>
</head>

<body>
    <?php

    require_once('connection.php');
    ?>
    <header>
        <h1><a herf='index.php'>SKLEP</a></h1>
    <form id="serchbarform" action="search.php" method="GET">
        <input id="serchbar" type="text" name = "Nazwa" placeholder="Wyszukaj">
        <button id="serchbarButton" >Wyszukaj</button>
    </form>
    </header>
    <main>
        <div id='NaCzasie' class="scroll-container">
            <h1>Na Czasie</h1>
            <div class='slider'>
                <div class="product-container">
                <?php
                $sql  = "SELECT id,name , price FROM products";
                $dane =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <div class="Oferta-Na-Czasie">
                        <h2><a href="oferta.php?id='<?php echo $row['id'] ?>'"><?php echo  $row['name'] ?></a></h2>
                        <br>
                        <h3><?php echo $row['price'], " zł" ?></h3>
                    </div>
                <?php
                }
                ?>
                </div>
                <button class="prev-button">&#9664;</button>
                <button class="next-button">&#9654;</button>
            </div>
            
        </div>

        <div id='Kategorie' class="scroll-container">
                <h1>Kategorie</h1>
            <div class="slider">
                <div class="product-container">
                    <?php
                    $sql  = "SELECT name FROM product_categories";
                    $dane =  mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($dane)) {
                    ?>
                        <div class="Kategorie">
                            <h2><?php echo  $row['name'] ?></h2>

                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button class="prev-button">&#9664;</button>
                <button class="next-button">&#9654;</button>
            </div>
            

        </div>
        </div>
        <div id='Dla-CB' class="scroll-container">
            <h1>Dla Ciebie</h1>
            <div class='slider'>
            <div class="product-container">
                <?php
                $sql  = "SELECT name , price FROM products";
                $dane =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <div class="Produkt">
                        <h2><?php echo  $row['name'] ?></h2>
                        <br>
                        <h3><?php echo $row['price'], " zł" ?></h3>
                    </div>
                <?php
                }
                ?>
                </div>
                <button class="prev-button">&#9664;</button>
                <button class="next-button">&#9654;</button>
            </div>

        </div>
        

    </main>
    <footer>
        <p>Korzystanie z serwisu oznacza akceptację regulaminu</p>
        <h2>SKLEP</h2>
    </footer>
    <script src="script.js"></script>
</body>

</html>