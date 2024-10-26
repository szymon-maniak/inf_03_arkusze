<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<img src="motor.png" alt="motocykl">
<body>
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <main id="lewy">
        <h2>Gdzie pojechać?</h2>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM `wycieczki` JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tablica = mysqli_fetch_array($odpowiedz)){
                    $nazwa = $tablica['nazwa'];
                    $opis = $tablica['opis'];
                    $poczatek = $tablica['poczatek'];
                    $zrodlo = $tablica['zrodlo'];

                    echo "<dt>$nazwa, rozpoczyna się w $poczatek, <a href='$zrodlo'>zobacz zdjęcie</a></dt>";
                    echo "<dl>$opis</dl>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </main>
    <section id="prawy_1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy_2">
        <h2>Statystyki</h2>
        <p>
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT COUNT(id) FROM `wycieczki`;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tablica = mysqli_fetch_array($odpowiedz)){
                        $policzone = $tablica['COUNT(id)'];
                        echo "<p>Wpisanych wycieczek: $policzone</p>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer>
        <p>Stronę wykonał: Szymon Maniak 5TI</p>
    </footer>
</body>
</html>