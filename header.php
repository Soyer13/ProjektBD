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
    if(!isset($_SESSION['login']))
    {
        ?>
            <a href="logIn.php"><h2>Logowanie</h2></a>
            <a href="SingUp.php"><h2>Stwórz Konto</h2></a>
        <?php
    }
    else
    {
       ?> <h2><?php echo "Witaj " , $_SESSION['login']; ?></h2>
       <button onclick="<?php session_unset(); ?> odswiezStrone() ">Wyloguj</button>
       <?php
    }
    ?>
    
   
</header>