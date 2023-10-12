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
        <h1>Edytuj ofertę</h1>
        <form action="offersCreator.php" method="post" enctype="multipart/form-data">
            <?php
                $prod_id = $_GET['edit'];
                $sql2 = "SELECT products.id AS 'prod_id',
                                products.name AS 'prod_name',
                                price,
                                quantity,
                                products.image_url AS 'prod_img',
                                description,
                                product_categories.name AS 'cat_name',
                                product_categories.id AS 'cat_id'
                           FROM products, product_categories
                          WHERE products.id = $prod_id
                            AND if_sold = 'n'
                            AND products.prod_cat_id = product_categories.id";
                $dane2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($dane2);
            ?>
            <h2>Nazwa produktu</h2>
            <input type="text" name="name" value="<?php echo $row2['prod_name'] ?>" required>
            <h2>Kategoria</h2>
            <!--<input type="section" list="scripts" placeholder="Wybierz jedną: " size="10" name="category" required> tutaj dodać listę-->
            <select name="category">
            <?php
                $sql = "SELECT id, name FROM product_categories";
                $dane = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($dane)) {
                ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                <?php
                }
                ?>
                <option selected value="<?php echo $row2['cat_id'] ?>"><?php echo $row2['cat_name'] ?> (aktualnie)</option>
            </select>
            <h2>Cena</h2>
            <input type="number" name="price" placeholder="w PLN" min="0" value="<?php echo $row2['price'] ?>" required> zł
            <h2>Ilość sztuk</h2>
            <input type="number" name="quantity" min="1" max="1000" value="<?php echo $row2['quantity'] ?>" required>
            <h2>Opis</h2>
            <input type="text" name="description" value="<?php echo $row2['description'] ?>" required>
            <h2>Dodaj zdjęcie</h2>
            <input type="file" name="image" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Zaktualizuj ogłoszenie">
        </form>

        <?php
            //error_reporting(0);
            if(isset($_POST['submit']) && isset($_FILES['image'])) {

                echo "<pre>";
                print_r($_FILES['image']);
                echo "</pre>";

                $img_name = $_FILES['image']['name'];
                $img_size = $_FILES['image']['size'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];

                if($error === 0) {
                    if($img_size > 125000) {
                        $em = "Przepraszamy, twój plik jest za duży";
                        header("Location: index.php?error=$em");
                    } else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
            
                        $allowed_exs = array("jpg", "jpeg", "png"); 
            
                        if(in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                            $img_upload_path = 'images/prod/'.$new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                        } else {
                            $em = "Nie możesz dodawać plików o tym rozszerzeniu";
                            header("Location: index.php?error=$em");
                        }
                    }
                } else {
                    $em = "Wystąpił nieznany błąd!";
                    header("Location: index.php?error=$em");
                }

                $login_id = $_SESSION['user_id'];
                $name = $_POST['name'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $description = $_POST['description'];

                $sql5 = "UPDATE `products` 
                           SET `name` = '$name', `prod_cat_id` = '$category', `price` = '$price', `quantity` = '$quantity', `description` = '$description', `image_url` = '$new_img_name'
                         WHERE `id` = '$prod_id'";
                mysqli_query($conn, $sql5);
                //$row = mysqli_fetch_assoc($dane)
            } 
        ?>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>