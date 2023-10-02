<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <title>Konto Użytkownika</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <h1>Konto użytkownika <?php echo $_SESSION['login'];?></h1>

        <a href="offersCreator.php"><h2>Nowa Oferta</h2></a>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>