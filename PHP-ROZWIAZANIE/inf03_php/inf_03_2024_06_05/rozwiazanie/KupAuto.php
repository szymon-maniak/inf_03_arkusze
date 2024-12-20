<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Komis aut</title>
</head>
<body>
    <header>
        <h1><i>KupAuto!</i> Internetowy Komis Samochodowy</h1>
    </header>
    <section id="glowny-1">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM `samochody` WHERE id LIKE 10;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $model = $tablica['model'];
                    $rocznik = $tablica['rocznik'];
                    $przebieg = $tablica['przebieg'];
                    $paliwo = $tablica['paliwo'];
                    $cena = $tablica['cena'];
                    $zdjecie = $tablica['zdjecie'];
                    echo "<img src='$zdjecie' alt='oferta dnia'>";
                    echo "<h4>Oferta Dnia: Toyota</h4>";
                    echo "<p>Rocznik: $rocznik, przebieg: $przebieg, rodzaj paliwa: $paliwo</p>";
                    echo "<h4>Cena: $cena</h4>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section>
        <h2>Oferty Wyróżnione</h2>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM `marki` JOIN samochody ON marki.id = samochody.marki_id WHERE samochody.wyrozniony LIKE 1 LIMIT 4;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa = $tablica['nazwa'];
                    $model = $tablica['model'];
                    $rocznik = $tablica['rocznik'];
                    $cena = $tablica['cena'];
                    $zdjecie = $tablica['zdjecie'];
                    echo "<div class='oferty'>";
                    echo "<img src='$zdjecie' alt='$model'>";
                    echo "<h4>$nazwa $model</h4>";
                    echo "<p>Rocznik: $rocznik</p>";
                    echo "<h4>Cena: $cena</h4>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section>
        <h2>Wybierz markę</h2>
        <form action="" method="post">
            <select name="wybor">
                <!-- skrypt 3 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        $zapytanie = "SELECT nazwa FROM `marki` WHERE 1;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tablica = mysqli_fetch_array($odpowiedz)){
                            $nazwa = $tablica['nazwa'];
                            echo "<option value='$nazwa'>$nazwa</option>";
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </select>
            <input type="submit" value="Wyszukaj">
        </form>
        <!-- skrypt 4 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['wybor'])){
                    $wybor = $_POST['wybor'];
                    $zapytanie = "SELECT samochody.model, samochody.cena, samochody.zdjecie, marki.nazwa FROM `samochody` JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa LIKE '$wybor';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $model = $tablica['model'];
                        $cena = $tablica['cena'];
                        $zdjecie = $tablica['zdjecie'];
                        $nazwa = $tablica['nazwa'];
                        echo "<div class='oferty'>";
                        echo "<img src='$zdjecie' alt='$model'>";
                        echo "<h4>$nazwa $model</h4>";
                        echo "<h4>Cena: $cena</h4>";
                        echo "</div>";
                    }
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>