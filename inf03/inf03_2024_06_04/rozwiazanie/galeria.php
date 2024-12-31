<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Galeria</title>
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <section id="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>
    <section id="srodkowy">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'galeria');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT zdjecia.plik, zdjecia.tytul, zdjecia.polubienia, autorzy.imie, autorzy.nazwisko FROM `zdjecia` JOIN autorzy ON zdjecia.autorzy_id = autorzy.id ORDER BY autorzy.nazwisko ASC;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $plik = $tablica[0];
                    $tytul = $tablica[1];
                    $polubienia = $tablica[2];
                    $imie = $tablica[3];
                    $nazwisko = $tablica[4];

                    $text .= "<div class='zdjecie'>";
                    $text .= "<img src='$plik' alt='zdjęcie'>";
                    $text .= "<h3>$tytul</h3>";
                        if($polubienia > 40){
                            $text .= "<p>Autor: $imie $nazwisko.<br>Wiele osób polubiło ten obraz.</p>";
                        }
                        else{
                            $text .= "<p>Autor: $imie $nazwisko</p>";
                        }
                    $text .= "<a href='$plik' download='$plik''>Pobierz</a>";
                    $text .= "</div>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h2>Najbardziej lubiane</h2>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'galeria');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT tytul, plik FROM `zdjecia` WHERE polubienia >= 100;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $text .= "<img src='$tablica[1]' alt='$tablica[0]'>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
        <b>Zobacz wszystkie nasze zdjęcia</b>
    </section>
    <footer>
        <h5>Stronę wykonał: Szymon Maniak</h5>
    </footer>
</body>
</html>