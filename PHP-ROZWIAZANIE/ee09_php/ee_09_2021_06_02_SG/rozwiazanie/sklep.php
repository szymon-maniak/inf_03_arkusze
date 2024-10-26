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
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM `produkty` WHERE Rodzaje_id = 1 OR Rodzaje_id = 2;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa = $tablica['nazwa'];
                    $ilosc = $tablica['ilosc'];
                    $opis = $tablica['opis'];
                    $cena = $tablica['cena'];
                    $zdjecie = $tablica['zdjecie'];

                    echo "<div class='produkt'>
                    <img src='$zdjecie' alt='warzywniak'>
                    <h5>$nazwa</h5>
                    <p>opis: $opis</p>
                    <p>na stanie: $ilosc</p>
                    <h2>$cena zł</h2>
                    </div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <footer>
        <form action="sklep.php" method="post">
            Nazwa: <input type="text" name="nazwa"><br>
            Cena: <input type="text" name="cena"><br>
            <input type="submit" value="Dodaj produkt">
        </form>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['nazwa']) && !empty($_POST['cena'])){
                    $nazwa = $_POST['nazwa'];
                    $cena = $_POST['cena'];
                    $zapytanie = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES ('1','4','$nazwa','10','','$cena','owoce.jpg');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>