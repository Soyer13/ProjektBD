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
    <header>
        <h1>SKLEP</h1>
        <form id="serchbarform" action="search.php" method="GET">
        <input id="serchbar" type="text" name = "Nazwa" placeholder="Wyszukaj" required>
        <button id="serchbarButton" >Wyszukaj</button>
    </form>
    </header>
    <main>
        <?php
            $Nazwa = $_GET['Nazwa'];
            require_once('connection.php');
            $sql  = "SELECT id,name , price FROM products WHERE name LIKE '%$Nazwa%'";
                $dane =  mysqli_query($conn, $sql);
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
    <footer>
        <p>Korzystanie z serwisu oznacza akceptację regulaminu</p>
        <h2>SKLEP</h2>
    </footer>
</body>
</html>