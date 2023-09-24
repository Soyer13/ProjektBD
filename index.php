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
    $host = "localhost";
    $user = "root";
    $pas = "";
    $db = "market_place";
    $conn = mysqli_connect($host, $user, $pas, $db);

    if ($conn->connect_error) {
        die("Problem z połączeniem");
    }

    ?>
    <header>
        <h1>SKLEP</h1>
        <form id="serchbarform" action="" method="post"><input id=serchbar type="text" placeholder="Wyszukaj"> <button id=serchbarButton>Wyszukaj</button></form>
    </header>
    <main>
        <div id='NaCzasie'>
            <h1>Na Czasie</h1>
            <div class='Produkt-Pr'>
                <?php
                $sql  = "SELECT name , price FROM products";
                $dane =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <div class="Oferta-Na-Czasie">
                        <h2><?php echo  $row['name'] ?></h2>
                        <br>
                        <h3><?php echo $row['price'], " zł" ?></h3>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div id='Kategorie'>
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
            <script src="script.js"></script>

        </div>
        </div>
        <div id='Dla-CB'>
            <h1>Dla Ciebie</h1>
            <div class='Produkt-Pr'>
                <?php
                $sql  = "SELECT name , price FROM products";
                $dane =  mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <div class="Dla-CB-Pr">
                        <h2><?php echo  $row['name'] ?></h2>
                        <br>
                        <h3><?php echo $row['price'], " zł" ?></h3>
                    </div>
                <?php
                }
                ?>
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