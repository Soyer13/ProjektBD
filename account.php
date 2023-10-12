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
    <?php include('header.php'); ?>
    <main>
        <div>
            <h1>Konto użytkownika <?php echo $_SESSION['login'];?></h1>
        </div>
        <div>
            <?php
            #Wypisanie Informacji Użytkownika
            $login = $_SESSION["login"];
             $sql = "SELECT * FROM users WHERE login = '$login' ";
             $dane =  mysqli_query($conn, $sql);
             if ($dane->num_rows > 0) {
                 echo "Dane";
                 $row = mysqli_fetch_assoc($dane);
                ?>
                <h3>Imie</h3>
                <?php
                 echo $row["first_name"];
                 ?>
                 <h3>Nazwisko</h3>
                 <?php
                 echo $row["last_name"];
                 ?>
                 <h3>E-mail</h3>
                 <?php
                 echo $row["email"];
                 ?>
                 <h3>Telefon</h3>
                 <?php
                 echo $row["phone"];
                 
                }
            else
            {
                echo "Błąd Bazy Danych";
            }
            ?>
                 
        </div>

        <a href="offersCreator.php"><h2>Nowa Oferta</h2></a>
        <a href="offersManager.php"><h2>Zarządzaj ofertami</h2></a>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>