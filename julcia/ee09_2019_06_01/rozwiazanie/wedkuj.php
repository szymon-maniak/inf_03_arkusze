<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkujemy</title>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <section id="lewy">
        <h2>Ryby drapieżne naszych wód</h2>
        <ul>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $nazwa = $tablica['nazwa'];
                        $wystepowanie = $tablica['wystepowanie'];
                        echo "<li>$nazwa, występowanie: $wystepowanie</li>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ul>
    </section>
    <section id="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>