<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Zapisz Sie!</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <h1>Zarejestruj</h1>
        <form action="SingUp.php" method="post">
            <h2>Imie</h2>
            <input type="text" name="first-name" required>
            <h2>Nazwisko</h2>
            <input type="text" name="last-name" required>
            <h2>E-mail</h2>
            <input type="text" name="email" required>
            <h2>Login</h2>
            <input type="text" name="login" required>
            <h2>Hasło</h2>
            <input type="password" name="pass" required>
            <h1>Informacje Dodatkowe</h1>
            <h2>Telefon</h2>
            <input type="number" name="phone">
            <h2>Miasto</h2>
            <input type="text" name="city">
            <h2>Adress</h2>
            <input type="text" name="address">
            <br>
            <input type="submit" value="Stwórz Konto">
        </form>
        <?php
        #wyłączenie wrningów 
        error_reporting(E_ERROR | E_PARSE);
        #Przejecie Wpisu Użytkownika 
        $Name = $_POST["first-name"];
        $LastName = $_POST['last-name'];
        $Email = $_POST['email'];
        $Login = $_POST['login'];
        $Pass = $_POST['pass'];
        $Tel = $_POST['phone'];
        $City = $_POST['city'];
        $Adr = $_POST['address'];
        #Sprawdzenie czy login jest pusty
        #Sprawdzenie czy w badzie danych jest taki użytkownik
        $sql = "SELECT login
        FROM users 
        WHERE login = '$Login'";
        $dane2 =  mysqli_query($conn, $sql);
        if ($dane2->num_rows > 0) {
            ?>
            <h2>Użytkownik o tej nazwie już istnieje</h2>
            <?php
        } else {
            #Zapis Użytkownika
            $sql = "INSERT INTO users (id, last_name, first_name, phone, email, login, password, city, address, image_url) 
        VALUES (NULL, '$LastName', '$Name', '$Tel', '$Email', '$Login', '$Pass', '$City', '$Adr', '')";
            if (!empty($Login)) {
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['login'] = $Login;
                    $sql = "SELECT id FROM users WHERE login = '$Login' AND password = '$Pass'";
                    $dane =  mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($dane);
                    $_SESSION['user_id'] = $row['id'];
        ?>
                    <script>
                        alert("Stworzono Użytkownika");
                        window.location.href = "index.php";
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("Błąd");
                    </script>
        <?php

                }
            }
        }




        ?>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>