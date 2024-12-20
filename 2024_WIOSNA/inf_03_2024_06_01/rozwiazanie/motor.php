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
    <section id="lewy">
        <h2>Gdzie pojechać</h2>
        <dl>
            <!-- skrypt 1 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT wycieczki.nazwa, wycieczki.opis, wycieczki.poczatek, zdjecia.zrodlo FROM `wycieczki` JOIN zdjecia ON wycieczki.zdjecia_id = zdjecia.id;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "<dt>$tab[0], rozpoczyna się w $tab[2], <a href='$tab[3]'>zobacz zdjęcie</a></dt>";
                        echo "<dd>$tab[1]</dd>";
                    }
                }
                mysqli_close($polaczenie);
            ?>
        </dl>
    </section>
    <section id="prawy1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section id="prawy2">
        <h2>Statystyki</h2>
        <p>
            Wpisanych wycieczek:
            <!-- skrypt 2 -->
            <?php
                $polaczenie = mysqli_connect('localhost', 'root', '', 'motory');
                if(!$polaczenie){
                    exit();
                }
                else{
                    $zapytanie = "SELECT COUNT(id) FROM `wycieczki` WHERE 1;";
                    $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                    while($tab = mysqli_fetch_array($odpowiedz)){
                        echo "Wpisanych wycieczek: $tab[0]";
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