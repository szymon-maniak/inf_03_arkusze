<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Wynajem pokoi</title>
</head>
<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>
    <section id="lewy">
        <a href="index.html">GŁÓWNA</a>
        <img src="1.jpg" alt="pokoje">
    </section>
    <section id="srodkowy">
        <a href="cennik.php">CENNIK</a>
        <table>
            <!-- skrypt -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wynajem');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT * FROM `pokoje` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = " ";
                    while($tablica = mysqli_fetch_row($odpowiedz)){
                        $text .= "<tr>";
                        $text .= "<td>$tablica[0]</td>";
                        $text .= "<td>$tablica[1]</td>";
                        $text .= "<td>$tablica[2]</td>";
                        $text .= "</tr>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </table>
    </section>
    <section id="prawy">
        <a href="kalkulator.html">KALKULATOR</a>
        <img src="3.jpg" alt="pokoje">
    </section>
    <footer>
        <p>Stronę opracował: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>