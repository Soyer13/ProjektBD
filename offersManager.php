<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Konto Użytkownika</title>

</head>

<body>
    <!-- tu powstanie kreator ofert -->
    <?php include('header.php'); ?>
    <main>
        <table border="1px solid black" padding="0px">
            <tr>
                <th>OBRAZEK</th>
                <th>NAZWA PRODUKTU</th>
                <th>KATEGORIA</th>
                <th>CENA</th>
                <th>ILOŚĆ</th>
                <th>OPERACJE</th>
            </tr>
            <?php 
        $login_id = $_SESSION['user_id'];
        $sql = "SELECT products.id AS 'prod_id',
                       products.name AS 'prod_name',
                       price,
                       quantity,
                       products.image_url AS 'prod_img',
                       product_categories.name AS 'cat_name'
                  FROM products, product_categories
                 WHERE users_id = $login_id 
                   AND if_sold = 'n'
                   AND products.prod_cat_id = product_categories.id";
        $dane = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($dane)) {
            ?>
            <tr>
                <td><img height="50px;" src="images/prod/<?php echo $row['prod_img']; ?>" alt="<?php echo $row['prod_img']; ?>"></td>
                <td><?php echo $row['prod_name']; ?></td>
                <td><?php echo $row['cat_name']; ?></td>
                <td><?php echo $row['price']; ?> zł</td>
                <td><?php echo $row['quantity']; ?></td>
                <td><a href="edit.php?edit=<?php echo $row['prod_id']; ?>">Edytuj</a>, <a href="delete.php?delete=<?php echo $row['prod_id']; ?>">Usuń</a></td>     
            </tr>
            <?php
        }
        ?>
        </table>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>