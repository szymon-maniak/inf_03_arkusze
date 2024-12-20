<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Video On Demand</title>
</head>
<body>
    <header id="lewy">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </header>
    <header id="prawy">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horro</td>
                <td>Przygodowy</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </header>
    <main id="polecamy">
        <h3>Polecamy</h3>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane3');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE id = 18 OR id = 22 OR id = 23 OR id = 25;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $id = $tablica['id'];
                    $nazwa = $tablica['nazwa'];
                    $opis = $tablica['opis'];
                    $zdjecie = $tablica['zdjecie'];
                    // Podpisanie pod zmienią $text nie działa
                    echo "<div class='film'>";
                    echo "<h4>$id. $nazwa</h4>";
                    echo "<img src='$zdjecie' alt='film'>";
                    echo "<p>$opis</p>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <main id="fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane3');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT id, nazwa, opis, zdjecie FROM `produkty` WHERE Rodzaje_id = 12;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $id = $tablica['id'];
                    $nazwa = $tablica['nazwa'];
                    $opis = $tablica['opis'];
                    $zdjecie = $tablica['zdjecie'];
                    // Podpisanie pod zmienią $text nie działa
                    echo "<div class='film'>";
                    echo "<h4>$id. $nazwa</h4>";
                    echo "<img src='$zdjecie' alt='film'>";
                    echo "<p>$opis</p>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <form action="video.php" method="post">
            Usuń film nr.: <input type="number" name="usun">
            <input type="submit" value="Usuń film">
        </form>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '' , 'dane3');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty ($_POST['usun'])){
                    $usun = $_POST['usun'];
                    $zapytanie = "DELETE FROM `produkty` WHERE id = $usun;";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie)
        ?>
        Stronę wykonał: <a href="mailto:ja@poczta.com">Szymon Maniak 5TI</a>
    </footer>
</body>
</html>