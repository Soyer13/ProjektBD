<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Logowanie</title>
</head>
<body>
<?php include('header.php'); ?>
<main>
    <!-- Formularz logowania -->
    <div id = "LogForm">
        <h1>Zaloguj</h1>
        <form action="LogIn.php" method="post" >
            <h2>Login</h2><br>
            <input type="text" name="login" required>
            <h2>Hasło</h2><br>
            <input type="password" name="Haslo">
            <br>
            <input type="submit" value="Zaloguj">
        </form>
        <p>Nie masz jeszcze konta? <a href="SingUp.php">Zarejestruj się!</a></p>
    </div>

    <?php
        #wyłączenie wrningów 
        error_reporting(E_ERROR | E_PARSE);
        #Przejecie Wpisu Użytkownika 
        $login = $_POST["login"];
        $pass = $_POST['Haslo'];
        #Sprawdzenie czy login jest pusty
        if(!empty($login))
        {
        #Sprawdzenie czy w badzie danych jest taki użytkownik
        $sql = "SELECT id FROM users WHERE login = '$login' AND password = '$pass'";
        $dane =  mysqli_query($conn, $sql);
        if ($dane->num_rows > 0) {
            echo "Zalogowano pomyślnie"; 
            $row = mysqli_fetch_assoc($dane);
            #Przypisanie Loginu do sesji
            $_SESSION['login'] = $login;
            $_SESSION['user_id'] = $row['id'];

            ?>
            <script>
                
                alert("Zalogowano Użytkownika" );
                window.location.href = "index.php";
            </script>

            <?php

        } else {
            echo "Błąd logowania. Nieprawidłowy login lub hasło."; 
        } 
        }
        
        
    ?>
</main>
<?php include('footer.php'); ?>
</body>
</html>