<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styl.css">
    <title>Koszyk</title>

</head>

<body>
    <?php include('header.php'); ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID Produktu</th>
                    <th>Ilość</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Sprawdź, czy tablica jest ustawiona w sesji
                if (isset($_SESSION['mojaTablica']) && is_array($_SESSION['mojaTablica'])) {
                    // Iteruj przez tablicę i wypisz dane w tabelce
                    foreach ($_SESSION['mojaTablica'] as $item) {
                        $idp = $item[0];
                        $ilosc_pr = $item[1];
                        echo "<tr>";
                        echo "<td>$idp</td>";
                        echo "<td>$ilosc_pr</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Brak danych w tablicy</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>