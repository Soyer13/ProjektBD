<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Market-Place-Peoject</title>
</head>

<body>
    <!--Wywołanie Nagłówka -->
    <?php include('header.php'); ?>
    <main>
        <div id='NaCzasie' class="scroll-container">
            <h1>Na Czasie</h1>
            <div class='slider'>
                <div class="product-container">
                    <?php
                    #Wypisanie Produktów
                    $sql  = "SELECT id, name, price FROM products WHERE if_sold = 'n'";
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

        <div id='KategorieCon' class="scroll-container">
            <h1>Kategorie</h1>
            <div class="slider">
                <div class="product-container">
                    <?php
                    #Wypisanie Kategori
                    $sql  = "SELECT id, name, image_url FROM product_categories";
                    $dane =  mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($dane)) {
                    ?>
                        <div class="Kategorie" style="background-image: url(images/<?php echo $row['image_url'] ?>) !important;
                        background-size: cover;
                        background-repeat: no-repeat;">
                                <a href="searchKat.php?Kategoria='<?php echo $row['id'] ?>'">
                                    <!--<img class="kategorie" src="images/<?php echo $row['image_url'] ?>">-->
                                    <div class="tekst">
                                        <h2><?php echo $row['name'] ?></h2>
                                    </div>
                                </a>
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
                    #Wypiosanie produktów
                    $sql  = "SELECT id, name, price FROM products WHERE if_sold = 'n'";
                    $dane =  mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($dane)) {
                    ?>
                        <div class="Produkt">
                            <h2><a href="oferta.php?id='<?php echo $row['id'] ?>'"><?php echo $row['name'] ?></a></h2>
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
    <?php include('footer.php'); ?>
    <script src="script.js"></script>
</body>

</html>