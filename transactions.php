<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Transakcja</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <h2>Zawartość koszyka</h2>
        <?php
            if(!empty($_SESSION['cart'])) {
                $total = 0;
                foreach($_SESSION['cart'] as $key => $value) {
                    echo "<div class='koszyk'>";
                    $prod_id = $value['id'];
                    $sql = "SELECT image_url FROM products WHERE id = $prod_id";
                    $dane = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($dane);
                    $image = $row['image_url'];
                    echo "<img class='product_image' src='images/prod/" . $image. "' height='100px'><br>";
                    echo $value['name'] . "<br>";
                    echo $value['price'] . " zł<br>";
                    echo "Sztuk: " . $value['quantity'] . "<br>";
                    echo "Łącznie: " . number_format($value['price'] * $value['quantity'],2) . " zł<br>";
                    $total = $total + $value['quantity'] * $value['price'];
                    echo "<br>";
                    echo "</div>";
                }
                echo "<h4>Całkowicie: " .number_format($total,2). " zł</h4>"; 
                // koszyka tu nie wypisujemy ale potem trzeba bedzie wywolac dane z koszyka zeby przeslac je do bazy
        ?>  
                <form method="POST" action="summary.php">
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <?php
                    $login_id = $_SESSION['user_id'];
                    $sql = "SELECT phone, city, address FROM users WHERE id = $login_id";
                    $dane = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($dane);
                    ?>
                    <h2>Adres dostawy</h2>
                    <h4>Miasto:</h4>
                    <input required type="text" name="city" value="<?php echo $row['city']; ?>">

                    <h4>Ulica i nr:</h4>
                    <input required type="text" name="address" value="<?php echo $row['address']; ?>">

                    <h4>Telefon:</h4>
                    <input required type="number" name="phone" min="100000000" max="999999999" value="<?php echo $row['phone']; ?>">

                    <br>

                    <h2>Metoda dostawy</h2>
                    <?php
                    $sql2 = "SELECT id, name, type, price, image_url FROM delivery_type";
                    $dane2 = mysqli_query($conn, $sql2);
                    while ($row2 = mysqli_fetch_assoc($dane2)) {
                    ?>
                        <input required type="radio" name="delivery" value="<?php echo $row2['id']?>"><?php echo $row2['name'] . " (" . $row2['price'] . " zł) - " . $row2['type'] ?><br>
                    <?php
                    }
                    ?>
                    <br><br>
                    <button type="submit" name="potwierdz" value="kup">Kup i zapłać</button>
                </form>
        <?php
            }
        ?>
        
        <br>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>