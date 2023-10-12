<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Podsumowanie</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <h2>Zawartość koszyka</h2>
        
        <?php
            if(isset($_POST['potwierdz'])) {
                $login_id = $_SESSION['user_id'];
                $delivery = $_POST['delivery'];
                $total_price = $_POST['total'];
                $phone = $_POST['phone'];
                $city = $_POST['city'];
                $address = $_POST['address'];
            
                $sql = "INSERT INTO transactions 
                                VALUES (NULL, '$login_id', '', '$delivery', '$total_price', '$phone', '$city', '$address')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Transakcja przebiegła pomyślnie!')</script>";
                    $sql3 = "SELECT id FROM transactions ORDER BY id DESC LIMIT 1";
                    $dane3 = mysqli_query($conn, $sql3);
                    $row3 = mysqli_fetch_assoc($dane3);
                    $latest_id = $row3['id'];
            
                    $item = 1;
                    foreach($_SESSION['cart'] as $key => $value) {
                        $quantity = $value['quantity'];
                        $price = $value['price'];
                        $product = $value['id'];
                        //$product_int = (int)$product;

                        $product_int = filter_var($product, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_ALLOW_FRACTION);

                        $sql = "INSERT INTO `order` (`transaction_id`, `item_id`, `product_id`, `price`, `quantity`) 
                                     VALUES ('$latest_id', '$item', '$product_int', '$price', '$quantity')";
                        mysqli_query($conn, $sql);
                        $item = $item + 1;
                    }

                        $sql = "SELECT email FROM users WHERE id = '$login_id'";
                        $dane = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($dane);
                    ?>
                        <h1>Dziękujemy za zakup...<br>... i zapraszamy ponownie!</h1>
                        <h2>Szczegóły transakcji znajdziesz na swoim e-mailu <b><?php echo $row['email']; ?></b></h2>
                    <?php
                } else {
                    echo "Wystąpił błąd: " . $sql . "<br>" . $conn->error;
                }
            }
        ?>
        
        <br>
    </main>
    <?php 
        include('footer.php'); 
        session_destroy();
    ?>
</body>

</html>