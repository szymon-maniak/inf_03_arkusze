<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Warzywniak</title>
</head>
<body>
    <header id="baner_lewy">
        <h1>Internetowy sklep z eko-warzywami</h1>
    </header>
    <header id="baner_prawy">
        <ol>
            <li>warzywa</li>
            <li>owoce</li>
            <li><a href="http://terapiasokami.pl/" target="_blank">soki</a></li>
        </ol>
    </header>
    <main>
        <!-- skypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM `produkty` WHERE Rodzaje_id IN(1,2);";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    echo "<div class='produkt'>";
                    echo "<img src='$tablica[4]' alt='warzywniak'>";
                    echo "<h5>$tablica[0]</h5>";
                    echo "<p>opis: $tablica[2]</p>";
                    echo "<p>na stanie: $tablica[1]</p>";
                    echo "<h2>$tablica[3] zł</h2>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="post">
            Nazwa: <input type="text" name="nazwa">
            Cena: <input type="text" name="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['nazwa']) && !empty($_POST['cena'])){
                    $nazwa = $_POST['nazwa'];
                    $cena = $_POST['cena'];
                    $zapytanie = "INSERT INTO produkty VALUES (NULL, 1, 4, '$nazwa', 10, '', '$cena', 'owoce.jpg');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>