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
    <article>
        <!-- skrypt 1 -->
        <?php
            $polaczenie =  mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT model, rocznik, przebieg, paliwo, cena, zdjecie FROM `samochody` WHERE id = 10;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $model = $tablica['model'];
                    $rocznik = $tablica['rocznik'];
                    $przebieg = $tablica['przebieg'];
                    $paliwo = $tablica['paliwo'];
                    $cena = $tablica['cena'];
                    $zdjecie = $tablica['zdjecie'];

                    $text .= "<img src='$zdjecie' alt='oferta dnia'>";
                    $text .= "<h4>Oferta dnia: Toyota $model</h4>";
                    $text .= "<p>Rocznik: $rocznik, przebieg: $przebieg, rodzaj paliwo: $paliwo</p>";
                    $text .= "<h4>Cena: $cena</h4>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </article>
    <section id="glowny">
        <h2>Oferty Wyróżnione</h2>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT marki.nazwa, samochody.model, samochody.rocznik, samochody.cena, samochody.zdjecie FROM `marki` JOIN samochody ON samochody.marki_id = marki.id WHERE samochody.wyrozniony LIKE 1 LIMIT 4;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa = $tablica['nazwa'];
                    $model = $tablica['model'];
                    $rocznik = $tablica['rocznik'];
                    $cena = $tablica['cena'];
                    $zdjecie = $tablica['zdjecie'];

                    $text .= "<div class='oferta'>";
                    $text .= "<img src='$zdjecie' alt='$model'>";
                    $text .= "<h4>$nazwa $model</h4>";
                    $text .= "<p>Rocznik: $rocznik</p>";
                    $text .= "<h4>Cena: $cena</h4>";
                    $text .= "</div>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <nav>
        <h2>Wybierz markę</h2>
        <form action="" method="post">
            <select name="opcja">
                <!-- skrypt 3 -->
                <?php
                    $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        $zapytanie = "SELECT nazwa FROM `marki`;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tablica = mysqli_fetch_array($odpowiedz)){
                            $nazwa = $tablica['nazwa'];
                            echo "<option value='$nazwa'>$nazwa</option>";
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
                <input type="submit" value="Wyszukaj">
            </select>
        </form>
        <!-- skrypt 4 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'kupauto');
            if(!$polaczenie){
                exit();
            }
            else{
                if(!empty($_POST['opcja'])){
                    $opcja = $_POST['opcja'];
                    $zapytanie = "SELECT samochody.model, samochody.cena, samochody.zdjecie FROM `samochody` JOIN marki ON samochody.marki_id = marki.id WHERE marki.nazwa LIKE '$opcja';";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $model = $tablica['model'];
                        $cena = $tablica['cena'];
                        $zdjecie = $tablica['zdjecie'];

                        $text .= "<div class='oferta'>";
                        $text .= "<img src='$zdjecie' alt='$model'>";
                        $text .= "<h4>$opcja $model</h4>";
                        $text .= "<h4>Cena: $cena</h4>";
                        $text .= "</div>";
                    }
                    echo $text;
                }
            }
            mysqli_close($polaczenie);
        ?>
    </nav>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
        <p><a href="http://firmy.pl/komis">Znajdź nas także</a></p>
    </footer>
</body>
</html>