<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Warzywniak</title>
</head>
<body>
    <header>
        <section id="baner1">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="baner2">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="http://terapiasokami.pl/" target="_blank">soki</a></li>
            </ol>
        </section>
    </header>
    <article id="glowny">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            } 
            else{
                $zapytanie = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM `produkty` WHERE Rodzaje_id IN(1,2);";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<section class='produkt'>";
                    echo "<img src='$tab[4]' alt='warzywniak'>";
                    echo "<h5>$tab[0]</h5>";
                    echo "<p>opis: $tab[2]</p>";
                    echo "<p>na stanie: $tab[1]</p>";
                    echo "<h2>$tab[3] zł</h2>";
                    echo "</section>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </article>
    <footer>
        <form action="sklep.php" method="post">
            <label>Nazwa: <input type="text" name="nazwa"></label>
            <label>Cena: <input type="text" name="cena"></label>
            <button type="submit">Dodaj produkt</button>
        </form>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane2');
            if(!$polaczenie){
                exit();
            } 
            else{
                if(isset($_POST['nazwa']) && isset($_POST['cena'])){
                    $nazwa = $_POST['nazwa'];
                    $cena = $_POST['cena'];
                    $zapytanie = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES ('1','4','$nazwa','10', '','$cena','owoce.jpg');";
                    mysqli_query($polaczenie, $zapytanie);
                }
            }
            mysqli_close($polaczenie);
        ?>
        Stronę wykonał: Szymon Maniak 5TI
    </footer>
</body>
</html>