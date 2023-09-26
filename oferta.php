<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body>
<header>
        <h1>SKLEP</h1>
        <form id="serchbarform" action="search.php" method="GET">
        <input id="serchbar" type="text" name = "Nazwa" placeholder="Wyszukaj">
        <button id="serchbarButton" >Wyszukaj</button>
    </form>
    </header>
    <?php
    #Pobieranie ID Poroduktu
    $idP = $_GET['id'];
    require_once('connection.php');
    $sql  = "SELECT products.id,products.name,products.prod_cat_id,products.price,users.login FROM products ,users WHERE products.id =  $idP AND products.users_id = users.id";
    $dane =  mysqli_query($conn, $sql);
    ?>
    <main>
        <div>
            <h1>
                <?php 
                if ($dane) {
                // Pobierz dane z wyniku zapytania
                $row = mysqli_fetch_assoc($dane);

                // Wyświetl dane
                if ($row) {
                    echo "ID Produktu: " . $row['id'] . "<br>";
                    echo "Nazwa: " . $row['name'] . "<br>";
                    echo "ID Kategorii Produktu: " . $row['prod_cat_id'] . "<br>";
                    echo "Cena: " . $row['price'] . "<br>";
                    echo "Login użytkownika: " . $row['login'] . "<br>";
                } else {
                    echo "Brak wyników.";
                }
            }
?></h1>
        </div>
    </main>
<footer>
        <p>Korzystanie z serwisu oznacza akceptację regulaminu</p>
        <h2>SKLEP</h2>
    </footer>
     
</body>
</html>