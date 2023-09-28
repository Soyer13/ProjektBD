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
    <?php include('header.php'); ?>
    <?php
    #Pobieranie ID Poroduktu
    $idP = $_GET['id'];
    require_once('connection.php');
    $sql  = "SELECT products.id,products.name,products.prod_cat_id,products.price,users.login FROM products ,users WHERE products.id =  $idP AND products.users_id = users.id";
    $dane =  mysqli_query($conn, $sql);
    ?>
    <main>
        <?php 
                if ($dane) {
                // Pobierz dane z wyniku zapytania
                $row = mysqli_fetch_assoc($dane);
                ?>
        <div id= nazwa>
            <h1>

                    <h1><?php echo  $row['name'] ;?> </h1>

        </div>
        <div id= "Oferta-Main">
        <div id="img">
            <img src="TakaPrawda.png" alt= "zdjęcie">
        </div>
        <div id="Panel-Oferty">
            <div id="Sprzedawca"><h2><?php echo "Sprzedawca : ", $row['login']; ?></h2> </div>
            <div id="Prod-info">
                <h2><?php echo  $row['name']; ?></h2>
                <br>
                <h2><?php echo  $row['price'] , "zł"; ?></h2>
            </div>
            <div id="Ilosc-info">
                <form type='Post'>
                    <h4>ILOŚĆ</h4>
                    <input type="number" name='ilosc_pr'>
                    <br>
                    <button>dodaj do koszka</button>
                    <button>Kup i zapłać</button>
                </form>
            </div>
        </div>
        
        </div>
        <div id="Opis">
            <h1>Tu Będzie Opis Jak Ktoś Doda Opis do BD</h1>
        </div>
    </main> 
      <?php             
            }
        ?>
<?php include('footer.php'); ?>
     
</body>
</html>