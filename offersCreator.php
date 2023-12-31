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
        <h1>Nowa Oferta</h1>
        <form action="offersCreator.php" method="post" enctype="multipart/form-data">
            <h2>Nazwa produktu</h2>
            <input type="text" name="name" required>
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
            </select>
            <h2>Cena</h2>
            <input type="number" name="price" placeholder="w PLN" min="0" required> zł
            <h2>Ilość sztuk</h2>
            <input type="number" name="quantity" min="1" max="1000" required>
            <h2>Opis</h2>
            <input type="text" name="description" required>
            <h2>Dodaj zdjęcie</h2>
            <input type="file" name="image" required>
            <br>
            <br>
            <input type="submit" name="submit" value="Dodaj ogłoszenie">
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

                $sql = "INSERT INTO `products` 
                             VALUES (NULL, '$name', '$category', '$price', '$quantity', '$description', '$new_img_name', '$login_id', 'n')";
                mysqli_query($conn, $sql);
                //$row = mysqli_fetch_assoc($dane)
            } 
        ?>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>