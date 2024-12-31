<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Hodowla świnek morskich</title>
</head>
<body>
    <header>
        <h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>
    <nav id="menu">
        <a href="peruwianka.php">Rasa Peruwianka</a>
        <a href="american.php">Rasa American</a>
        <a href="crested.php">Rasa Crested</a>
    </nav>
    <section id="sekcja">
        <h3>Poznaj wszystkie rasy świnek morskich</h3>
        <ol>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT rasa FROM `rasy` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        $text .= "<li>$tablica[0]</li>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <section id="glowny">
        <img src="american.jpg" alt="Świnka morska rasy american">
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT DISTINCT swinki.data_ur, swinki.miot, rasy.rasa FROM `swinki` JOIN rasy ON swinki.rasy_id = rasy.id WHERE rasy_id LIKE 6;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $text .= "<h2>Rasa: $tablica[2]</h2>";
                    $text .= "<p>Data urodzenia: $tablica[0]</p>";
                    $text .= "<p>Oznaczenie miotu: $tablica[1]</p>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
        <hr>
        <h2>Świnki w tym miocie</h2>
        <!-- skrypt 3 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'hodowla');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT imie, cena, opis FROM `swinki` WHERE rasy_id LIKE 6;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $text .= "<h3>$tablica[0] - $tablica[1] zł</h3>";
                    $text .= "<p>$tablica[2]</p>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak  5TI</p>
    </footer>
</body>
</html>