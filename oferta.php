<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php include('header.php'); ?>

    <?php
    #Pobieranie ID Poroduktu
    $idP = $_GET['id'];

    #Pobieranie Danych produktu
    $sql  = "SELECT products.id AS 'prod_id', products.name, products.prod_cat_id, products.price, products.quantity, products.description, users.login FROM products, users WHERE products.id = $idP AND products.users_id = users.id AND products.if_sold = 'n'";
    $dane = mysqli_query($conn, $sql);
    ?>
    <main>
        <?php
        if ($dane) {
            $row = mysqli_fetch_assoc($dane);
        ?>

        <?php
            $prod_id = $row['prod_id'];
        ?>
            <div id=nazwa>
                <h1>

                    <h1><?php echo $row['name']; ?> </h1>

            </div>
            <div id="Oferta-Main">
                <div id="img">
                    <img src="TakaPrawda.png" alt="zdjęcie">
                </div>
                <div id="Panel-Oferty">
                    <div id="Sprzedawca" class="cart_div">
                        <h2><?php echo "Sprzedawca : ", $row['login']; ?></h2>
                    </div>
                    <div id="Prod-info" class="cart_div">
                        <h2><?php echo $row['name']; ?></h2>
                        <br>
                        <h2><?php echo $row['price'], "zł"; ?></h2>
                    </div>

                    <div id="Ilosc-info" class="cart_div">
                        <form method="POST" action="Cart.php?id='<?php echo $prod_id ?>'">
                            <h4>ILOŚĆ</h4>
                            <input type="number" name='quantity' value="1" placeholder="1" min="1" max="<?php echo $row['quantity']; ?>"><?php echo " z " . $row['quantity'] . " sztuk"; ?>
                            <input type="hidden" name="name" value="<?php echo $row['name'] ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
                            <br>
                            <button type="submit" name="akcja" value="dodaj">Dodaj do koszyka</button>
                            <button type="submit" name="akcja" value="kup">Kup i zapłać</button>
                        </form>
                    </div>
                </div>

            </div>
            <div id="Opis">
                <h1><?php echo $row['description']; ?></h1>
            </div>
    </main>
<?php
        }
?>
<?php include('footer.php'); ?>


<?php
// Inicjalizacja zmiennej $idp


// Jeśli formularz został przesłany (kliknięcie przycisku "Dodaj do koszyka" lub "Kup i zapłać")
#COŚ JEST NIE TAK Z DODAWANIEM DO TABLICY
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ilosc_pr = $_POST['ilosc_pr'];
    $akcja = $_POST['akcja'];

    if ($akcja == 'dodaj') {
        // Pobieranie ID Produktu
        $idP = $_GET['id'];
        echo $idP;

        // Pobierz ilość produktu z formularza
        $ilosc_pr = $_POST['ilosc_pr'];
        $_SESSION['mojaTablica'] = array($idP, $ilosc_pr);
    } elseif ($akcja == 'kup') {
        // Pobieranie ID Produktu
        $idP = $_GET['id'];
        echo $idP;

        $ilosc_pr = $_POST['ilosc_pr'];
        $_SESSION['mojaTablica'] = array($idP, $ilosc_pr);

        ?>
        <script>
            window.location.href = "Cart.php";
        </script>
        <?php
    } else {
        echo "W trakcie przesyłania formularza wystąpił nieoczekiwany błąd";
    }
} else {
    // Obsługa sytuacji, gdy formularz nie został przesłany
    // Możesz tutaj dodać odpowiednią logikę
    echo "W trakcie przesyłania formularza wystąpił nieoczekiwany błąd";
}*/
?>
</body>
</html>