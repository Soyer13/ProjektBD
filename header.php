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
<<<<<<< HEAD
            <a href="logowanie.php"><h2>Logowanie</h2></a>
=======
            <a href="logIn.php"><h2>Logowanie</h2></a>
            <a href="SingUp.php"><h2>Stwórz Konto</h2></a>
>>>>>>> 0204c8cce56807ab0ba5821554d4bb78f0201f70
        <?php
    }
    else
    {
       ?> <h2><?php echo "Witaj " , $_SESSION['login']; ?></h2>
<<<<<<< HEAD
=======
        <h2><?php echo "Witaj " , $_SESSION['user_id']?></h2>
       
>>>>>>> 0204c8cce56807ab0ba5821554d4bb78f0201f70
       <button onclick="<?php session_unset(); ?> odswiezStrone() ">Wyloguj</button>
       <?php
    }
    ?>
    
   
</header>