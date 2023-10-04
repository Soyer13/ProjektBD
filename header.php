<?php
    session_start();
    require_once('connection.php');
?>
<script>
        function odswiezStrone() {
            // Odśwież stronę
            location.reload();
        }
    </script>
<header>
 
    <a href='index.php'>
        <h1>SKLEP</h1>
    </a>

    <form id="serchbarform" action="search.php" method="GET">
        <input id="serchbar" type="text" name="Nazwa" placeholder="Wyszukaj" required>
        <button id="serchbarButton">Wyszukaj</button>
    </form>
    <?php
    #Sprawdzenie czy użytkownik jest zalogowany 
    if(!isset($_SESSION['login']))
    {
        ?>

            <a href="logIn.php"><h2>Logowanie</h2></a>
            <a href="SingUp.php"><h2>Stwórz Konto</h2></a>
            <a href="Cart.php"><h2>Koszyk</h2></a>

        <?php
    }
    else
    {
       ?> <a href="account.php"><h2><?php echo "Witaj " , $_SESSION['login']; ?></h2></a>

<form method="get" action="logout.php">
    <button>Wyloguj</button>
</form>
        
       <?php
    }
    ?>
    
    
</header>