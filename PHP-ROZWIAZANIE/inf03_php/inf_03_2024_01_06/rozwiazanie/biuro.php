<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl9.css">
    <title>Poznaj Europę</title>
</head>
<body>
    <header>
        <h1>BIURO PODRÓŻY</h1>
    </header>
    <section id="lewy">
        <h2>Promocje</h2>
        <table>
            <tr>
                <td>Warszawa</td>
                <td>od 600zł</td>
            </tr>
            <tr>
                <td>Wenecja</td>
                <td>od 1200zł</td>
            </tr>
            <tr>
                <td>Paryż</td>
                <td>od 1200zł</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h2>W tym roku jedziemy do...</h2>
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'pozdroze');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia` ORDER BY `podpis`;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                $text = "";
                while($row = mysqli_fetch_array($odpowiedz)){
                    $text .= "<img src='$row[nazwaPliku]' alt='$row[podpis]' title='$row[podpis]'>";
                }
                echo $text;
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h2>Kontakt</h2>
        <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
        <p>telefon: 444555666</p>
    </section>
    <section id="dane">
        <h3>W poprzednich latach byliśmy...</h3>
        <ol>
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'pozdroze');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT `cel`, `dataWyjazdu` FROM `wycieczki` WHERE `dostepna` = 0;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    $text = "";
                    while($row = mysqli_fetch_array($odpowiedz)){
                        $text .= "<li>";
                        $text .= "Dnia $row[dataWyjazdu] pojechaliśmy do $row[cel]";
                        $text .= "</li>";
                    }
                    echo $text;
                }
                mysqli_close($polaczenie);
            ?>
        </ol>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>