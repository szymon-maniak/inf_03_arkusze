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
    <nav id="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </nav>
    <article id="srodkowy">
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'galeria');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT plik, tytul, polubienia, autorzy.imie, autorzy.nazwisko FROM `zdjecia` JOIN autorzy ON autorzy_id = autorzy.id ORDER BY autorzy.nazwisko ASC;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<section class='blok'>";
                    echo "<img src='$tab[0]' alt='zdjęcie'>";
                    echo "<h3>$tab[1]</h3>";
                    if($tab[2] > 40){
                        echo "<p>Autor: $tab[3] $tab[4].<br>Wiele osób polubiło ten obraz</p>";
                    } else{
                        echo "<p>Autor: $tab[3] $tab[4]</p>";
                    }
                    echo "<a href='$tab[0]' download>Pobierz</a>";
                    echo "</section>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </article>
    <aside id="prawy">
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
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<img src='$tab[1]' alt='$tab[0]'>";
                }
            }
            mysqli_close($polaczenie);
        ?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
    </aside>
    <footer>
        <h5>Stronę wykonał: Szymon Maniak 5TI</h5>
    </footer>
</body>
</html>