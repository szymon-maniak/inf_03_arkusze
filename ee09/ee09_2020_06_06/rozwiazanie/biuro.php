<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wycieczki krajoznawcze</title>
</head>
<body>
    <header>
        <h1>WITAMY W BIURZE PODRÓŻY</h1>
    </header>
    <section id="dane">
        <h3>ARCHIWUM WYCIECZKI</h3>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin4');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT id, cel, cena FROM `wycieczki` WHERE dostepna = 0;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $id = $tablica['id'];
                    $cel = $tablica['cel'];
                    $cena = $tablica['cena'];

                    echo "$id. $cel, cena: $cena<br>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="lewy">
        <h3>NAJTANIEJ...</h3>
        <table>
            <tr>
                <td>Włochy</td>
                <td>od 1200 zł</td>
            </tr>
            <tr>
                <td>Francja</td>
                <td>od 1200 zł</td>
            </tr>
            <tr>
                <td>Hiszpania</td>
                <td>od 1400 zł</td>
            </tr>
        </table>
    </section>
    <section id="srodkowy">
        <h3>TU BYLIŚMY</h3>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'egzamin4');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY podpis DESC;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwaPliku = $tablica['nazwaPliku'];
                    $podpis = $tablica['podpis'];

                    echo "<img src='$nazwaPliku' alt='$podpis'>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <section id="prawy">
        <h3>SKONTAKTUJ SIĘ</h3>
        <a href="mailto:wycieczki@wycieczki.pl">napisz do nas</a>
        <p>telefon: 555666777</p>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>