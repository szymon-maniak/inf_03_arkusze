<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Klub wędkowania</title>
</head>
<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>
    <section id="lewy">
        <img src="ryba2.jpg" alt="Szczupak">
    </section>
    <section id="prawy">
        <h3>Ryby spokojnego żeru (białe)</h3>
        <!-- skrypt -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'wedkowanie');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT id, nazwa, wystepowanie FROM ryby WHERE styl_zycia = 2;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = " ";
                while($tablica = mysqli_fetch_row($odpowiedz)){
                    $text .= "$tablica[0]. $tablica[1], występuje w: $tablica[2]<br>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
        <ol>
            <li><a href="http://wedkuje.pl/" target="_blank">Odwiedź takie;</a></li>
            <li><a href="http://www.pzw.org.pl/" target="_blank">Polski Związek Wędkarski</a></li>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak</p>
    </footer>
</body>
</html>