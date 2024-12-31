<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Lista przyjaciół</title>
</head>
<body>
    <header>
        <h1>Portal Społecznościowy - moje konto</h1>
    </header>
    <section id="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>muzyka</li>
            <li>film</li>
            <li>komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <!-- skrypt -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'dane');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id IN (1, 2 ,6);";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $text .= "<div class='zdjecie'>";
                    $text .= "<img src='$tablica[3]' alt='przyjaciel'>";
                    $text .= "</div>";
                    $text .= "<div class='opis'>";
                    $text .= "<h3>$tablica[0] $tablica[1]</h3>";
                    $text .= "<p>Ostatni wpis: $tablica[2]</p>";
                    $text .= "</div>";
                    $text .= "<div class='linia'>";
                    $text .= "<hr>";
                    $text .= "</div>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <section id="stopka1">
            Stronę wykonał: Szymon Maniak 5TI
        </section>
        <section id="stopka2">
            <a href="mailto:ja@portal.pl">napisz do mnie</a>
        </section>
    </footer>
</body>
</html>