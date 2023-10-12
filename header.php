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
<style>
    header {
        display: flex;
        align-items: center;
    }

    .head {
        margin-left: 30px;
        width: auto;
    }

    .green {
        color: white;
    }

    .red {
        color: black;
    }

</style>
<header>
 
    <a href='index.php'>
        <h1 class="green">SKLEP</h1>
    </a>

    <form id="serchbarform" action="search.php" method="GET">
        <input id="serchbar" type="text" name="Nazwa" placeholder="    Wyszukaj" required>
        <button id="serchbarButton">Wyszukaj</button>
    </form>
    <?php
    #Sprawdzenie czy użytkownik jest zalogowany 
    if(!isset($_SESSION['login']))
    {
        ?>

            <div class="head"><a href="logIn.php"><h2 class="red">Logowanie</h2></a></div>
            <div class="head"><a href="SingUp.php"><h2 class="red">Stwórz Konto</h2></a></div>
            <div class="head"><a href="Cart.php"><h2 class="red">Koszyk</h2></a></div>

        <?php
    }
    else
    {
       ?> 
        <div class="head"><a href="account.php"><h2><?php echo "Witaj " , $_SESSION['login']; ?></h2></a></div>
        <div class="head"><a href="Cart.php"><h2>Koszyk</h2></a></div>

<form method="get" action="logout.php">
    <div class="head"><button>Wyloguj</button></div>
</form>
        
       <?php
    }
    ?>
    
    
</header>