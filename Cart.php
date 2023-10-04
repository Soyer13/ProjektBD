<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Koszyk</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <h2>Zawartość koszyka</h2>
        <?php
            if(isset($_POST['akcja'])) {
                //print_r($_POST['prod_id']);

                if(isset($_SESSION['cart'])) {

                    $session_array_id = array_column($_SESSION['cart'], "id");

                    if(!in_array($_GET['id'], $session_array_id)) {
                        $session_array = array(
                            'id' => $_GET['id'],
                            "name" => $_POST['name'],
                            "price" => $_POST['price'],
                            "quantity" => $_POST['quantity']
                        );
    
                        $_SESSION['cart'][] = $session_array;
                    } else {
                        echo "<script>alert('Ten produkt już znajduje się w koszyku!')</script>";
                    }
                    
                } else {
                    $session_array = array(
                        'id' => $_GET['id'],
                        "name" => $_POST['name'],
                        "price" => $_POST['price'],
                        "quantity" => $_POST['quantity']
                    );

                    $_SESSION['cart'][] = $session_array;
                }

            } else {
                //echo "Wystąpił błąd";
            }

            $total = 0;

            $output = "";

            $output .= "
                <table class='table-output'>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Całkowita cena</th>
                        <th>Operacje</th>
                    </tr>
            ";

            if(!empty($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $key => $value) {
                    $output .= "
                        <tr>
                            <td>" .$value['id']. "</td>
                            <td>" .$value['name']. "</td>
                            <td>" .$value['price']. "</td>
                            <td>" .$value['quantity']. "</td>
                            <td>" .number_format($value['price'] * $value['quantity'],2). "</td>
                            <td>
                                <a href='Cart.php?action=remove&id=".$value['id']."'>
                                    <button class='button-remove'>Usuń</button>
                                </a>
                            </td>
                        </tr>
                    ";

                    $total = $total + $value['quantity'] * $value['price'];
                }

                $output .= "
                <tr>
                    <td colspan='3'></td>
                    <td>Łącznie</td>
                    <td>" .number_format($total,2). "</td>
                    <td>
                        <a href='Cart.php?action=clearall'>
                            <button class='button-clear'>Wyczyść</button>
                        </a>
                    </td>
                </tr>
                ";
            }

            echo $output;
            ?>
                <button id='potwierdz' type='submit' name='potwierdz' value='potwierdz'>Potwierdź zamówienie</button>
            <?php

            if(isset($_GET['action'])) {

                if($_GET['action'] == "clearall") {
                    unset($_SESSION['cart']);
                }
                
                if($_GET['action'] == "remove") {
                    foreach($_SESSION['cart'] as $key => $value) {
                        if($value['id'] == $_GET['id']) {
                            unset($_SESSION['cart'][$key]);
                        }
                    }
                }
            }

            //var_dump($_SESSION['cart']);
            //session_destroy();
        ?>
        <br>
    </main>
    <?php //include('footer.php'); ?>
</body>

</html>