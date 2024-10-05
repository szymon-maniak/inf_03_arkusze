<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl4.css">
    <title>Wycieczki po Europie</title>
</head>
<body>
    <header>
        <h1>BIURO TURYSTYCZNE</h1>
    </header>
    <section>
        <h3>Wycieczki, na które są wolne miejsca</h3>
        <ul>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'biuro');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT id, dataWyjazdu, cel, cena FROM `wycieczki` WHERE dostepna = 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $id = $tablica['id'];
                        $dataWyjazdu = $tablica['dataWyjazdu'];
                        $cel = $tablica['cel'];
                        $cena = $tablica['cena'];
                        echo "<li>$id. dnia $dataWyjazdu jedziemy do $cel, cena: $cena<br></li>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </ul>
    </section>
    <aside>
        <h2>Bestselery</h2>
        <table>
            <tr>
                <td>Wenecja</td>
                <td>kwiecień</td>
            </tr>
            <tr>
                <td>Londyn</td>
                <td>lipiec</td>
            </tr>
            <tr>
                <td>Rzym</td>
                <td>wrzesień</td>
            </tr>
        </table>
    </aside>
    <main>
        <h2>Nasze zdjęcia</h2>
        <!-- skrypt 2 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'biuro');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT nazwaPliku, podpis FROM `zdjecia` ORDER BY `zdjecia`.`podpis` DESC;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwaPliku = $tablica['nazwaPliku'];
                    $podpis = $tablica['podpis'];
                    echo "<img src='$nazwaPliku' alt='$podpis'>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <nav>
        <h2>Skontaktuj się</h2>
        <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
        <p>telefon: 111222333</p>
    </nav>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>