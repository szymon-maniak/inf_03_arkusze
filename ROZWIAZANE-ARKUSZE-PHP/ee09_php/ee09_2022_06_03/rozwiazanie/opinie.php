<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Opinie klientów</title>
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <section id="glowny">
        <h2>Opinie naszych klientów</h2>
        <!-- skrypt 1 -->
        <?php
            $polaczenie = mysqli_connect('localhost', 'root', '', 'hurtownia');
            if(!$polaczenie){
                exit();
            }
            else{
                $zapytanie = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM `klienci` JOIN opinie ON klienci.id = opinie.Klienci_id WHERE klienci.Typy_id IN(2,3);";
                $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                while($tab = mysqli_fetch_array($odpowiedz)){
                    echo "<div class='opinia'>";
                        echo "<img src='$tab[0]' alt='klient'>";
                        echo "<blockquote>$tab[2]</blockquote>";
                        echo "<h4>$tab[1]</h4>";
                    echo "</div>";
                }
            }
            mysqli_close($polaczenie);
        ?>
    </section>
    <footer>
        <section id="stopka1">
            <h3>Współpracują z nami</h3>
            <a href="http://sklep.pl/">Sklep 1</a>
        </section>
        <section id="stopka2">
            <h3>Nasi top klienci</h3>
            <ol>
                <!-- skrypt 2 -->
                <?php
                    $polaczenie  = mysqli_connect('localhost', 'root', '', 'hurtownia');
                    if(!$polaczenie){
                        exit();
                    }
                    else{
                        $zapytanie = "SELECT imie , nazwisko, punkty FROM `klienci` ORDER BY punkty DESC LIMIT 3;";
                        $odpowiedz = mysqli_query($polaczenie, $zapytanie);
                        while($tab = mysqli_fetch_array($odpowiedz)){
                            echo "<li>$tab[0] $tab[1], $tab[2]</li>";
                        }
                    }
                    mysqli_close($polaczenie);
                ?>
            </ol>
        </section>
        <section id="stopka3">
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </section>
        <section id="stopka4">
            <h3>Autor: Szymon Maniak 5TI</h3>
        </section>
    </footer>
</body>
</html>